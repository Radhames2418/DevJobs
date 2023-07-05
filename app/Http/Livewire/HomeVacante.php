<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacante extends Component
{

    public $termino;
    public $categoria;
    public $salario;


    protected $listeners = ['terminosBusqueda' => 'buscar'];


    public function buscar($termino, $categoria, $salario)
    {
        $this->termino   = $termino;
        $this->categoria = $categoria;
        $this->salario   = $salario;
        dd('desde componente padre');
    }


    public function render()
    {
        $vacantes = Vacante::all();

        return view('livewire.home-vacante', [
            'vacantes' => $vacantes
        ]);
    }
}
