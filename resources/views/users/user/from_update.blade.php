<form  class="form-floating" 
name="user_update" method="POST" action="{{ route('user.update')}}">
    @csrf
<div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" 
    name="email"  value="{{ Auth::user()->email }}" >
    <label for="floatingInput">Email</label>
  </div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInputName" placeholder="name@example.com" 
    name="name"  value="{{ Auth::user()->name }}" >
    <label for="floatingInputName">Nombre</label>
  </div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInputLastName" placeholder="name@example.com" 
    name="last_name"  value="{{ Auth::user()->last_name }}" >
    <label for="floatingInputLastName">Apellidos</label>
  </div>
  <div class="form-floating mb-1">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" 
    name="password">
    <label for="floatingPassword">Password</label>
  </div>
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="floatingPassword_confirmation" placeholder="Password confirmation" 
    name="password_confirmation">
    <label for="floatingPassword">Password Confirmation</label>
  </div>
<div class="row justify-content-center align-items-center">
    <div class="col">
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
    
</div>
</form>