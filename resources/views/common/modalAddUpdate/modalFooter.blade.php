        </div>
            <div class="modal-footer">
                @if ($selected_id > 0)
                    <button type="button" class="btn btn-success" wire:click.prevent="Update()">Editar</button>
                @else
                    <button type="button" class="btn btn-success" wire:click.prevent="Store()">Guardar</button>
                @endif
                <button wire:click.prevent="resetUI()" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>