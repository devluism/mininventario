<div class="modal-header">
    <h5 class="modal-title" id="supplierModalTitle">{{ 'Registrar Proveedor' }}</h5>
    <button type="button" class="btn-close box-shadow-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" action="{{ route('supplier.create') }}" id="createSupplierForm">
    @csrf
    <div class="modal-body modal-height px-2 mx-auto">
        <div class="row">
            <div class="col-12 form-group mb-3">
                <label for="nameInput" class="form-text">Nombre</label>
                <input type="text" placeholder="Nombre" class="form-control shadow-none" id="nameInput"
                    name="name" required>
            </div>
            <div class="col-12 form-group mb-3">
                <label for="codeInput" class="form-text">Código</label>
                <input type="text" placeholder="#" class="form-control shadow-none" id="codeInput"
                    name="code" required>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button onclick="createSupplier()" type="submit" class="btn btn-success"><i class="fas fa-building-user me-2"></i>Registrar proveedor</button>
        <button id="closeSupplierModalBtn" type="button" class="btn btn-outline-secondary px-75" data-dismiss="modal" arial-label="close" data-bs-dismiss="modal">Cancelar</button>
    </div>
</form>
