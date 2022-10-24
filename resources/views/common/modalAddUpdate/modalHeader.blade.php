<div wire:ignore.self class="modal fade" tabindex="-1" id="modalAddUpdate">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header {{$selected_id > 0 ? 'bg-success' : 'bg-primary'}}">
          <h5 class="modal-title">{{$selected_id > 0 ? 'Editar' : 'Agregar' }} {{$pageTitle}}</h5>
          </button>
        </div>
        <div class="modal-body">