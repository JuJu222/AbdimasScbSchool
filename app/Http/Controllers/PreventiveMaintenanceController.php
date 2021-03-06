<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\PreventiveMaintenance;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $preventiveMaintenances = PreventiveMaintenance::orderBy('school_id')
            ->orderBy('equipment_id')
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
     * @return \Illuminate\Http\Response
     */
    public function createWithData($school_id, $year, $equipment_id)
    {
        $title = 'maintenance';

        $schools = School::all();
        $equipments = Equipment::all();
        $preventiveMaintenances = PreventiveMaintenance::where('school_id', $school_id)
            ->where('year_plan', $year)
            ->where('equipment_id', $equipment_id)
            ->get();

        return view('pemeliharaan_create', compact('title', 'school_id', 'year', 'equipment_id', 'equipments', 'schools', 'preventiveMaintenances'));
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
                        ->where('school_id', $request->school_id)
                        ->where('year_plan', $request->year)
                        ->where('month_plan', $i)
                        ->where('week_plan', $j)
                        ->first();

                    if (!$preventiveMaintenance) {
                        PreventiveMaintenance::create([
                            'school_id' => $request->school_id,
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
        $title = 'maintenance';

        $schools = School::all();
        $equipments = Equipment::all();
        $preventiveMaintenance = PreventiveMaintenance::query()->findOrFail($id);

        return view('pemeliharaan_edit', compact('title', 'schools', 'equipments', 'preventiveMaintenance'));
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
        $preventiveMaintenance = PreventiveMaintenance::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $name);

            if ($preventiveMaintenance->image_path) {
                File::delete(public_path('/img/uploads') . '/' . $preventiveMaintenance->image_path);
            }

            $preventiveMaintenance->update([
                'school_id' => $request->school_id,
                'equipment_id' => $request->equipment_id,
                'quantity' => $request->quantity,
                'biaya' => $request->biaya,
                'year_plan' => $request->year_plan,
                'month_plan' => $request->month_plan,
                'week_plan' => $request->week_plan,
                'year_real' => $request->year_real,
                'month_real' => $request->month_real,
                'date_real' => $request->date_real,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
                'image_path' => $name
            ]);
        } else {
            $preventiveMaintenance->update([
                'school_id' => $request->school_id,
                'equipment_id' => $request->equipment_id,
                'quantity' => $request->quantity,
                'biaya' => $request->biaya,
                'year_plan' => $request->year_plan,
                'month_plan' => $request->month_plan,
                'week_plan' => $request->week_plan,
                'year_real' => $request->year_real,
                'month_real' => $request->month_real,
                'date_real' => $request->date_real,
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect(route('pemeliharaan.index'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporStore (Request $request, $id)
    {
        $preventiveMaintenance = PreventiveMaintenance::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $name);

            if ($preventiveMaintenance->image_path) {
                File::delete(public_path('/img/uploads') . '/' . $preventiveMaintenance->image_path);
            }

            $preventiveMaintenance->update([
                'year_real' => $request->year_real,
                'month_real' => $request->month_real,
                'date_real' => $request->date_real,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
                'image_path' => $name
            ]);
        } else {
            $preventiveMaintenance->update([
                'year_real' => $request->year_real,
                'month_real' => $request->month_real,
                'date_real' => $request->date_real,
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect(route('pemeliharaan.index'));
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

        File::delete(public_path('/img/uploads') . '/' . $preventiveMaintenance->image_path);
        $preventiveMaintenance->delete();

        return redirect(route('pemeliharaan.index'));
    }

    public function destroyMany(Request $request)
    {
        foreach ($request->message as $area)
        {
            $preventiveMaintenance = PreventiveMaintenance::findOrFail($area['preventive_maintenance_id']);

            File::delete(public_path('/img/uploads') . '/' . $preventiveMaintenance->image_path);
            $preventiveMaintenance->delete();
        }

        $response = array(
            'status' => 'success'
        );

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyImage($id)
    {
        $preventiveMaintenance = PreventiveMaintenance::findOrFail($id);

        File::delete(public_path('/img/uploads') . '/' . $preventiveMaintenance->image_path);
        $preventiveMaintenance->update([
            'image_path' => null
        ]);

        return redirect(route('pemeliharaan.edit', $id));
    }
}
