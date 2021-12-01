<?php

namespace App\Http\Controllers;

use App\Models\Coordination;
use Illuminate\Http\Request;

class CoordinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'koordinasi';

        $coordinations = Coordination::orderBy('date_time')
            ->get();

        return view('koordinasi', compact('title', 'coordinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'koordinasi';

        return view('koordinasi_create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coordination::create([
            'date_time' => $request->date_time,
            'tema_koordinasi' => $request->tema_koordinasi,
            'link_zoom' => $request->link_zoom,
        ]);

        return redirect(route('koordinasi.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lapor($id)
    {
        $title = 'koordinasi';

        $coordination = Coordination::findOrFail($id);

        return view('koordinasi_lapor', compact('title', 'coordination'));
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
        $coordination = Coordination::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $name);

            $coordination->update([
                'keterangan' => $request->keterangan,
                'image_path' => $name
            ]);
        } else {
            $coordination->update([
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect(route('koordinasi.index'));
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
        $coordination = Coordination::query()->findOrFail($id);
        $coordination->delete();

        return redirect(route('koordinasi.index'));
    }
}
