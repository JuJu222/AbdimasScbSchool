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

        $preventiveMaintenances = PreventiveMaintenance::orderBy('equipment_id')
            ->orderBy('year_plan')
            ->orderBy('month_plan')
            ->orderBy('week_plan')
            ->get();

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
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createWithData($id, $year)
    {
        $title = 'maintenance';

        $equipment_id = $id;
        $equipments = Equipment::all();
        $preventiveMaintenances = PreventiveMaintenance::where('equipment_id', $id)
            ->where('equipment_id', $id)
            ->where('year_plan', $year)
            ->get();

        return view('pemeliharaan_create', compact('title', 'equipment_id', 'year', 'equipments', 'preventiveMaintenances'));
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

        for ($i = 1; $i <= 12; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                $name = $i . '_' . $j;

                if ($request->$name) {
                    $preventiveMaintenance = PreventiveMaintenance::where('equipment_id', $request->equipment_id)
                        ->where('year_plan', $request->year)
                        ->where('month_plan', $i)
                        ->where('week_plan', $j)
                        ->first();

                    if (!$preventiveMaintenance) {
                        PreventiveMaintenance::create([
                            'equipment_id' => $request->equipment_id,
                            'quantity' => $request->quantity,
                            'biaya' => $request->biaya,
                            'year_plan' => $request->year,
                            'month_plan' => $i,
                            'week_plan' => $j,
                            'status' => 'Belum',
                        ]);
                    }
                }
            }
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lapor($id)
    {
        $title = 'maintenance';

        $preventiveMaintenance = PreventiveMaintenance::findOrFail($id);

        return view('pemeliharaan_lapor', compact('title', 'preventiveMaintenance'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preventiveMaintenance = PreventiveMaintenance::findOrFail($id);
        $preventiveMaintenance->delete();

        return redirect(route('pemeliharaan.index'));
    }
}
