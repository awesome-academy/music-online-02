@extends('lay.index')
@section('content')
@include('lay.header')
    <section>
        <section class="hbox stretch">
            <section id="content">
                <section class="vbox">
                    <section class="scrollable">
                        <section class="hbox stretch row">
                            <aside class="aside-lg bg-light lter b-r col-lg-4">
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
                                                                            <img height="300" width="300" alt="Thumb image" id="thumbimage" src="{{ $users->image }}" />
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--- end Modal---->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel wrapper">
                                                <div class="row text-center">
                                                    <div class="col-xs-6"> 
                                                        <a href="#"> 
                                                            <span class="m-b-xs h4 block">
                                                                {{ config('home.number.end_music') }}
                                                            </span> 
                                                            <small class="text-muted">
                                                                {{ trans('label.follower') }}
                                                            </small> 
                                                        </a> 
                                                    </div>
                                                    <div class="col-xs-6"> 
                                                        <a href="#"> 
                                                            <span class="m-b-xs h4 block">
                                                                {{ config('home.number.end_music') }}
                                                            </span> 
                                                            <small class="text-muted">
                                                                {{ trans('label.following') }}
                                                            </small> 
                                                        </a> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="btn-group btn-group-justified m-b"> <a class="btn btn-success btn-rounded" data-toggle="button"> <span class="text"> <i class="fa fa-eye"></i> {{ trans('label.follow') }} </span> <span class="text-active"> <i class="fa fa-eye"></i> {{ trans('label.following') }} </span> </a> <a class="btn btn-dark btn-rounded"> <i class="fa fa-comment-o"></i> {{ trans('label.chat') }} </a> </div>
                                            <div>
                                                <p class="m-t-sm"> <a href="#" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a> <a href="#" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a> <a href="#" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a> </p>
                                            </div>
                                        </div>
                                    </section>
                                </section>
                            </aside>
                            <aside class="bg-white col-lg-6">
                                <section class="vbox">
                                    <header class="header bg-light lt">
                                        <ul class="nav nav-tabs nav-white">
                                            <li class="active"><a href="#activity" data-toggle="tab">{{ trans('label.activity') }}</a></li>
                                            <li class=""><a href="#playlist" data-toggle="tab">{{ trans('label.playlist') }}</a></li>
                                            <li class=""><a href="#favorite" data-toggle="tab">{{ trans('label.favorite') }}</a></li>
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
                                                                        <a type="button" class="btn btn-dark btn-s-xs">
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
                                        <div class="tab-pane" id="playlist">
                                            <div class="text-center wrapper"> 
                                                <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                                    @foreach ($playlists as $playlist)
                                                         <li class="list-group-item clearfix">
                                                            <a href="#" class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                                                <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px"> 
                                                                    <span class="bar1 a1 bg-primary lter"></span>
                                                                    <span class="bar2 a2 bg-info lt"></span> 
                                                                    <span class="bar3 a3 bg-success"></span> 
                                                                    <span class="bar4 a4 bg-warning dk"></span> 
                                                                    <span class="bar5 a5 bg-danger dker"></span> 
                                                                </span>
                                                             </a> 
                                                            <a href="{{ route('playlist', [$playlist->id]) }}" class="pull-left thumb-sm m-r"> 
                                                                <img class="img-lq" src="{{ $playlist->image }}"> 
                                                            </a> 
                                                            <a class="clear"> 
                                                                <span class="block text-ellipsis">
                                                                    <a href="{{ route('playlist', [$playlist->id]) }}">{{ $playlist->name }}</a>
                                                                </span> 
                                                                <small class="block">
                                                                    <a href="{{ route('playlist', [$playlist->id]) }}">{{ $playlist->created_at }}</a>
                                                                </small>
                                                                <br>
                                                            </a>
                                                        </li>
                                                    @endforeach 
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="favorite">
                                            <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                                @foreach ($musics as $item)
                                                <li class="list-group-item clearfix"> 
                                                    <a href="music/{{ $item->id }}" class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                                        <i class="icon-control-play text"></i> 
                                                        <i class="icon-control-play text-active"></i> 
                                                    </a> 
                                                    <a href="#" class="pull-left thumb-sm m-r"> 
                                                        <img class="img-lq" src="{{ $item->image }}"> 
                                                    </a> 
                                                    <a class="clear"> 
                                                        <span class="block text-ellipsis">
                                                            <a href="music/{{ $item->id }}">{{ $item->name }}</a>
                                                        </span> 
                                                        <br>
                                                        @php
                                                            $artist = $item->artists()->first();
                                                        @endphp
                                                        <small class="text-muted">
                                                            <a href="artist/{{ $artist->id }}">{{ $artist->name }}</a>
                                                        </small> 
                                                    </a>   
                                                </li>
                                                @endforeach 
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </aside>
                            <aside class="col-lg-2"></aside>
                        </section>
                    </section>
                </section>
            </section> 
        </section>
    </section>
@endsection
