<div class="modal-header">
    <h5 class="modal-title" id="warehouseModalTitle">{{ 'Registrar Almacen' }}</h5>
    <button type="button" class="btn-close box-shadow-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" action="{{ route('warehouse.create') }}" id="createWarehouseForm">
    @csrf
    <div class="modal-body modal-height px-2 mx-auto">
        <div class="row">
            <div class="col-12 form-group mb-3">
                <label for="descriptionInput" class="form-text">Descripción</label>
                <input type="text" placeholder="Descripción" class="form-control shadow-none" id="descriptionInput"
                    name="description" required>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button onclick="createWarehouse()" type="submit" class="btn btn-success"><i class="fas fa-warehouse me-2"></i>Registrar almacen</button>
        <button id="closeWarehouseModalBtn" type="button" class="btn btn-outline-secondary px-75" data-dismiss="modal" arial-label="close" data-bs-dismiss="modal">Cancelar</button>
    </div>
</form>
