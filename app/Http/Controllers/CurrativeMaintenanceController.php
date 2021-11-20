<?php

namespace App\Http\Controllers;

use App\Models\CurrativeMaintenance;
use App\Models\Project;
use Illuminate\Http\Request;

class CurrativeMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'maintenance';

        $currativeMaintenances = CurrativeMaintenance::orderBy('project_id')
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

        CurrativeMaintenance::create([
            'project_id' => $request->project_id,
            'year_plan' => $request->year_plan,
            'month_plan' => $request->month_plan,
            'week_plan' => $request->week_plan,
            'status' => 'Belum',
        ]);

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
