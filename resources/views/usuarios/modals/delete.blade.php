
<div class="modal fade" id="deleteConfirmationAprobado{{ $socio->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 20px">
            <div class="modal-header" style="color: #000; background-color: #ffd040; border-top-right-radius:20px; border-top-left-radius:20px">
                <h4 class="modal-title">Eliminar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #000">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que quieres borrar la solicitud <b>{{ $socio->id }}</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <form action="{{ route('usuarios.destroy', $socio->id) }}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>

