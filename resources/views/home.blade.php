@extends('lay.index')
@section('content')
@include('lay.header')
<section>
    <section class="hbox stretch">
        <!-- .aside --> 
        @include('lay.menu')
        <!-- /.aside --> 
        <section id="content">
            <section class="hbox stretch">
                <section>
                <section class="vbox">
                    <section class="scrollable padder-lg w-f-md" id="bjax-target">
                        <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" >
                            <i class="icon-refresh i-lg inline" id="refresh"></i>
                        </a> 
                        <h2 class="font-thin m-b">{{ trans('label.music') }}
                            <span class="bar1 a1 bg-primary lter"></span> 
                            <span class="bar2 a2 bg-info lt"></span> 
                            <span class="bar3 a3 bg-success"></span> 
                            <span class="bar4 a4 bg-warning dk"></span> 
                            <span class="bar5 a5 bg-danger dker"></span>                        
                        </h2>
                        <div class="row row-sm">
                            @foreach($musics as $items)
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="item">
                                    <div class="pos-rlt">
                                        <div class="top"> 
                                            <span class="pull-right m-t-sm m-r-sm badge bg-info">{{ $items->view }}</span> 
                                        </div>
                                        <div class="item-overlay opacity r r-2x bg-black">
                                            <div class="text-info padder m-t-sm text-sm"> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star-o text-muted"></i> 
                                            </div>
                                            <div data-id ="{{ $items->id }}" class="center text-center m-t-n play-music"> 
                                                <a href="javascript:;">
                                                    <i class="icon-control-play i-2x"></i>
                                                </a> 
                                            </div>
                                            <div class="bottom padder m-b-sm"> 
                                                <a href="#" class="pull-right"> 
                                                    <i class="fa fa-heart-o"></i> 
                                                </a> 
                                                <a href="#"> 
                                                    <i class="fa fa-plus-circle"></i> 
                                                </a> 
                                            </div>
                                        </div>
                                        <a href="music/{{ $items->id }}">
                                            <img src="{{ $items->image }}" alt="" class="r r-2x img-full">
                                        </a> 
                                    </div>
                                    <div class="padder-v"> 
                                        <div data-id ="{{  $items->id }}" class="name-music">
                                            <a href="music/{{ $items->id }}" class="text-ellipsis">{{ $items->name }}</a>
                                        </div>    
                                        @php
                                            $artist = $items->artists()->first();
                                        @endphp     
                                        <a href="artist/{{ $artist->id }}" class="text-ellipsis text-xs text-muted">
                                            {{ $artist->name }}
                                        </a> 
                                    </div>
                                </div>
                            </div> 
                            @endforeach                     
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <h3 class="font-thin">{{ trans('label.album') }}</h3>
                                <div class="row row-sm">
                                    @foreach($albums as $items)
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="item">
                                            <div class="pos-rlt">
                                                <div class="item-overlay opacity r r-2x bg-black">
                                                    <div class="center text-center m-t-n"> 
                                                        <a href="#">
                                                            <i class="fa fa-play-circle i-2x"></i>
                                                        </a> 
                                                    </div>
                                                </div>
                                                <a href="{{ config('home.image.image_link') }}"><img src="{{ $items->image }}" alt="" class="r r-2x img-full"></a> 
                                            </div>
                                            <div class="padder-v"> 
                                                <a href="album/{{ $items->id }}" class="text-ellipsis">{{ $items->name }}</a> 
                                                @php
                                                    $artist_album = $items->artists()->first();
                                                @endphp  
                                                <a href="artist/{{ $artist_album->id }}" class="text-ellipsis text-xs text-muted">
                                                    {{ $artist_album->name }}
                                                </a> 
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h3 class="font-thin">{{ trans('label.top_songs') }}</h3>
                                <div class="list-group bg-white list-group-lg no-bg auto"> 
                                    <a href="#" class="list-group-item clearfix"> 
                                        <span class="pull-right h2 text-muted m-l">{{ config('home.number.begin_music') }}</span> 
                                        <span class="pull-left thumb-sm avatar m-r"> 
                                            <img src="{{ config('home.image.image_logo') }}" alt="..."> 
                                        </span> 
                                        <span class="clear"> 
                                            <span>{{ config('home.top_song.name') }}</span> 
                                            <small class="text-muted clear text-ellipsis">{{ config('home.top_song.artist') }}</small> 
                                        </span> 
                                    </a> 
                                </div>
                            </div>
                        </div> 
                    </section>
                    @include('lay.footer')
                </section>
                </section>
                <!-- side content --> 
                <aside class="aside-md bg-light dk" id="sidebar">
                <section class="vbox animated fadeInRight">
                    <section class="w-f-md scrollable hover">
                        <h4 class="font-thin m-l-md m-t">{{ trans('label.artists') }}</h4>
                        @foreach($artists as $items)
                        <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                            <li class="list-group-item">
                                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm"> 
                                    <img src="{{ $items->image }}" class="img-circle"> 
                                </span> 
                                <div class="clear">
                                    <div><a href="#">{{ $items->name }}</a></div>
                                    <!-- <small class="text-muted">New York</small>  -->
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </section>
                    <footer class="footer footer-md bg-black">
                        <form class="" role="search">
                            <div class="form-group clearfix m-b-none">
                                <div class="input-group m-t m-b"> 
                                    <span class="input-group-btn"> 
                                        <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon">
                                            <i class="fa fa-search"></i>
                                        </button> 
                                    </span> 
                                    <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder=""> 
                                </div>
                            </div>
                        </form>
                    </footer>
                </section>
                </aside>
                <!-- / side content --> 
            </section>
            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
        </section>
    </section>
</section>
@endsection
