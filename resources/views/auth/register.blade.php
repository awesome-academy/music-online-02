@extends('lay.index')
@section('content')
<body class="bg-info">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
        <a class="navbar-brand block" href="index.html"><span class="h1 font-bold">{{ trans('label.music') }}</span></a> 
        <section class="m-b-lg">
            <form action="register" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="form-group"> 
                    <input placeholder="Name" name="name" class="form-control rounded input-lg text-center no-border" value="{{ old('name') }}"> 
                </div>
                <p id="name" ></p>
                <div class="form-group"> 
                    <input type="email" name="email" placeholder="Email" class="form-control rounded input-lg text-center no-border" value="{{ old('email') }}"> 
                </div>
                <div class="form-group"> 
                    <input type="password" name="password" placeholder="Password" class="form-control rounded input-lg text-center no-border"> 
                </div>
                <div class="form-group"> 
                    <input type="password" name="re_password" placeholder="Re-Password" class="form-control rounded input-lg text-center no-border"> 
                </div>
                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
                    <i class="icon-arrow-right pull-right"></i>
                    <span class="m-r-n-lg">{{ trans('label.register') }}</span>
                </button> 
                <div class="line line-dashed"></div>
                <p class="text-muted text-center"><small>{{ trans('label.confirm_login') }}</small></p>
                <a href="login" class="btn btn-lg btn-info btn-block btn-rounded">{{ trans('label.login') }}</a> 
            </form>
        </section>
        </div>
    </section>
</body>
@endsection
