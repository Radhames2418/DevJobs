<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    public function leerDatosFormulario(): void
    {
        $this->emit('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }


    public function render()
    {
        return view('livewire.filtrar-vacantes', [
            'categorias' => Categoria::all(),
            'salarios'   => Salario::all()
        ]);
    }
}
