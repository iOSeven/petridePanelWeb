<form action="{{ route('usuarios.destroy', $socio->id) }}" method="POST">
    @csrf
    @method("delete")

    <div class="modal fade" id="deleteConfirmationAprobado{{ $socio->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cuidado</h4>
                    <button type="button" class="close bg-red" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                </div>
                <div class="modal-body">
                    Estas seguro que quieres borrar la solicitud <b>{{ $socio->id }}</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

</form>