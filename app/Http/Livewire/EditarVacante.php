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

    public function editarVacante()
    {
        $datos = $this->validate();
    }

    public function mount(Vacante $vacante)
    {
        $this->titulo       = $vacante->titulo;
        $this->salario_id   = $vacante->salario_id;
        $this->categoria_id = $vacante->categoria_id;
        $this->empresa      = $vacante->empresa;
        $this->ultimo_dia   = $vacante->ultimo_dia->format('Y-m-d');
        $this->descripcion  = $vacante->descripcion;
        $this->imagen       = $vacante->imagen;
    }


    public function render()
    {
        return view('livewire.editar-vacante', [
            'salarios'   => Salario::all()->pluck('salario', 'id'),
            'categorias' => Categoria::all()->pluck('categoria', 'id')
        ]);
    }
}
