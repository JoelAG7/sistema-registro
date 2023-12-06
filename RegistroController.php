<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class RegistroController
 * @package App\Http\Controllers
 */
class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registro = Registro::get();
        //echo "Hola Alejandro y joel";
        return view('registro.index',["registro" => $registro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registro = new registro();
        return view('registro.create', compact('registro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        $this->validate($request,[
            'control_number' => 'required|min:8|max:10',
        ]);
        //dd($request->control_number);
        Registro::create([
            'control_number' => $request->control_number,
        ]);
        

        return redirect('/',);
        //request()->validate(Registro::$rules);

        //$registro = Registro::create($request->all());

        //return redirect()->route('registro')
        //    ->with('success', 'Registro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = Registro::find($id);

        return view('registro.show', compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Registro::find($id);

        return view('registro.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param   $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        request()->validate(Registro::$rules);

        $registro->update($request->all());

        return redirect()->route('registro.index')
            ->with('success', 'Registro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $registro = Registro::find($id)->delete();

        return redirect()->route('registro.index')
            ->with('success', 'registro deleted successfully');
    }
}
