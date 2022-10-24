<?php

namespace App\Http\Livewire\Diario;

use App\Models\Diario;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Trais
use Livewire\WithPagination;

class DiarioController extends Component
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
    public $fecha, $hora, $resumen, $procedimiento, $observacion;     //VARIABLES DE FORMULARIO
    public $selected_id, $linea_investigacions_id, $personals_id, $laboratorios_id;                                            //VALIDADOR DE EDITAR O AGREGAR
    public $search;      
    // 
    //VARIABLES DE TITULO
    public function mount()
    {
        $this->pageTitle = 'Diario';
        $this->componentName = 'Informe Diario';
    }
    // 
    public function render()
    {

        $data = Personal::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->get();
        //ID DE VALORES DE CLAVES DE TABLAS
        foreach ($data as $info) {
            $this->linea_investigacions_id = $info->linea_investigacions->id;
            $this->personals_id = $info->id;
            $this->laboratorios_id = $info->laboratorios->id;
        }
        $data_diario = Diario::orderBy('id', 'desc')->get();
        // foreach ($data_diario as $info) {
        //     dd($info->personals->user->name);
        // }
        return view('livewire.diario.diario', [
            'data' => $data,
            'data_diario' => $data_diario,
        ])
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
       
        $diario_add = Diario::create([
            'fecha'                         =>$this->fecha,
            'hora'                          =>$this->hora,
            'resumen'                       =>$this->resumen,
            'procedimiento'                 =>$this->procedimiento,
            'observacion'                   =>$this->observacion,
            'linea_investigacions_id'       =>$this->linea_investigacions_id,
            'personals_id'                  =>$this->personals_id,
            'laboratorios_id'               =>$this->laboratorios_id,
        ]);
        if ($diario_add) {
            $this->emit('service-add', 'Informacion guardado correctamente');
        }else{
            $this->emit('service-error', 'Error intente mas tarde');
        }
        $this->resetUI();
    }
    //FUNCION EDIT CAPTURA TODAS LAS VARIABLES EN EL FORMULARIO
    public function Edit(Diario $diario)
    {   
        $this->selected_id  = $diario->id;         //IDENTIFICADOR DE EDITAR AGREGAR
        $this->fecha  = $diario->fecha;
        $this->hora  = $diario->hora;
        $this->resumen  = $diario->resumen;
        $this->procedimiento  = $diario->procedimiento;
        $this->observacion  = $diario->observacion;
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
        $linea_update = Diario::find($this->selected_id);
        $linea_update->update([
            'fecha'                    =>$this->fecha,
            'hora'                     =>$this->hora,
            'resumen'                  =>$this->resumen,
            'procedimiento'            =>$this->procedimiento,
            'observacion'              =>$this->observacion,
        ]);
        $this->emit('service-update', 'Diario modificado correctamente');
        $this->resetUI();
    }
    //FUNCION DELETE DATOS
    public function Destroy(Diario $linea)
    {   
        $linea->delete();
        $this->resetUI();
        $this->emit('service-delete', 'Linea de investigacion eliminado correctamente');
    }
    //FUNCION VIEW DATA
    public function View(Diario $diario){
        $this->fecha                          = $diario->fecha;
        $this->hora                         = $diario->hora;
        $this->resumen                  = $diario->resumen;
        $this->procedimiento          = $diario->procedimiento;
        $this->observacion          = $diario->observacion;
        $this->emit('service-view', $diario->id);
    }
    //EVENTOS DE LIVEWIRE
    protected $listeners = [
        'deleteRow'         =>  'Destroy',
        'resetMessage'      =>  'resetMessage'
    ];
    //RESET DE VARIABLES
    public function resetUI()
    {
        $this->fecha                       = "";
        $this->hora                         = "";
        $this->resumen          = "";
        $this->procedimiento                  = "";
        $this->observacion                  = "";
        $this->selected_id  = 0;
    }
    //RESETEA LOS MESSAGES DEL FORM
    public function resetMessage(){
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
