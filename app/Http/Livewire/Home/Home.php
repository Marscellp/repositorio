<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Home extends Component
{
    public $pageTitle, $componentName;
    private $pagination = 1;
    // 
    //VARIABLES DE TITULO
    public function mount()
    {
        $this->pageTitle = 'Home';
        $this->componentName = 'Inicio';
    }
    // 
    public function render()
    {
        return view('livewire.home.home')
        ->extends('template.app')
        ->section('content');
    }
}
