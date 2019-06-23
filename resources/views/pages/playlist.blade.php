@extends('lay.index')
@section('content')
@include('lay.header')
<section>
    <section class="hbox stretch">
        @include('lay.menu')
        <section id="content">
            <section class="vbox">
                <section class="w-f-md">
                    <section class="hbox stretch bg-black dker">
                        <!-- side content --> 
                        <aside class="col-sm-5 no-padder" id="sidebar">
                            <section class="vbox animated fadeInUp">
                                <section class="scrollable">
                                    <div class="m-t-n-xxs item pos-rlt">
                                        <div class="bottom gd bg-info wrapper-lg">
                                            <span class="pull-right text-sm"></span>
                                            <span class="h2 font-thin">{{ $playlist->name }}</span> 
                                        </div>
                                        <div>
                                            <img class="img-full" src="{{ $playlist->image }}">
                                        </div>
                                    </div>
                                </section>
                            </section>
                        </aside>
                        <!-- / side content --> 
                        <section class="col-sm-4 no-padder bg">
                            <section class="vbox">
                                <section class="scrollable hover">
                                    <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                        @foreach ($playlist->musics as $music)
                                        <li class="play-album list-group-item clearfix" data-id="{{ $music->id }}">
                                            <a href="javascript:;" class="jp-play-me pull-right m-t-sm m-l text-md" onclick="play({{ $music->id }})"><!---play music  voi button --->
                                                <i class="icon-control-play text"></i>
                                                <i class="icon-control-pause text-active"></i>
                                            </a>
                                            <a href="" class="pull-left thumb-sm m-r">
                                                <img src="{{ $music->image }}">
                                            </a>
                                            <a class="clear" href="album/{{ $music->id }}">
                                                <span class="block text-ellipsis">{{ $music->name }}</span>
                                                <small class="text-muted"></small>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
                @include('lay.footer')
            </section>
            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
    </section>
</section>
<input type="hidden" id="song" name="song" value="{{ $song->first()->id }}"> <!--lay id bai hat dau tien de autoplay --->
@endsection
