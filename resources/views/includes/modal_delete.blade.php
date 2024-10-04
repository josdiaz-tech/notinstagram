
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold">¿Está Seguro que Desea Borrar la Imagen?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Al borrar esta imagen no podrá recuperarla y la eliminará permanentemente de su cuenta
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-start">
                <a class="btn btn-primary pl-3 pr-3 pb-2 pt-2" 
                href="{{ route('image.delete', ['id' => $image->id]) }}">
                    Borrar
                </a>
                <button type="button" class="btn btn-outline-primary ml-3 pl-3 pr-3 pb-2 pt-2" 
                data-dismiss="modal">Cancelar</button>
                
            </div>

        </div>
    </div>
</div>
