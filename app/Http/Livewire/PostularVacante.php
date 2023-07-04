<?php

namespace App\Http\Livewire;

use App\Models\Candidato;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    /**
     * This file contains the implementation of the CV class.
     *
     * The CV class represents a Curriculum Vitae (CV) of a person. It provides methods to set and retrieve
     * information about the person's personal details, education, work experience, and skills.
     *
     * @package CV
     */
    public $cv;
    public $vacante;

    use WithFileUploads;


    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];


    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $this->validate();

        $cv = $this->cv->store('public/cv');
        $nombre_pdf = str_replace('public/cv/', '', $cv);

        $this->vacante->candidatos()->create([
            'user_id'    => auth()->user()->id,
            'cv'         => $nombre_pdf
        ]);


        session()->flash('mensaje', 'se envió correctamente tu información, mucha suerte');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
