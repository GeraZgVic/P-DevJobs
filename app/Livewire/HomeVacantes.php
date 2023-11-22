<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacantes extends Component
{
    use WithPagination;

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    // Esta propiedad es útil cuando deseas que los parámetros de tu componente (en este caso, termino, categoria, y salario) 
    // se reflejen en la URL del navegador.
    // protected $queryString = ['termino','categoria','salario'];

    public $termino;
    public $categoria;
    public $salario;


    public function buscar($termino, $categoria, $salario) {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }
    
    public function render()
    {
        // $vacantes = Vacante::all();

        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
        })

        ->when($this->categoria, function($query) {
            $query->where(function ($subquery){
                if($this->categoria !=='all') {
                    $subquery->where('categoria_id', $this->categoria);
                }
            });
        })
        ->when($this->salario, function($query){
          $query->where(function($subquery){
            if($this->salario !=='all') {
                $subquery->where('salario_id',$this->salario);
            }
          });
        })->paginate(15);
        
          // ->when($this->categoria, function($query) {
        //     $query->where('categoria_id',$this->categoria);
        // })
        // ->when($this->salario, function($query){
        //   $query->where('salario_id', $this->salario);
        // })

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
