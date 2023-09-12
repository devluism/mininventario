<div class="modal-header">
    <h5 class="modal-title" id="outgoingModalTitle">{{ 'Registrar salida' }}</h5>
    <button type="button" class="btn-close box-shadow-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" action="{{ route('product.outgoing') }}" id="outgoingForm">
    @csrf
    <div class="modal-body px-2 mx-auto">
        <h4 class="fs-6 fw-bold">{{ $product->description }}</h4>
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="deliveryInput" class="form-label">Entrega</label>
                <div class="input-group" id="deliveryInput">
                    <input type="text" placeholder="Nombre" class="form-control" name="delivery_name" required>
                    <input type="text" placeholder="Cédula" class="form-control" name="delivery_id" required onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
            </div>         
            <div class="col-md-12 form-group">
                <label for="stockInput" class="form-label">Cantidad saliente</label>
                <input type="number" value="1" min="1" step="1" class="form-control" id="stockInput" name="stock" required onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            </div>           
            <div class="col-md-12 form-group">
                <label for="receiverInput" class="form-label">Recibe</label>
                <div class="input-group" id="receiverInput">
                    <input type="text" placeholder="Nombre" class="form-control" name="receiver_name" required>
                    <input type="text" placeholder="Cédula" class="form-control" name="receiver_id" required onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
            </div>  
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="type" value="1">
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-danger"><i class="fas fa-arrow-down me-2"></i>Registrar salida</button>
        <button type="button" class="btn btn-outline-secondary px-75" data-dismiss="modal" arial-label="close" data-bs-dismiss="modal">Cancelar</button>
    </div>
</form>
