@extends('lay.index')
@section('content')
<body class="bg-info">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
        <a class="navbar-brand block" href="/"><span class="h1 font-bold">{{ trans('label.music') }}</span></a> 
        <section class="m-b-lg">
            <form action="login" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(SESSION('notify'))
                    <div class="alert alert-danger">
                        {{ SESSION('notify') }}
                    </div>
                @endif
                <div class="form-group"> 
                    <input placeholder="Name" name="name" class="form-control rounded input-lg text-center no-border" value="{{ old('name') }}"> 
                </div>
                <p id="name" ></p>
                <div class="form-group"> 
                    <input type="password" name="password" placeholder="Password" class="form-control rounded input-lg text-center no-border"> 
                </div>
                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
                    <i class="icon-arrow-right pull-right"></i>
                    <span class="m-r-n-lg">{{ trans('label.login') }}</span>
                </button> 
                <div class="line line-dashed"></div>
                <p class="text-muted text-center"><a href="forgot-pass">{{ trans('label.forgot_pass') }}</a></p>
                <p class="text-muted text-center"><small>{{ trans('label.confirm_login') }}</small></p>
                <a href="register" class="btn btn-lg btn-info btn-block btn-rounded">{{ trans('label.register') }}</a> 
            </form>
        </section>
        </div>
    </section>
</body>
@endsection
