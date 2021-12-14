<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\CurrativeMaintenance;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CurrativeMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'currative_maintenance';

        $currativeMaintenances = CurrativeMaintenance::orderBy('school_id')
            ->orderBy('project_id')
            ->orderBy('year_plan')
            ->orderBy('month_plan')
            ->orderBy('week_plan')
            ->get();

        return view('perawatan', compact('title', 'currativeMaintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'maintenance';

        $projects = Project::all();

        return view('perawatan_create', compact('title', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWithData($school_id, $year, $project_id)
    {
        $title = 'maintenance';

        $schools = School::all();
        $projects = Project::all();
        $currativeMaintenances = CurrativeMaintenance::where('school_id', $school_id)
            ->where('year_plan', $year)
            ->where('project_id', $project_id)
            ->get();

        return view('perawatan_create', compact('title', 'school_id', 'year', 'project_id', 'projects', 'schools', 'currativeMaintenances'));
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
                    $currativeMaintenance = CurrativeMaintenance::where('project_id', $request->project_id)
                        ->where('school_id', $request->school_id)
                        ->where('year_plan', $request->year)
                        ->where('month_plan', $i)
                        ->where('week_plan', $j)
                        ->first();

                    if (!$currativeMaintenance) {
                        CurrativeMaintenance::create([
                            'school_id' => $request->school_id,
                            'project_id' => $request->project_id,
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

        return redirect(route('perawatan.index'));
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
        $projects = Project::all();
        $currativeMaintenance = CurrativeMaintenance::query()->findOrFail($id);

        return view('perawatan_edit', compact('title', 'schools', 'projects', 'currativeMaintenance'));
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
        $currativeMaintenance = CurrativeMaintenance::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $name);

            if ($currativeMaintenance->image_path) {
                File::delete(public_path('/img/uploads') . '/' . $currativeMaintenance->image_path);
            }

            $currativeMaintenance->update([
                'school_id' => $request->school_id,
                'project_id' => $request->project_id,
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
            $currativeMaintenance->update([
                'school_id' => $request->school_id,
                'project_id' => $request->project_id,
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

        return redirect(route('perawatan.index'));
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

        $currativeMaintenance = CurrativeMaintenance::findOrFail($id);

        return view('perawatan_lapor', compact('title', 'currativeMaintenance'));
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
        $currativeMaintenance = CurrativeMaintenance::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $name);

            if ($currativeMaintenance->image_path) {
                File::delete(public_path('/img/uploads') . '/' . $currativeMaintenance->image_path);
            }

            $currativeMaintenance->update([
                'year_real' => $request->year_real,
                'month_real' => $request->month_real,
                'date_real' => $request->date_real,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
                'image_path' => $name
            ]);
        } else {
            $currativeMaintenance->update([
                'year_real' => $request->year_real,
                'month_real' => $request->month_real,
                'date_real' => $request->date_real,
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect(route('perawatan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currativeMaintenance = CurrativeMaintenance::findOrFail($id);

        File::delete(public_path('/img/uploads') . '/' . $currativeMaintenance->image_path);
        $currativeMaintenance->delete();

        return redirect(route('perawatan.index'));
    }

    public function destroyMany(Request $request)
    {
        foreach ($request->message as $area)
        {
            $currativeMaintenance = CurrativeMaintenance::findOrFail($area['currative_maintenance_id']);

            File::delete(public_path('/img/uploads') . '/' . $currativeMaintenance->image_path);
            $currativeMaintenance->delete();
        }

        $response = array(
            'status' => 'success'
        );

        return response()->json($response);
    }

    public function destroyImage($id)
    {
        $currativeMaintenance = CurrativeMaintenance::findOrFail($id);

        File::delete(public_path('/img/uploads') . '/' . $currativeMaintenance->image_path);
        $currativeMaintenance->update([
            'image_path' => null
        ]);

        return redirect(route('perawatan.edit', $id));
    }
}
