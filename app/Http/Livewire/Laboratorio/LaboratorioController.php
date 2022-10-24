<?php

namespace App\Http\Livewire\Laboratorio;
use App\Class\RulesMessageUser; //REGLAS
use App\Models\Laboratorio;
use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Trais
use Livewire\WithPagination;

class LaboratorioController extends Component
{
    //PAGINACION
    use WithFileUploads;
    use WithPagination;
    private $pagination = 10;                                       //VARIABLE DE PAGINACION
    //Pagination
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    //CREAMOS LAS VARIABLES INICIALES   
    public $pageTitle, $componentName;                              //TITULOS DE CABECERA
    public $laboratorio, $descripcion, $lab;     //VARIABLES DE FORMULARIO
    public $selected_id;                                            //VALIDADOR DE EDITAR O AGREGAR
    public $search;                                                 //VARIABLE DE BUSQUEDA DE USUARIO
    //VARIABLES DE TITULO
    public function mount()
    {
        $this->pageTitle = 'Laboratorios';
        $this->componentName = 'Administracion Laboratorios';
    }

    public function render()
    {
       if (strlen($this->search)) {
           $data = Laboratorio::where('laboratorio', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate($this->pagination);
       }else{
           $data = Laboratorio::orderBy('id', 'desc')->paginate($this->pagination);
       }
       return view('livewire.laboratorio.laboratorio', compact('data'))
       ->extends('template.app')
       ->section('content');
    }
    public function Store()
    {
        //VALIDACION DE FORMULARIO
        // $informationRulesMessage = new RulesMessageUser();
        // $informationRulesMessage->createRulesMessage();
        // $this->validate($informationRulesMessage->rulesCreate, $informationRulesMessage->messagesCreate);
        //GUARDADO DE INFORMACION
        $name_mini = strtolower($this->laboratorio);
        $name_mini = ucwords($name_mini);
        $laboratorio_add = Laboratorio::create([
            'laboratorio'      =>$name_mini,
            'descripcion'     =>$this->descripcion,
        ]);
        if ($laboratorio_add) {
            $this->emit('service-add', 'Laboratorio guardado correctamente');
        }else{
            $this->emit('service-error', 'Error intente mas tarde');
        }
        $this->resetUI();
    }
    //FUNCION EDIT CAPTURA TODAS LAS VARIABLES EN EL FORMULARIO
    public function Edit(Laboratorio $laboratorio)
    {   
        $this->selected_id  = $laboratorio->id;         //IDENTIFICADOR DE EDITAR AGREGAR
        $this->laboratorio  = $laboratorio->laboratorio;
        $this->descripcion  = $laboratorio->descripcion;
        $this->emit('service-modal-show', 'laboratorio');
    }
    //FUNCION UPDATE MODIFICA LOS DATOS
    public function Update()
    {
        //VALIDACION DE FORMULARIO
        // $informationRulesMessage = new RulesMessageUser();
        // $informationRulesMessage->updateRulesMessage($this->selected_id);
        // $this->validate($informationRulesMessage->rulesUpdate, $informationRulesMessage->messagesUpdate);
        //UPDATE
        $laboratorio_update = Laboratorio::find($this->selected_id);
        $name_mini = strtolower($this->laboratorio);
        $laboratorio_update->update([
            'laboratorio'      =>ucwords($name_mini),
            'descripcion'     =>$this->descripcion,
        ]);
        $this->emit('service-update', 'Laboratorio modificado correctamente');
        $this->resetUI();
    }
    //FUNCION DELETE DATOS
    public function Destroy(Laboratorio $laboratorio)
    {   
        $laboratorio->delete();
        $this->resetUI();
        $this->emit('service-delete', 'Laboratorio eliminado correctamente');
    }
    //FUNCION VIEW DATA
    public function View(Laboratorio $laboratorion){
        $this->lab        = $laboratorion->laboratorio;
        $this->descripcion        = $laboratorion->descripcion;
        $this->emit('service-view', $laboratorion->laboratorio);
    }
    //EVENTOS DE LIVEWIRE
    protected $listeners = [
        'deleteRow'         =>  'Destroy',
        'resetMessage'      =>  'resetMessage'
    ];
    //RESET DE VARIABLES
    public function resetUI()
    {
        $this->laboratorio         = "";
        $this->descripcion        = "";
        $this->selected_id  = 0;
    }
    //RESETEA LOS MESSAGES DEL FORM
    public function resetMessage(){
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
