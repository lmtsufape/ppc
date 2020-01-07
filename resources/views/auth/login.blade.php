@extends('layouts.app')

@section('content')
<style media="screen">
  body{
    margin: 0;
    padding: 0;
    background-image: linear-gradient(to top, #1b2e4f, #152745);
  }
  .navbar{
    display: none;
  }
  .container{
    height: 73vh;
    width: 100vw;
  }
  .card{
    margin-top: 35%;
    box-shadow: 1px 1px 20px black;

  }
  .titleLogin{
    width: 50%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    border-bottom: 1px solid #ccc;
    margin-bottom: 30px;

  }

  @media screen and (max-width: 576px){
    .container{
      margin-bottom: 80px;
    }
    .card{
      margin-top: 30%;
      margin-bottom: 80px;
    }
  }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card">
                <!-- <div class="card-header">Login</div> -->
                <div class="card-body">
                    <form method="POST" action="{{ route('loginApi') }}">
                        @csrf

                        <div class="row justify-content-center">
                          <div class="titleLogin">
                            <h2>Login</h2>

                          </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-8">

                                <div class="form-group">
                                    <label for="email">{{__('Endereço de e-mail')}}</label>
                                    <input class="form-control" type="email" for="email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div><!--end row -->

                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="password">{{__('Senha')}}</label>
                                    <input type="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-8">

                                <div class="form-group form-check">
                                    <label class="form-check-label" for="remember">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Lembre-se de mim') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="row justify-content-center">

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Esqueceu Sua Senha?') }}
                            </a>
                            @endif
                        </div>


                    </form>
                </div>
            </div>

            {{-- <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('loginApi') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembre-se de mim') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu Sua Senha?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
