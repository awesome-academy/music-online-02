@extends('lay.index')
@section('content')
<body class="bg-info">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl">
        <a class="navbar-brand block" href="/"><span class="h1 font-bold">{{ trans('label.music') }}</span></a> 
        <section class="m-b-lg">
            <form action="" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(SESSION('notify'))
                    <div class="alert alert-danger">
                        {{ SESSION('notify') }}
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="form-group"> 
                    <input type="password" name="password" placeholder="Password" class="form-control rounded input-lg text-center no-border"> 
                </div>
                <div class="form-group"> 
                    <input type="password" name="re_password" placeholder="Re-Password" class="form-control rounded input-lg text-center no-border"> 
                </div>
                <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded">
                    <i class="icon-arrow-right pull-right"></i>
                    <span class="m-r-n-lg">{{ trans('label.send_email') }}</span>
                </button> 
            </form>
        </section>
        </div>
    </section>
</body>
@endsection
