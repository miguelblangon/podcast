<form  class="form-floating" 
name="user_update" method="POST" action="{{ route('user.update.admin',['user'=>$user->id] )}}">
    @csrf
<div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" 
    name="email"  value="{{ $user->email  }}" >
    <label for="floatingInput">Email</label>
  </div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInputName" placeholder="name@example.com" 
    name="name"  value="{{ $user->name  }}" >
    <label for="floatingInputName">Nombre</label>
  </div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInputLastName" placeholder="name@example.com" 
    name="last_name"  value="{{ $user->last_name }}" >
    <label for="floatingInputLastName">Apellidos</label>
  </div>
  <div class="form-floating mb-3">
  <select class="form-select" name="rol" aria-label="Seleccion de Rol">
    <option  @if ($user->rol=='admin') selected @endif  value="admin">Administrador</option>
    <option @if ($user->rol=='user') selected @endif value="user">Usuario</option>
    
  </select>
  </div>



<div class="row justify-content-center align-items-center">
    <div class="col">
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
</div>
</form>