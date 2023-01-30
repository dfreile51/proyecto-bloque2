<form action="{{ route('discos.destroy', ['disco' => $disco]) }}" method="post">
    @method('DELETE')
    @csrf
    {{-- Delete Warning Modal --}}
    <div class="modal fade" id="deleteModal{{ $disco->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Disco</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Se va a eliminar el disco <b>"{{ $disco->nombre }}"</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal"
                        class="btn btn-secondary">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</form>
