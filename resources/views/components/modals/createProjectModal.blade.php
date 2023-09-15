<div class="modal-header">
    <h5 class="modal-title" id="projectModalTitle">{{ 'Registrar proyecto' }}</h5>
    <button type="button" class="btn-close box-shadow-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="createProjectForm">
    @csrf
    <div class="modal-body modal-height px-2 mx-auto">
        <div class="row">
            <div class="col-12 form-group mb-3">
                <label for="titleInput" class="form-text">Título</label>
                <input type="text" placeholder="Título" class="form-control shadow-none" id="titleInput"
                    name="title" required>
            </div>
            <div class="col-12 form-group mb-3">
                <label for="urlInput" class="form-text">Archivo</label>
                <input type="text" name="url" id="urlInput" class="form-control shadow-none">
            </div>
            <div class="col-12 form-group mb-3">
                <label for="userSelect" class="form-text">Jefe de Proyecto</label>
                <div class="input-group">
                    <select class="form-select shadow-none" name="user_id" id="userSelect" required></select>
                    <button type="button" onclick="openObjectModal('user');" class="btn btn-primary shadow-none"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button onclick="createProject()" type="button" class="btn btn-success"><i class="fas fa-file me-2"></i>Registrar proyecto</button>
        <button id="closeProjectModalBtn" type="button" class="btn btn-outline-secondary px-75" data-dismiss="modal" arial-label="close" data-bs-dismiss="modal">Cancelar</button>
    </div>
</form>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="userModal" tabindex="-1" aria-labelledby="userModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
        <div class="modal-content p-1" id="userContent">
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getUsers()
    })
</script>