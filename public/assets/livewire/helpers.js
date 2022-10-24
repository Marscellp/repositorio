document.addEventListener('DOMContentLoaded', ()=> {
    //SERVICIOS CRUD SWEET ALERTS
    //SERVICIOS DE CRUD DE SWEET ALERTS
    window.livewire.on('service-add', msg => {
        $("#modalAddUpdate").modal("hide");
        swal.fire({
            icon: 'success',
            title: 'Exito al guardar',
            text : msg,
        })
    });
    window.livewire.on('service-update', msg => {
        $("#modalAddUpdate").modal("hide");
        swal.fire({
            icon: 'success',
            title: 'Exito al modificar',
            text : msg,
        })
    })
    window.livewire.on('service-delete', msg => {
        swal.fire({
            icon: 'success',
            title: 'Exito al eliminar',
            text : msg,
        })
    })
    window.livewire.on('service-error', msg => {
        swal.fire({
            icon: 'error',
            title: 'Fallo servicio',
            text : msg,
        })
    })
    window.livewire.on('service-warning', msg => {
        swal.fire({
            icon: 'warning',
            title: 'Se encontro un problema',
            text : msg,
        })
    })
    window.livewire.on('service-view', msg => {
        $("#modalView").modal("show");
    })
    //OPEN/CLOSE MODAL
    window.livewire.on('service-modal-show', msg=> {
        $("#modalAddUpdate").modal("show");
    })
    window.livewire.on('service-modal-hide', msg=> {
        $("#modalAddUpdate").modal("hide");
    })
    //RESET MESSAGE FORMULARIO
    $('#modalAddUpdate').on('hidden.bs.modal', ()=> {
        window.livewire.emit('resetMessage');
    })
});
//FUNCION ABRIR MODAL 
const openModal = () => {
    $("#modalAddUpdate").modal('show');
};
//FUNCION CONFIRMAR ELIMANAR FILA
const openConfirm = (id) => {
    swal.fire({
        title   :   "Confirmar",
        text    :   "Confirmar eliminar el registro",
        type    :   "warning",
        showCancelButton: true,
        cancelButtonText : "Cancelar",
        confirmButtonText: "Eliminar",
    }).then((result) => {
        if(result.isConfirmed){
            window.livewire.emit('deleteRow', id);
            swal.close;
        }
    });
}