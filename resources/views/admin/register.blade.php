 {{-- @extends('layouts.app') --}}
 <!DOCTYPE html>
<html>
<head>
   
    <title>Ragister Page</title>
    @include('layouts.headerlinks')
</head>
<body>
    <div class="container-fluid pl-0 pr-0 rounded-top">

        <div class="bg-danger topheader" >
            <h3>Admin Ragister    </h3>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-7 float-left">
                
                   <img src="{{asset('image/admin/login-page-img.png')}}" alt="">
                </div>
                <div class="col-5">
                
                    <div class="card card-block">
                        
                        <div class="card">
                <div class="card-header">{{ __('Admin Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-group text-center">
                    <label class="text-primary"><a href="/admin/login" title="login">log In ?</a></label>
                </div>
            </div>

                    </div>
                </div>


            </div>
        </div>
        
    </div>

</body>
<style type="text/css">
    .topheader{height: 100px; margin-left: 0px;}
</style>
</html>