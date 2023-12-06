<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Class StudentController
 * @package App\Http\Controllers
 */
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::get();
        $careers = Career::get();
        //echo "Hola Alejandro y joel";
        return view('student.index',["student" => $student],compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Career::get();
        return view('student.create', compact('careers'))->with( 'mensaje','el alumno se ha registrado correctamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$student = student::create($request->all());
        Student::create([
            'number_control'=> $request->number_control,
            'name'=> $request->name,
            'apellido_paterno'=> $request->apellido_paterno,
            'apellido_materno'=> $request->apellido_materno,
            'career_id'=> $request->career_id,
        ]);
        return redirect()->route('student.index');
        
        //request()->validate(Student::$rules);

       // $student = Student::create($request->all());

       // return redirect()->route('students.index')
          // ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $number_control = Student::pluck('number_control'); // Obtener todos los números de control
        $name = Student::pluck('name'); // Obtener todos los nombres
        $Apellido_Paterno = Student::pluck('Apellido_Paterno'); // Obtener todos los apellidos paternos
        $Apellido_Materno = Student::pluck('Apellido_Materno'); // Obtener todos los apellidos maternos
        $career = Career::all(); // Obtener todas las carreras
    
        return view('student.edit', compact('number_control', 'name', 'Apellido_Paterno', 'Apellido_Materno', 'career', 'student'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'number_control' => 'required',
            'name' => 'required',
            'Apellido_Paterno' => 'required',
            'Apellido_Materno' => 'required',
            'career' => 'required',
        ]);
    
        $student->update($data);
        return redirect()->route('student.update')->with('success', 'Estudiante actualizado exitosamente');
    }
    
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('mensaje','el alumno ha sido eliminado');
    
    }
}
