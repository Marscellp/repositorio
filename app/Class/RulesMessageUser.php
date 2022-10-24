<?php
namespace App\Class;
class RulesMessageUser {
    public $rulesCreate, $messageCreate;
    public $rulesUpdate, $messageUpdate;
    public function createRulesMessage()
    {
        $this->rulesCreate = [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'ci'        => 'required|unique:users',
            'phone'     => 'required',
            'type'      => 'required',
            'status'    => 'required',

        ];
        $this->messagesCreate = [
            'name.required'     => 'El nombre de usuario es requerido',
            'email.required'    => 'El email es requerido',
            'email.unique'      => 'El email ya esta registrado',
            'ci.required'       => 'El carnet identidad es requerido',
            'ci.unique'         => 'El carnet identidad ya esta registrado',
            'phone.required'    => 'El telefono es requerido',
            'type.required'     => 'El tipo es requerido',
            'status.required'   => 'El estado es requerido',
        ];
    }
    public function updateRulesMessage($id)
    {
        $this->rulesUpdate = [
            'name'      => 'required',
            'email'     => "required|unique:users,email,{$id}",
            'ci'        => "required|unique:users,ci,{$id}",
            'phone'     => 'required',
            'type'      => 'required',
            'status'    => 'required',
        ];
        $this->messagesUpdate = [
            'name.required'     => 'El nombre de usuario es requerido',
            'email.required'    => 'El email es requerido',
            'email.unique'      => 'El email ya esta registrado',
            'ci.required'       => 'El carnet identidad es requerido',
            'ci.unique'         => 'El carnet identidad ya esta registrado',
            'phone.required'    => 'El telefono es requerido',
            'type.required'     => 'El tipo es requerido',
            'status.required'   => 'El estado es requerido',
        ];
    }
}
