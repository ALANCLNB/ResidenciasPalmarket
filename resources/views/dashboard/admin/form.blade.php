@csrf



@if ($mods =='si')
<div class="form-group">
    <label for="email">Actualiza el Correo Electrónico</label>
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email',$admin->email) }}">
</div>

<br>
<div class="dropdown-divider"></div>
<div class="form-group">
    <label for="password">Actualiza la Contraseña (si no se altera, no se vera afectada la contraseña actual)</label>
    <input class="form-control" type="password" name="pass1">
</div>


<div class="form-group">
    <label for="password">Repetir Contraseña</label>
    <input class="form-control" type="password" name="pass2">
</div>


@else  


<div class="form-group">
    <label for="email">Registra un Correo Electrónico</label>
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
</div>


<div class="form-group">
    <label for="password">Registra una cotraseña</label>
    <input class="form-control" type="password" name="password">
</div>


<div class="form-group">
    <label for="password">Repite la Contraseña</label>
    <input class="form-control" type="password" name="password2">
</div>

@endif




<input type="submit" value="Enviar" class="btn btn-info mb-5">