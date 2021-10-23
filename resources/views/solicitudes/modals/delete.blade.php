<div class="modal fade" id="deleteConfirmation{{ $solicitud->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cuidado</h4>
                <button type="button" class="close bg-red" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres borrar la solicitud <b>{{ $solicitud->id }}</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <form id="formConfirmation{{ $solicitud->id }}" action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" form="formConfirmation{{ $solicitud->id }}">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>