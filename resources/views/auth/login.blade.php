@extends('users.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="tampilan">
                <div class="kepala">
                    <div class="logo"></div>
                    <h2 class="judul">Login Anggota</h2>
                </div>
                <div class="artikel">
                    <div class="kotak">
                        <div class="form-group row">
                            <p><input id="email" placeholder="E-mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><i class="fa fa-user" aria-hidden="true"></i></p>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        </div>
                        <div class="form-group row">
                            <p><input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"></p>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection