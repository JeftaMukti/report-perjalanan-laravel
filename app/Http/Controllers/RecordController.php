<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $records = Record::orderBy('date')->orderBy('time')->orderBy('temperature')->get();

        $sortBy = $request->get('sort_by', 'date');
        $sortOrder = $request->get('sort_order', 'asc');

        $records = Record::orderBy($sortBy, $sortOrder)->get();

        return view('records.index', compact('records', 'sortBy', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'temperature' => 'required'
        ]);

        $record = new Record([
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'temperature' => $request->input('temperature')
        ]);

        $record->save();
        return redirect()->route('records.index')->with('success','barang berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $record = Record::findOrFail($id);
        return view('records.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $record = Record::findOrFail($id);
        return view('records.edit',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'location' => 'required|string',
            'temperature' => 'required|numeric',
        ]);
    
        $record = Record::findOrFail($id);
    
        $record->date = $request->input('date');
        $record->time = $request->input('time');
        $record->location = $request->input('location');
        $record->temperature = $request->input('temperature');
    
        $record->save();
    
        // Flash a success message to be displayed on the redirected page
        Session()->flash('success', 'Record updated successfully');
    
        return redirect()->route('records.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $record = Record::findOrFail($id);
        $record->delete();
        return redirect()->route('records.index')->with('success', 'Record deleted successfully');
    }
}
