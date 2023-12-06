<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class CareerController
 * @package App\Http\Controllers
 */
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $career = Career::get();
        //echo "Hola Alejandro y joel";
        return view('Career.index',["career" => $career]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $career = new Career();
        return view('career.create', compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Career::$rules);

        $career = Career::create($request->all());

        return redirect()->route('career.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrer = Career::find($id);

        return view('career.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrer = Career::find($id);

        return view('career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Career $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        request()->validate(Career::$rules);

        $career->update($request->all());

        return redirect()->route('career.index')
            ->with('success', 'career updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carrer = Career::find($id)->delete();

        return redirect()->route('careers.index')
            ->with('success', 'Career deleted successfully');
    }
}
