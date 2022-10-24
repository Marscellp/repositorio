<?php

namespace App\Http\Livewire\User;

use App\Class\RulesMessageUser; //REGLAS
use Livewire\Component;
use App\Models\User;
//
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads; //Trais
use Livewire\WithPagination;
//
class UserController extends Component
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
    public $name, $email, $ci, $phone, $type, $status, $avatar;     //VARIABLES DE FORMULARIO
    public $selected_id;                                            //VALIDADOR DE EDITAR O AGREGAR
    public $search;                                                 //VARIABLE DE BUSQUEDA DE USUARIO
    //VARIABLES DE TITULO
    public function mount()
    {
        $this->pageTitle = 'Usuarios';
        $this->componentName = 'Administracion';
    }

    public function render()
    {
        if (strlen($this->search)) {
            $data = User::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate($this->pagination);
        }else{
            $data = User::orderBy('id', 'desc')->paginate($this->pagination);
        }
        return view('livewire.user.user', compact('data'))
        ->extends('template.app')
        ->section('content');
    }
    public function Store()
    {
        //VALIDACION DE FORMULARIO
        $informationRulesMessage = new RulesMessageUser();
        $informationRulesMessage->createRulesMessage();
        $this->validate($informationRulesMessage->rulesCreate, $informationRulesMessage->messagesCreate);
        //GUARDADO DE INFORMACION
        $name_mini = strtolower($this->name);
        $name_mini = ucwords($name_mini);
        $user_add = User::create([
            'name'      =>$name_mini,
            'email'     =>$this->email,
            'ci'        =>$this->ci,
            'password'  =>bcrypt($this->ci),
            'phone'     =>$this->phone,
            'type'      =>$this->type,
            'status'    =>$this->status
        ]);
        if ($user_add) {
            $this->emit('service-add', 'Usuario guardado correctamente');
        }else{
            $this->emit('service-error', 'Error intente mas tarde');
        }
        $this->resetUI();
    }
    //FUNCION EDIT CAPTURA TODAS LAS VARIABLES EN EL FORMULARIO
    public function Edit(User $user)
    {   
        $this->selected_id  = $user->id;         //IDENTIFICADOR DE EDITAR AGREGAR
        $this->name         = $user->name;
        $this->email        = $user->email;
        $this->ci           = $user->ci;
        $this->phone        = $user->phone;
        $this->type         = $user->type;
        $this->status       = $user->status;       
        $this->emit('service-modal-show', 'user');
    }
    //FUNCION UPDATE MODIFICA LOS DATOS
    public function Update()
    {
        //VALIDACION DE FORMULARIO
        $informationRulesMessage = new RulesMessageUser();
        $informationRulesMessage->updateRulesMessage($this->selected_id);
        $this->validate($informationRulesMessage->rulesUpdate, $informationRulesMessage->messagesUpdate);
        //UPDATE
        $user_update = User::find($this->selected_id);
        $name_mini = strtolower($this->name);
        $user_update->update([
            'name'      =>ucwords($name_mini),
            'email'     =>$this->email,
            'ci'        =>$this->ci,
            'phone'     =>$this->phone,
            'type'      =>$this->type,
            'status'    =>$this->status     
        ]);
        $this->emit('service-update', 'Usuario modificado correctamente');
        $this->resetUI();
    }
    //FUNCION DELETE DATOS
    public function Destroy(User $user)
    {   
        $user->delete();
        $this->resetUI();
        $this->emit('service-delete', 'Usuario eliminado correctamente');
    }
    //FUNCION VIEW DATA
    public function View(User $user){
        $this->name         = $user->name;
        $this->email        = $user->email;
        $this->ci           = $user->ci;
        $this->phone        = $user->phone;
        $this->type         = $user->type;
        $this->status       = $user->status;  
        $this->avatar       = is_null($user->avatar) ? 'storage/default/no-avatar.png': $user->avatar ;
        $this->emit('service-view', $user->name);
    }
    //EVENTOS DE LIVEWIRE
    protected $listeners = [
        'deleteRow'         =>  'Destroy',
        'resetMessage'      =>  'resetMessage'
    ];
    //RESET DE VARIABLES
    public function resetUI()
    {
        $this->name         = "";
        $this->email        = "";
        $this->ci           = "";
        $this->phone        = "";
        $this->type         = "";
        $this->status       = "";
        $this->selected_id  = 0;
    }
    //RESETEA LOS MESSAGES DEL FORM
    public function resetMessage(){
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
