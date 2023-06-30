<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    //Propiedades
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    /**
     * Represents the validation rules for a job posting form.
     *
     * These rules define the validation requirements for each input field in the job posting form.
     * The rules are defined as an associative array, where the key is the name of the input field
     * and the value is a string representing the validation rules for that field.
     *
     * @var array
     */
    protected $rules = [
        'titulo'         => 'required|string',
        'salario_id'     => 'required',
        'categoria_id'   => 'required',
        'empresa'        => 'required',
        'ultimo_dia'     => 'required',
        'descripcion'    => 'required',
        'imagen'         => 'required|image|max:1024',
    ];


    /**
     * Create a new vacancy and store it in the database
     *
     * @return RedirectResponse
     */
    public function crearVacante()
    {
        $datos = $this->validate();

        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);

        Vacante::create([
            'titulo'       => $datos['titulo'],
            'salario_id'   => $datos['salario_id'],
            'categoria_id' => $datos['categoria_id'],
            'empresa'      => $datos['empresa'],
            'ultimo_dia'   => $datos['ultimo_dia'],
            'descripcion'  => $datos['descripcion'],
            'imagen'       => $nombre_imagen,
            'user_id'      => auth()->user()->id
        ]);

        session()->flash('mensaje', 'La Vacante se publicó correctamente');

        return redirect()->route('vacantes.index');
    }


    /**
     * Render the view for the 'crear-vacante' component.
     *
     * @return View
     */
    public function render()
    {
        return view('livewire.crear-vacante', [
            'salarios'   => Salario::all()->pluck('salario', 'id'),
            'categorias' => Categoria::all()->pluck('categoria', 'id')
        ]);
    }
}
