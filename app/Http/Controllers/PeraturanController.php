<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use App\Http\Requests\PeraturanRequest;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peraturans = Peraturan::paginate(10);

        return view('peraturan.index', [
            'peraturan' => $peraturans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('peraturan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeraturanRequest $request)
    {
        //
        $data = $request->all();

        Peraturan::create($data);

        return redirect()->route('peraturan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Peraturan $peraturans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Peraturan $peraturan)
    {
        //
        return view('peraturan.edit', [
            'file' => $peraturan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peraturan $peraturan)
    {
        //
        $data = $request->all();

        if ($request->file('picturePath')) {
            $data['picturePath'] = $request->file('picturePath')->store('assets/peraturan', 'public');
        }

        $peraturan->update($data);

        return redirect()->route('peraturan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peraturan $peraturan)
    {
        //
        $peraturan->delete();

        return redirect()->route('peraturan.index');
    }
}
