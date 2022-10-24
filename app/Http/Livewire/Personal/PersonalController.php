<?php

namespace App\Http\Livewire\Personal;

use App\Models\Laboratorio;
use App\Models\LineaInvestigacion;
use App\Models\Personal;
use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Trais
use Livewire\WithPagination;

class PersonalController extends Component
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
    public $pageTitle, $componentName;       
    public $data_user, $data_linea, $data_laboratorio;                       //TITULOS DE CABECERA
    public $fecha_inicio, $fecha_final, $firma, $horario, $user_id, $linea_investigacions_id, $laboratorios_id;     //VARIABLES DE FORMULARIO
    public $name_pdf, $name_img;
    public $selected_id;                                            //VALIDADOR DE EDITAR O AGREGAR
    public $search;                                                 //VARIABLE DE BUSQUEDA DE USUARIO
    //VARIABLES DE TITULO
    public function mount()
    {
        $this->pageTitle = 'Personal';
        $this->componentName = 'Personal docente';
    }

    public function render()
    {
        if (strlen($this->search)) {
         //    $data = Personal::where('titulo', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate($this->pagination);
        }else{
            $data = Personal::orderBy('id', 'desc')->get();
        }
        $this->data_user = User::orderBy('id', 'asc')->get();
        $this->data_linea = LineaInvestigacion::orderBy('id', 'asc')->get();
        $this->data_laboratorio = Laboratorio::orderBy('id', 'asc')->get();
        // dd($this->data_user);
        return view('livewire.personal.personal', compact('data'))
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
        $personal_add = Personal::create([
            'fecha_inicio'                  =>$this->fecha_inicio,
            'fecha_final'                   =>$this->fecha_final,
            'user_id'                       =>$this->user_id,
            'linea_investigacions_id'       =>$this->linea_investigacions_id,
            'laboratorios_id'               =>$this->laboratorios_id,
        ]);
        //PDF
        $this->name_pdf;
        if($this->horario)
        {
            $this->name_pdf = uniqid().'_.'.$this->horario->extension();
            $personal_add->horario = $this->name_pdf;

            $this->horario->storeAs('/horario', $this->name_pdf);
        }
        $personal_add->save();
        //
        $this->name_img;
        if($this->firma)
        {
            $this->name_img = uniqid().'_.'.$this->firma->extension();
            $personal_add->firma = $this->name_img;

            $this->firma->storeAs('/firma', $this->name_img);
        }
        $personal_add->save();
        //
        if ($personal_add) {
            $this->emit('service-add', 'Personal guardado correctamente');
        }else{
            $this->emit('service-error', 'Error intente mas tarde');
        }
        $this->resetUI();
    }
    //FUNCION EDIT CAPTURA TODAS LAS VARIABLES EN EL FORMULARIO
    public function Edit(Personal $personal)
    {   
        $this->selected_id              = $personal->id;         //IDENTIFICADOR DE EDITAR AGREGAR
        $this->fecha_inicio             = $personal->fecha_inicio;
        $this->fecha_final              = $personal->fecha_final;
        $this->user_id                  = $personal->user_id;
        $this->linea_investigacions_id  = $personal->linea_investigacions_id;
        $this->laboratorios_id          = $personal->laboratorios_id;
        $this->horario                  = $personal->horario;
        $this->firma                    = $personal->firma;
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
        $this->fecha_inicio              = "";
        $this->fecha_final              = "";
        $this->user_id                  = "";
        $this->linea_investigacions_id  = "";
        $this->laboratorios_id          = "";
        $this->horario                  = null;
        $this->firma                    = null;
        $this->selected_id              = 0;
    }
    //RESETEA LOS MESSAGES DEL FORM
    public function resetMessage(){
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
