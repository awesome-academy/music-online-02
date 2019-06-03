@extends('lay.index')
@section('content')
@include('lay.header')      
<section>
    <section class="hbox stretch">
        @include('lay.menu')
        <!-- /.aside --> 
        <section id="content">
            <section class="vbox">
                <section class="scrollable">
                    <section class="hbox stretch">
                        <aside class="col-lg-6 bg-light lter b-r">
                            <section class="vbox">
                                <section class="scrollable">
                                    <div class="wrapper">
                                        <div class="text-center m-b m-t">
                                            <a href="#" class="thumb-lg"> <img src="{{ $artist->image }}" class="img-circle"> </a> 
                                            <div>
                                                <div class="h3 m-t-xs m-b-xs">{{ $artist->name }}</div> 
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-uc  text-muted">{{ trans('label.info') }}</h3> 
                                            <p>{{ $artist->description }}</p>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </section>
                            </section>
                        </aside>
                        <aside class="bg-white">
                            <section class="vbox">
                                <header class="header bg-light lt">
                                    <ul class="nav nav-tabs nav-white">
                                        <li class="active"><a href="#activity" data-toggle="tab">{{ trans('label.music') }}</a></li>
                                        <li class=""><a href="#events" data-toggle="tab">{{ trans('label.album') }}</a></li>
                                    </ul>
                                </header>
                                <section class="scrollable">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="activity">
                                            <ul class="list-group list-group-lg no-bg m-b-none m-t-n-xxs">
                                                @php
                                                    $music = $artist->musics()->get();
                                                @endphp
                                                @foreach ($music as $item)
                                                <li class="list-group-item clearfix"> 
                                                    <a href="javascript:;" onclick="play({{ $item->id }})" class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                                        <i class="icon-control-play text"></i> 
                                                    </a> 
                                                    <a href="music/{{ $item->id }}" class="pull-left thumb-sm m-r"> 
                                                        <img src="{{ $item->image }}"> 
                                                    </a> 
                                                    <a class="clear" href="music/{{ $item->id }}">
                                                        <span class="block text-ellipsis">{{ $item->name }}</span> 
                                                    </a> 
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="events">
                                            <ul class="list-group list-group-lg no-bg m-b-none m-t-n-xxs">
                                                @php
                                                    $album = $artist->albums()->get();
                                                @endphp
                                                @foreach ($album as $item)
                                                <li class="list-group-item clearfix"> 
                                                    <a class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                                        <i class="icon-control-play text"></i> 
                                                    </a> 
                                                    <a class="pull-left thumb-sm m-r"> 
                                                        <img src="{{ $item->image }}"> 
                                                    </a> 
                                                    <a class="clear" > 
                                                        <span class="block text-ellipsis">{{ $item->name }}</span>  
                                                    </a> 
                                                </li>
                                                @endforeach
                                            </ul>      
                                        </div>
                                    </div>
                                </section>
                            </section>
                        </aside>
                    </section>
                </section>
                @include('lay.footer')
            </section>
        </section>
    </section>
</section>      
@endsection
