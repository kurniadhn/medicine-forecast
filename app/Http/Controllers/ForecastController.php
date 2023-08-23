<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('nama_obat')) {
            $alpha = $request->alpha;
            $beta = $request->beta;
            $gamma = $request->gamma;
            $period = $request->period;
            $obat = $request->nama_obat;
            $data = Forecast::where('nama_obat', $obat)->orderBy('tgl_jual', 'asc')->get();
            if (!$data->count()) {
                return view('admin.forecast.index');
            }

            $productName = $data->first()->nama_obat;

            $dataMonth = $data->groupBy(function ($date) {
                //parse date to iso format MMMM YYYY
                return \Carbon\Carbon::parse($date->tgl_jual)->locale('id')->isoFormat('MMMM YYYY');
            });

            $data = $dataMonth->map(function ($item) {
                return $item->sum('jumlah_keluar');
            });

            $data = $data->toArray();
            $data = array_values($data);
            $forecast = $this->forecast($data, $period, $alpha, $beta, $gamma);
            $dataForecast = $forecast['dataForecastAkhir'];

            $dataMonth = $dataMonth->keys()->toArray();
            for ($i = 1; $i <= $period; $i++) {
                $dataMonth[] = \Carbon\Carbon::now()->locale('id')->addMonths($i)->isoFormat('MMMM YYYY');
            }

            $dataActual = json_encode($data);
            $dataForecast = json_encode($dataForecast);
            $dataMonth = json_encode($dataMonth);
            $mape = $forecast['mape'];
            $mse = $forecast['mse'];

            $dataTable = array();
            for ($i = 0; $i < count(array_slice($forecast['dataForecastAkhir'], 12)); $i++) {
                $data = [
                    'year' => explode(' ', json_decode($dataMonth)[$i])[1],
                    'month' => explode(' ', json_decode($dataMonth)[$i])[0],
                    'actual' => $forecast['dataAfter12FirstMonths'][$i] ?? 0,
                    'forecast' => $forecast['dataForecastAfter12FirstMonths'][$i] ?? 0,
                    'error' => $forecast['error'][$i] ?? 0,
                ];

                array_push($dataTable, $data);
            }
            $show = true;

            return view('admin.forecast.index', compact(
                'dataForecast',
                'dataActual',
                'dataMonth',
                'productName',
                'mape',
                'mse',
                'dataTable',
                'show'
            ));
        } else {
            $show = false;
            return view('admin.forecast.index', compact('show'));
        }
    }

    public function forecast($data, $period, $alpha, $beta, $gamma)
    {
        // data = array of data
        $data = array_values($data);

        // data 12 bulan pertama
        $dataFirst12Months = array_slice($data, 0, 12);

        // initial level = average of data 12 bulan pertama
        $initialLevel = array_sum($dataFirst12Months) / count($dataFirst12Months);

        // initial trend = average of the difference between data 12 bulan pertama
        $initialTrend = (array_sum(array_slice($data, 12, 12)) - array_sum($dataFirst12Months)) / (12 * 12);

        // initial seasonal indices = data 12 bulan pertama / initial level
        $initialSeasonalIndices = [];
        for ($i = 0; $i < count($dataFirst12Months); $i++) {
            $initialSeasonalIndices[$i] = $data[$i] / $initialLevel;
        }

        // data 12 bulan setelah 12 bulan pertama
        $dataAfter12FirstMonths = array_slice($data, 12);

        // initial value
        $level = $initialLevel;
        $trend = $initialTrend;
        $seasonalIndices = $initialSeasonalIndices;

        // alpha, beta, gamma convert to float
        $alpha = (float) $alpha;
        $beta = (float) $beta;
        $gamma = (float) $gamma;

        // perhitungan
        $dataLevel = [];
        $dataTrend = [];
        $dataSeasonalIndices = [];
        $dataForecast = [];
        for ($i = 0; $i < count($dataAfter12FirstMonths); $i++) {
            // pengecekan data apakah ada atau tidak (jika tidak ada maka diisi dengan 0)
            if ($i < count($dataAfter12FirstMonths)) {
                $currentData = $dataAfter12FirstMonths[$i];
            } else {
                $currentData = 0;
            }

            // temporary value
            $previousLevel = $level;
            $previousTrend = $trend;
            $previousSeasonalIndices = $seasonalIndices[$i % 12];

            // perhitungan level, trend, seasonal index, dan forecast sesuai rumus
            $level = $alpha * ($currentData / $previousSeasonalIndices) + (1 - $alpha) * ($previousLevel + $previousTrend);
            $trend = $beta * ($level - $previousLevel) + (1 - $beta) * $previousTrend;
            $seasonalIndices[$i % 12] = $gamma * ($currentData / $level) + (1 - $gamma) * $previousSeasonalIndices;
            $forecast[$i] = ($previousLevel + 1 * $previousTrend) * $previousSeasonalIndices;

            // simpan data level, trend, seasonal index, dan forecast ke array
            $dataLevel[] = $level;
            $dataTrend[] = $trend;
            $dataSeasonalIndices[] = $seasonalIndices[$i % 12];
            $dataForecast[] = $forecast[$i];
        }

        // initial value untuk perhitungan forecast berikutnya
        $lastLevel = $dataLevel[count($dataLevel) - 1];
        $lastTrend = $dataTrend[count($dataTrend) - 1];
        $dataLastSeasonalIndices = array_slice($dataSeasonalIndices, count($dataSeasonalIndices) - 12);

        // perhitungan forecast berikutnya
        $forecast = [];
        for ($i = 0; $i < $period; $i++) {
            $forecast[$i] = ($lastLevel + ($i + 1) * $lastTrend) * $dataLastSeasonalIndices[$i % 12];
        }

        // perhitungan error
        $error = [];
        for ($i = 0; $i < count($dataAfter12FirstMonths); $i++) {
            $error[$i] = $dataAfter12FirstMonths[$i] - $dataForecast[$i];
        }

        // perhitungan squared error
        $sequaredError = [];
        for ($i = 0; $i < count($error); $i++) {
            $sequaredError[$i] = $error[$i] * $error[$i];
        }

        // perhitungan absolute precentage error
        $absolutePrecentageError = [];
        for ($i = 0; $i < count($error); $i++) {
            $absolutePrecentageError[$i] = abs($error[$i] / $dataAfter12FirstMonths[$i]) * 100;
        }

        // perhitungan mse dan mape
        $mse = array_sum($sequaredError) / count($sequaredError);
        $mape = array_sum($absolutePrecentageError) / count($absolutePrecentageError);

        // $dataForecastAkhir = 12 bulan pertama set to null + dataforecast + forecast
        $dataForecastAkhir = array_merge(array_fill(0, 12, null), $dataForecast, $forecast);
        // round data forecast akhir
        $dataForecastAkhir = array_map(function ($value) {
            return round($value);
        }, $dataForecastAkhir);

        $dataForecastAfter12FirstMonths = array_slice($dataForecastAkhir, 12);

        // data yang akan dikembalikan
        $data = [
            'dataAfter12FirstMonths' => $dataAfter12FirstMonths,
            'dataLevel' => $dataLevel,
            'dataTrend' => $dataTrend,
            'dataSeasonalIndices' => $dataSeasonalIndices,
            'dataForecast' => $dataForecast,
            'dataLastSeasonalIndices' => $dataLastSeasonalIndices,
            'forecast' => $forecast,
            'error' => $error,
            'sequaredError' => $sequaredError,
            'absolutePrecentageError' => $absolutePrecentageError,
            'mse' => $mse,
            'mape' => $mape,
            'dataForecastAkhir' => $dataForecastAkhir,
            'dataForecastAfter12FirstMonths' => $dataForecastAfter12FirstMonths,
        ];

        return $data;
    }
}
