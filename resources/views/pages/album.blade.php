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
                                            <span class="h2 font-thin">{{ $album->name }}</span> 
                                        </div>
                                        <div>
                                            <img class="img-full" src="{{ $album->image }}">
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-lg no-radius no-border no-bg m-t-n-xxs m-b-none auto">
                                        @foreach ($musics as $item)
                                        <li class="list-group-item">
                                            <div class="pull-right m-l"> 
                                                <a href="#" class="m-r-sm">
                                                    <i class="icon-cloud-download"></i>
                                                </a> 
                                                <a href="#">
                                                    <i class="icon-plus"></i>
                                                </a> 
                                            </div>
                                            <div class="play-music">
                                                <a href="javascript:;" class="jp-play-me m-r-sm pull-left"> 
                                                    <i class="icon-control-play text"></i> 
                                                    <i class="icon-control-pause text-active"></i> 
                                                </a> 
                                            </div>
                                            <div class="clear text-ellipsis"> 
                                                <span>{{ $item->name }}</span> 
                                            </div>
                                        </li>   
                                        @endforeach
                                    </ul>
                                </section>
                            </section>
                        </aside>
                        <!-- / side content --> 
                        <section class="col-sm-4 no-padder bg">
                            <section class="vbox">
                                <section class="scrollable hover">
                                    <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                                        @foreach ($albums as $item)
                                        <li class="list-group-item clearfix"> 
                                            <a href="#" class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                                <i class="icon-control-play text"></i> 
                                                <i class="icon-control-pause text-active"></i> 
                                            </a> 
                                            <a href="{{ config('home.image.image_album').$item->id }}" class="pull-left thumb-sm m-r"> 
                                                <img src="{{ $item->image }}"> 
                                            </a> 
                                            <a class="clear" href="album/{{ $item->id }}"> 
                                                <span class="block text-ellipsis">{{ $item->name }}</span> 
                                                @php
                                                    $artist = $item->artists()->first();
                                                @endphp
                                                <small class="text-muted">{{ $artist->name }}</small> 
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
<input type="hidden" id="album" value="{{ $album->id }}">
@endsection
