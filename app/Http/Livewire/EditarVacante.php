<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{

    public $vacante_id;
    /**
     * Represents a title.
     *
     * @property string $texto The text of the title.
     */
    public $titulo;
    /**
     * Represents the identifier of a salary.
     *
     * @var int $salario_id The salary identifier.
     */
    public $salario_id;
    /**
     * Retrieves the category ID.
     *
     * @param int $categoria_id The identifier for the category.
     * @return int The category ID.
     */
    public $categoria_id;
    /**
     * Represents a company.
     *
     * This class provides methods to interact with the company's information.
     */
    public $empresa;
    /**
     * Calculate the last day of the given month and year.
     *
     * @param int $month The month value (1-12).
     * @param int $year The year value (e.g.,
     * 2021).
     * @return int The last day of the month.
     */
    public $ultimo_dia;
    /**
     * This function determines the description of a given code.
     *
     * @param string $code The code for which the description needs to be determined.
     * @return string The description of the given code.
     */
    public $descripcion;
    /**
     * Represents an Image class.
     *
     * This class provides methods to manipulate and process images.
     *
     * @package
     * MyPackage
     * @subpackage
     * Image
     */
    public $imagen;
    public $imagen_nueva;


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
        'imagen_nueva'   => 'nullable|image|max:1024'
    ];

    public function editarVacante()
    {
        $datos = $this->validate();

        $vacante = Vacante::find($this->vacante_id);

        // Guardar la imagen
        if (!is_null($this->imagen_nueva))
        {
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $nombre_imagen = str_replace('public/vacantes/', '', $imagen);
        }


        $fillValues = [
            'titulo'        =>  $datos['titulo'],
            'salario_id'    =>  $datos['salario_id'],
            'categoria_id'  =>  $datos['categoria_id'],
            'empresa'       =>  $datos['empresa'],
            'ultimo_dia'    =>  $datos['ultimo_dia'],
            'descripcion'   =>  $datos['descripcion'],
            'imagen'        =>  $this->imagen_nueva ? $nombre_imagen : $this->imagen
        ];

        $vacante->fill($fillValues);

        $vacante->save();

        session()->flash('mensaje', 'La Vacante se actualizó correctamente');

        return redirect()->route('vacantes.index');
    }

    /**
     * Mounts the properties of a Vacante object into the current object.
     *
     * @param Vacante $vacante The Vacante object with the properties to be mounted.
     * @return void
     */
    public function mount(Vacante $vacante)
    {
        $this->vacante_id    =  $vacante->id;
        $this->titulo        =  $vacante->titulo;
        $this->salario_id    =  $vacante->salario_id;
        $this->categoria_id  =  $vacante->categoria_id;
        $this->empresa       =  $vacante->empresa;
        $this->ultimo_dia    =  $vacante->ultimo_dia->format('Y-m-d');
        $this->descripcion   =  $vacante->descripcion;
        $this->imagen        =  $vacante->imagen;
    }


    public function render()
    {
        return view('livewire.editar-vacante', [
            'salarios'   => Salario::all()->pluck('salario', 'id'),
            'categorias' => Categoria::all()->pluck('categoria', 'id')
        ]);
    }
}
