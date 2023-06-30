<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    //Propiedades
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    public $vacante;

    public function __construct($vacante)
    {
        $this->vacante = $vacante;
    }


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

    public function crearVacante()
    {
        $datos = $this->validate();

        // Guardar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);

        // Crear la vacante
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

        // Crear un mensaje
        session()->flash('mensaje', 'La Vacante se publicó correctamente');

        // Redireccionar al usuario
        return redirect()->route('vacantes.index');
    }


    public function render()
    {
        return view('livewire.editar-vacante', [
            'salarios'   => Salario::all()->pluck('salario', 'id'),
            'categorias' => Categoria::all()->pluck('categoria', 'id')
        ]);
    }
}
