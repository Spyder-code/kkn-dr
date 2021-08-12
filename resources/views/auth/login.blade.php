@extends('layouts.app')

@section('content')
<style>
    @media (min-width:769px) {
        main{
            margin-top: 100px;
        }
    }
</style>

<main>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12">
                <img src="{{ asset('images/new-logo.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="row align-items-center">
                    <div class="col text-primary">
                        <div class="cards" id="login-card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Email or Username') }}</label>

                                        <div class="col-md-6">
                                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mt-2 row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mt-2 row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
<script>
    $('#register-card').hide();
    $('#btn-register').click(function (e) {
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');;
        $('#btn-login').removeClass('btn-primary').addClass('btn-outline-primary');
        $('#register-card').show();
        $('#login-card').hide();
    });
    $('#btn-login').click(function (e) {
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        $('#btn-register').removeClass('btn-primary').addClass('btn-outline-primary');
        $('#register-card').hide();
        $('#login-card').show();
    });
</script>
@endsection
