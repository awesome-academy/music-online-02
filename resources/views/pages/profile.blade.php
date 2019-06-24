@extends('lay.index')
@section('content')
@include('lay.header')
<body class="">
    <section class="vbox">
        <section>
            <section class="hbox stretch">
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable">
                            <section class="hbox stretch">
                                <aside class="aside-lg bg-light lter b-r">
                                    <section class="vbox">
                                        <section class="scrollable">
                                            <div class="wrapper">
                                                <div class="text-center m-b m-t">
                                                    <a href="#" class="thumb-lg"> <img src="{{ $users->image }}" class="img-circle"> 
                                                    </a> 
                                                    <div>
                                                        <div class="h3 m-t-xs m-b-xs">{{ Session::get('name') }}</div>
                                                        <a href="#" data-toggle="modal" data-target="#myModal">{{ trans('label.update') }}</a>
                                                        <!---Modal ---->
                                                        <div id="myModal" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">
                                                                            {{ trans('label.avatar') }}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div>
                                                                            <div id="thumbbox">
                                                                                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="display: none" />
                                                                                <a class="removeimg" href="javascript:" ></a>
                                                                                </div>
                                                                            <div id="myfileupload">
                                                                                <form action="{{ route('profile.update', [$users->id]) }}" method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                                    <input type="file" id="uploadfile" name="image" onchange="readURL(this);" class="custom-file-input" required="required" />
                                                                                    <!--      Name  mà server request về sẽ là ImageUpload-->
                                                                                    <button type="submit" class="btn btn-info">
                                                                                        {{ trans('label.update') }}
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                                <label class=""></label>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('label.close') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--- end Modal---->
                                                    </div>
                                                </div>
                                                <div class="panel wrapper">
                                                    <div class="row text-center">
                                                        <div class="col-xs-6"> 
                                                            <a href="#"> 
                                                                <span class="m-b-xs h4 block">{{ config('home.number.end_music') }}</span> 
                                                                <small class="text-muted">{{ trans('label.follower') }}</small> 
                                                            </a> 
                                                        </div>
                                                        <div class="col-xs-6"> 
                                                            <a href="#"> 
                                                                <span class="m-b-xs h4 block">{{ config('home.number.end_music') }}</span> 
                                                                <small class="text-muted">{{ trans('label.following') }}</small> 
                                                            </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-group btn-group-justified m-b"> 
                                                    <a class="btn btn-success btn-rounded" data-toggle="button"> 
                                                        <span class="text"> <i class="fa fa-eye"></i> {{ trans('label.follow') }} </span> 
                                                        <span class="text-active"> <i class="fa fa-eye"></i> {{ trans('label.following') }} </span> 
                                                    </a> 
                                                    <a class="btn btn-dark btn-rounded"> 
                                                        <i class="fa fa-comment-o"></i> 
                                                        {{ trans('label.chat') }} 
                                                    </a> 
                                                </div>
                                                <div>
                                                    <p class="m-t-sm"> 
                                                        <a href="#" class="btn btn-rounded btn-twitter btn-icon">
                                                            <i class="fa fa-twitter"></i>
                                                        </a> 
                                                        <a href="#" class="btn btn-rounded btn-facebook btn-icon">
                                                            <i class="fa fa-facebook"></i>
                                                        </a> 
                                                        <a href="#" class="btn btn-rounded btn-gplus btn-icon">
                                                            <i class="fa fa-google-plus"></i>
                                                        </a> 
                                                    </p>
                                                </div>
                                            </div>
                                            </section>
                                        </section>
                                </aside>
                                <aside class="bg-white">
                                    <section class="vbox">
                                        <header class="header bg-light lt">
                                            <ul class="nav nav-tabs nav-white">
                                                <li class="active"><a href="#activity" data-toggle="tab">{{ trans('label.activity') }}</a></li>
                                                <li class=""><a href="#events" data-toggle="tab">{{ trans('label.playlist') }}</a></li>
                                                <li class=""><a href="#interaction" data-toggle="tab">{{ trans('label.interaction') }}</a></li>
                                            </ul>
                                        </header>
                                        <section class="scrollable">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="activity">
                                                    <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                                                        <li>
                                                            <div class="col-sm-12">
                                                                <form method="post" class="form-horizontal" data-validate="parsley" action="{{ route('profile.update', [$users->id]) }}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <section class="panel panel-default">
                                                                        <header class="panel-heading"> 
                                                                            <strong>
                                                                                {{ trans('label.basic_contraint') }}
                                                                            </strong> 
                                                                        </header>
                                                                        <div class="panel-body">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">
                                                                                    {{ trans('label.email') }}
                                                                                </label> 
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" data-required="true" placeholder="required field" value="{{ $users->email }}" name="email"> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-3 control-label">
                                                                                    {{ trans('label.name') }}
                                                                                </label> 
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" data-required="true" placeholder="required field" value="{{ $users->name }}" name="name"> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <footer class="panel-footer text-right bg-light lter"> 
                                                                            <a type="button" class="btn btn-dark btn-s-xs" data-toggle="modal" data-target="#modal_resetpass">
                                                                                {{ trans('label.change_pass') }}
                                                                            </a> 
                                                                            <button type="submit" class="btn btn-success btn-s-xs">
                                                                                {{ trans('label.update') }}
                                                                            </button> 
                                                                        </footer>
                                                                    </section>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="events">
                                                    <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                                        @foreach ($playlist as $item)
                                                        <li class="play-album list-group-item clearfix" data-id={{ $item->id }}> 
                                                            <a href="#" class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                                            </a> 
                                                            <a href="playlist/{{ $item->id }}" class="pull-left thumb-sm m-r"> 
                                                                <img src="{{ $item->image }}"> 
                                                            </a> 
                                                            <a class="clear" href="playlist/{{ $item->id }}"> 
                                                                <span class="block text-ellipsis">{{ $item->name }}</span>  
                                                            </a> 
                                                        </li>   
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="interaction">
                                                    <div class="text-center wrapper"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </section>
                                </aside>
                                <aside class="col-lg-3 b-l">
                                    <!---- Right side --->
                                </aside>
                            </section>
                        </section>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
                </section>
            </section>
        </section>
    </section>
@endsection
