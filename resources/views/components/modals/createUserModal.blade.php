<div class="modal-header">
    <h5 class="modal-title" id="userModalTitle">{{ 'Registrar Jefe de Proyecto' }}</h5>
    <button type="button" class="btn-close box-shadow-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="POST" action="{{ route('user.create') }}" id="createUserForm">
    @csrf
    <div class="modal-body modal-height px-2 mx-auto">
        <div class="row">
            <div class="col-12 form-group mb-3">
                <label for="usernameInput" class="form-text">Usuario</label>
                <input type="text" placeholder="Usuario" class="form-control shadow-none" id="usernameInput"
                    name="username" required autocomplete="username">
            </div>
            <div class="col-sm-6 form-group mb-3">
                <label for="firstNameInput" class="form-text">Nombres</label>
                <input type="text" placeholder="Nombres" class="form-control shadow-none" id="firstNameInput"
                    name="first_name" required autocomplete="username">
            </div>
            <div class="col-sm-6 form-group mb-3">
                <label for="lastNameInput" class="form-text">Apellidos</label>
                <input type="text" placeholder="Apellidos" class="form-control shadow-none" id="lastNameInput"
                    name="last_name" required autocomplete="username">
            </div>
            <div class="col-sm-6 form-group mb-3">
                <label for="passwoedInput" class="form-text">Contraseña</label>
                <input type="password" placeholder="" class="form-control shadow-none" id="passwordInput"
                    name="password" required autocomplete="new-password">
            </div>
            <div class="col-sm-6 form-group mb-3">
                <label for="repeatedPasswordInput" class="form-text">Repetir contraseña</label>
                <input type="password" placeholder="" class="form-control shadow-none" id="rPasswordInput"
                    name="repeated_password" required autocomplete="new-password">
            </div>
            <div class="col-12 form-group mb-3">
                <label for="emailInput" class="form-text">Correo</label>
                <input type="email" name="email" id="emailInput" class="form-control shadow-none" autocomplete="email">
            </div>
            <input type="hidden" name="role" value="1" id="roleInput">
        </div>
    </div>

    <div class="modal-footer">
        <button onclick="createUser()" type="submit" class="btn btn-success"><i class="fas fa-user-check me-2"></i>Registrar jefe</button>
        <button id="closeUserModalBtn" type="button" class="btn btn-outline-secondary px-75" data-dismiss="modal" arial-label="close" data-bs-dismiss="modal">Cancelar</button>
    </div>
</form>
