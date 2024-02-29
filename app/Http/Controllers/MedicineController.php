<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Forecast;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.medicine.index', [
            'medicines' => Medicine::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'stok' => 'required|max:10',
            'harga' => 'required|max:10',
            'tanggal_kadaluarsa' => 'required'
        ]);
        
        $medicine = Medicine::create($validatedData);

        $medicineName = $medicine->nama_obat;

        $messageData['message'] = 'Telah menambahkan data obat';
        $messageData['type'] = 'activity';
        $messageData['page'] = 'medicine';
        $messageData['user_id'] = Auth()->user()->id;
        $messageData['updated_at'] = now();
        $messageData['medicine_name'] = $medicineName;

        Message::create($messageData);

        return redirect('/medicine')->with('success', 'Medicine has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        return view('admin.medicine.edit', [
            'medicine' => $medicine
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $rules = [
            'nama_obat' => 'required|max:255',
            'stok' => 'required|max:10',
            'harga' => 'required|max:10',
            'tanggal_kadaluarsa' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Medicine::where('id', $medicine->id)->update($validatedData);

        $messageData['message'] = 'Telah mengubah data obat';
        $messageData['type'] = 'activity';
        $messageData['page'] = 'medicine';
        $messageData['user_id'] = Auth()->user()->id;
        $messageData['updated_at'] = now();
        $messageData['medicine_name'] = $request->nama_obat;

        Message::create($messageData);

        return redirect('/medicine')->with('edit', 'Medicine has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {

        $messageData['message'] = 'Telah menghapus data obat';
        $messageData['type'] = 'activity';
        $messageData['page'] = 'medicine';
        $messageData['user_id'] = Auth()->user()->id;
        $messageData['updated_at'] = now();
        $messageData['medicine_name'] = $medicine->nama_obat;

        // dd($messageData);

        Message::create($messageData);

        Medicine::destroy($medicine->id);

        return redirect('/medicine')->with('delete', 'Medicine has been deleted');
    }

    public function history()
    {
        return view('admin.medicine.riwayat', [
            'forecasts' => Forecast::paginate(10)
        ]);
    }
}
