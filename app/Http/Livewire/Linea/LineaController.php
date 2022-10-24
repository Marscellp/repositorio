<?php

namespace App\Http\Livewire\Linea;

use App\Models\LineaInvestigacion;
use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Trais
use Livewire\WithPagination;

class LineaController extends Component
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
    public $titulo, $area, $linea_investigacion, $descripcion;     //VARIABLES DE FORMULARIO
    public $selected_id;                                            //VALIDADOR DE EDITAR O AGREGAR
    public $search;                                                 //VARIABLE DE BUSQUEDA DE USUARIO
    //VARIABLES DE TITULO
    public function mount()
    {
        $this->pageTitle = 'Lineas';
        $this->componentName = 'Administracion Laboratorios';
    }

    public function render()
    {
       if (strlen($this->search)) {
           $data = LineaInvestigacion::where('titulo', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate($this->pagination);
       }else{
           $data = LineaInvestigacion::orderBy('id', 'desc')->paginate($this->pagination);
       }
        return view('livewire.linea.linea', compact('data'))
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
        $name_mini = strtolower($this->titulo);
        $name_mini = ucwords($name_mini);
        $linea_add = LineaInvestigacion::create([
            'titulo'            =>$name_mini,
            'area'              =>$this->area,
            'linea_investigacion'             =>$this->linea_investigacion,
            'descripcion'       =>$this->descripcion,
        ]);
        if ($linea_add) {
            $this->emit('service-add', 'Linea de investigacion guardado correctamente');
        }else{
            $this->emit('service-error', 'Error intente mas tarde');
        }
        $this->resetUI();
    }
    //FUNCION EDIT CAPTURA TODAS LAS VARIABLES EN EL FORMULARIO
    public function Edit(LineaInvestigacion $linea)
    {   
        $this->selected_id  = $linea->id;         //IDENTIFICADOR DE EDITAR AGREGAR
        $this->titulo  = $linea->titulo;
        $this->area  = $linea->area;
        $this->linea_investigacion  = $linea->linea_investigacion;
        $this->descripcion  = $linea->descripcion;
        $this->emit('service-modal-show', 'linea');
    }
    //FUNCION UPDATE MODIFICA LOS DATOS
    public function Update()
    {
        //VALIDACION DE FORMULARIO
        // $informationRulesMessage = new RulesMessageUser();
        // $informationRulesMessage->updateRulesMessage($this->selected_id);
        // $this->validate($informationRulesMessage->rulesUpdate, $informationRulesMessage->messagesUpdate);
        //UPDATE
        $linea_update = LineaInvestigacion::find($this->selected_id);
        $name_mini = strtolower($this->titulo);
        $linea_update->update([
            'titulo'                    =>ucwords($name_mini),
            'area'                      =>$this->area,
            'linea_investigacion'       =>$this->linea_investigacion,
            'descripcion'               =>$this->descripcion,
        ]);
        $this->emit('service-update', 'Linea de investigacion modificado correctamente');
        $this->resetUI();
    }
    //FUNCION DELETE DATOS
    public function Destroy(LineaInvestigacion $linea)
    {   
        $linea->delete();
        $this->resetUI();
        $this->emit('service-delete', 'Linea de investigacion eliminado correctamente');
    }
    //FUNCION VIEW DATA
    public function View(LineaInvestigacion $linea){
        $this->titulo                          = $linea->titulo;
        $this->area                         = $linea->area;
        $this->descripcion                  = $linea->descripcion;
        $this->linea_investigacion          = $linea->linea_investigacion;
        $this->emit('service-view', $linea->laboratorio);
    }
    //EVENTOS DE LIVEWIRE
    protected $listeners = [
        'deleteRow'         =>  'Destroy',
        'resetMessage'      =>  'resetMessage'
    ];
    //RESET DE VARIABLES
    public function resetUI()
    {
        $this->titulo                       = "";
        $this->area                         = "";
        $this->linea_investigacion          = "";
        $this->descripcion                  = "";
        $this->selected_id  = 0;
    }
    //RESETEA LOS MESSAGES DEL FORM
    public function resetMessage(){
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
