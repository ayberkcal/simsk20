@extends('dashboard.authBase')

@section('content')
  <form method="POST" action="{{ route('login') }}" class="form-box">
    @csrf
    <h2 class="h2 text-black">Login</h2>
    <p class="text-muted">Sign In to your account</p>
    <div class="input-group mb-4">
      <div class="input-group-prepend">
        <span class="input-group-text">                   
          <svg class="c-icon" style="height: 25px; width: 25px" >
            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
          </svg>
        </span>
      </div>              
      <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autofocus>
    </div>
    <div class="input-group mb-4">
      <div class="input-group-prepend">
        <span class="input-group-text">                   
          <svg class="c-icon" style="height: 25px; width: 25px" >
            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
          </svg>
        </span>
      </div>   
      <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
    </div>                
    <div class="form-group">
       <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
    </div>
  </form>
@endsection