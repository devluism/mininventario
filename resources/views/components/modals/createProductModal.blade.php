<div class="modal-header">
    <h5 class="modal-title" id="productModalTitle">{{ 'Registrar producto' }}</h5>
    <button type="button" class="btn-close box-shadow-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" action="{{ route('product.create') }}" id="createpProductForm">
    @csrf
    <div class="modal-body modal-height px-2 mx-auto">
        <div class="row">
            <div class="col-md-8 form-group mb-3">
                <label for="descriptionInput" class="form-text">Descripción</label>
                <input type="text" placeholder="Descripción" class="form-control shadow-none" id="descriptionInput"
                    name="description" required>
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="stockInput" class="form-text">Cantidad</label>
                <input type="number" value="1" min="1" step="1" class="form-control shadow-none"
                    id="stockInput" name="stock" required
                    onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            </div>
            <div class="col-12 form-group mb-3">
                <label for="projectSelect" class="form-text">Proyecto</label>
                <div class="input-group">
                    <select class="form-select shadow-none" name="project_id" id="projectSelect" required></select>
                    <button type="button" onclick="openObjectModal('project');" class="btn btn-primary shadow-none"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="col-12 form-group mb-3">
                <label for="supplierSelect" class="form-text">Proveedor</label>
                <div class="input-group">
                    <select class="form-select shadow-none" name="supplier_id" id="supplierSelect" required></select>
                    <button type="button" onclick="openObjectModal('supplier');" class="btn btn-primary shadow-none"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="col-12 form-group mb-3">
                <label for="warehouseSelect" class="form-text">Almacen</label>
                <div class="input-group">
                    <select class="form-select shadow-none" name="warehouse_id" id="warehouseSelect" required></select>
                    <button type="button" onclick="openObjectModal('warehouse');" class="btn btn-primary shadow-none"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fas fa-circle-check me-2"></i>Registrar
            producto</button>
        <button type="button" class="btn btn-outline-secondary px-75" arial-label="close" data-bs-dismiss="modal">Cancelar</button>
    </div>
</form>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="projectModal" tabindex="-1" aria-labelledby="projectModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content p-1" id="projectContent">
        </div>
    </div>
</div>
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content p-1" id="supplierContent">
        </div>
    </div>
</div>
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="warehouseModal" tabindex="-1" aria-labelledby="warehouseModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content p-1" id="warehouseContent">
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getProjects()
        getSuppliers()
        getWarehouses()
    })
</script>
