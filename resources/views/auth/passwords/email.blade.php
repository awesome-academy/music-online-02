@extends('lay.index')
@section('content')
<body class="bg-info">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
        <a class="navbar-brand block" href="index.html"><span class="h1 font-bold">{{ trans('label.music') }}</span></a> 
        <section class="m-b-lg">
            <form action="forgot-pass" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(SESSION('notify'))
                    <div class="alert alert-danger">
                        {{ SESSION('notify') }}
                    </div>
                @endif
                <div class="form-group"> 
                    <input placeholder="Email" name="email" class="form-control rounded input-lg text-center no-border" value="{{ old('email') }}"> 
                </div>
                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
                    <i class="icon-arrow-right pull-right"></i>
                    <span class="m-r-n-lg">{{ trans('label.send_email') }}</span>
                </button> 
                <div class="line line-dashed"></div>
                <p class="text-muted text-center"><a href="login">{{ trans('label.login') }}</a></p>
            </form>
        </section>
        </div>
    </section>
</body>
@endsection
