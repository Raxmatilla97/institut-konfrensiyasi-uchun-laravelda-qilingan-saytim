@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <img style="display: block; margin-left: auto; margin-right: auto; width: 50%;width: 200px;margin: auto;" src="https://www.cspi.uz/storage/app/media/yangiliklar/Institut%20logosi.png">
                        <p class="text-muted">Login</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Email" value="{{ old('email', null) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="input-group mb-4">
                            <div class="form-check checkbox">
                                <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                                <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                Meni eslab qol | ?????????????? ???????? | Remember me
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">
                                    Kirish | ?????????? | Login
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                Parolingiz esdan chiqdimi? <br> ???????????? ?????? ????????????? <br> Forgot your password?
                                </a>

                            </div>

                        </div>
                    </form>
                    <div class="col-6">
                                <a href="{{ route('register') }}"><button class="btn btn-success px-4">
                                  Ro'yxatdan o'tish | ???????????????????????????????????? | Sign up
                                </button></a>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection