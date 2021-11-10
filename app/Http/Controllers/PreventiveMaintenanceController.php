<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\PreventiveMaintenance;
use Illuminate\Http\Request;

class PreventiveMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'maintenance';

        $preventiveMaintenances = PreventiveMaintenance::all();

        return view('pemeliharaan', compact('title', 'preventiveMaintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'maintenance';

        $equipments = Equipment::all();

        return view('pemeliharaan_create', compact('title', 'equipments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        $this->validate($request, [
//            'name' => 'required|unique:courses|min:3',
//            'lecturer' => 'required',
//            'sks' => 'required',
//            'description' => 'required'
//        ]);

        PreventiveMaintenance::create([
            'equipment_id' => $request->equipment_id,
            'year' => $request->year,
            'month' => $request->month,
            'week' => $request->week,
            'status' => 'Belum',
        ]);

        return redirect(route('pemeliharaan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
