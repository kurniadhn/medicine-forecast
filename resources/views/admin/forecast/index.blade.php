@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Forecasting</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Forecasting</div>
            </div>
        </div>

        <div class="section-body">
            <form id="form" action="{{ route('forecast.index') }}" method="GET">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Forecasting Obat</h4>
                                {{-- <a href="/dashboard/obat" class="btn btn-primary ml-auto">Forecasting Obat</a> --}}
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="search" class="form-control" name="nama_obat" value="SUPERTETRA CAP"
                                        autofocus readonly>

                                </div>
                                <div class="form-group">
                                    <label>Periode Forecasting</label>
                                    <input type="number" class="form-control" name="periode">
                                </div>
                                <div class="form-group">
                                    <label>Alpha (a)</label>
                                    <input type="search" class="form-control" name="alpha">
                                </div>
                                <div class="form-group">
                                    <label>Beta (B)</label>
                                    <input type="search" class="form-control" name="beta">
                                </div>
                                <div class="form-group">
                                    <label>Gamma (y)</label>
                                    <input type="search" class="form-control" name="gamma">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset" onclick="resetForm()">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- jika data tidak kosong tampilkan --}}
        @if ($show)
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="forecast_chart">
                            <div class="apex-charts h-auto py-4" id="show_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Periode Forecasting</h4>
                            <div class="ml-auto">MSE : 2912.127868</div>
                            <div class="ml-auto">MAPE : 28.525978896</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Penjualan Aktual</th>
                                            <th>Hasil Forecasting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTable as $key => $item)
                                            <tr>
                                                <td>{{ $item['year'] }}</td>
                                                <td>{{ $item['month'] }}</td>
                                                <td>{{ $item['actual'] }}</td>
                                                <td>{{ $item['forecast'] }}</td>
                                                {{-- <td>{{ $item['error'] }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection

@section('script')
    <script>
        $('#tableResult').DataTable({
            'ordering': false,
        });
        @if ($show)
            function chart() {
                var dataActual = {{ $dataActual }};
                var dataForecast = {{ $dataForecast }};
                var dataMonth = JSON.parse('{!! $dataMonth !!}');
                var options = {
                    chart: {
                        height: 350,
                        type: 'line',
                        stacked: false,
                        zoom: {
                            enabled: false
                        },
                        stroke: {
                            width: [0, 2, 4],
                            curve: 'smooth'
                        },
                        toolbar: {
                            show: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: [3, 3, 4],
                        curve: 'straight',
                        dashArray: [0, 8, 5]
                    },
                    series: [{
                            name: "Penjualan Aktual",
                            type: "area",
                            data: dataActual
                        },
                        {
                            name: "Hasil Peramalan",
                            type: "line",
                            data: dataForecast
                        },
                    ],
                    fill: {
                        type: 'gradient',
                        opacity: [0.85, 0.25, 1],
                        gradient: {
                            inverseColors: false,
                            shade: 'light',
                            type: "vertical",
                            opacityFrom: 0.85,
                            opacityTo: 0.55,
                            stops: [0, 100, 100, 100]
                        }
                    },
                    title: {
                        text: 'Hasil Forecasting {{ $productName }}',
                        align: 'center',
                        style: {
                            fontSize: '16px',
                            fontWeight: 'bold',
                            fontFamily: undefined,
                            color: '#1a1a1a'
                        },
                    },
                    markers: {
                        size: 0,
                        hover: {
                            sizeOffset: 6
                        }
                    },
                    xaxis: {
                        categories: dataMonth,
                    },
                    tooltip: {
                        y: [{
                            title: {
                                formatter: function(val) {
                                    return val + " (Penjualan Aktual)"
                                }
                            }
                        }, {
                            title: {
                                formatter: function(val) {
                                    return val + " (Hasil Peramalan)"
                                }
                            }
                        }]
                    },
                    grid: {
                        borderColor: '#f1f1f1',
                    }
                }

                var chart = new ApexCharts(
                    document.querySelector("#show_chart"),
                    options
                );

                chart.render();
            }

            var initialChart = chart();
        @endif
    </script>
@endsection
