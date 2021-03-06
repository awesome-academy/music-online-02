@extends('lay.index')
@section('content')
@include('lay.header')
<section>
    <section class="hbox stretch">
        <!-- .aside --> 
        @include('lay.menu')
        <!-- /.aside  --> 
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
                            @php
                                $id_user = '';    
                                if (session('info_user') != null){
                                    $id_user = session('info_user')[0]->id;
                                } else {
                                    $id_user = ''; 
                                }
                            @endphp
                            <input type="hidden" value="{{ $id_user }}" id="user_id">
                            <div class="row row-sm">
                                @foreach ($music_like as $items)
                                @php
                                    $id_music = $items[0]->id;
                                @endphp
                                @if ($id_music != null)
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="item">
                                        <div class="pos-rlt">
                                            <div class="top"> 
                                                <span class="pull-right m-t-sm m-r-sm badge bg-info">{{ $items[0]->view }}</span> 
                                            </div>
                                            <div class="item-overlay opacity r r-2x bg-black">
                                                <div data-id ="{{ $id_music }}" class="center text-center m-t-n play-music"> 
                                                    <a href="javascript:;">
                                                        <i class="icon-control-play i-2x"></i>
                                                    </a> 
                                                </div>
                                                <div class="bottom padder m-b-sm"> 
                                                    <div data-id ="{{ $id_music }}" class="music-favorite">
                                                        <a href="javascript:;" class="pull-right" id="like-{{ $id_music }}">
                                                            @if ($items[1] == false)
                                                            <i class="fa fa-heart-o text favorite" id="favorite-{{ $id_music }}"></i>
                                                            @elseif ($items[1] == true)
                                                            <i class="fa fa-heart text-danger unfavorite" id="unfavorite-{{ $id_music }}"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div data-id ="{{ $id_music }}" class="plus">
                                                        <a href="javascript:;"> 
                                                            <i class="fa fa-plus-circle" data-toggle="modal" data-target="#myModal"></i> 
                                                        </a> 
                                                    </div>
                                                </div>                                     
                                            </div>
                                            <a href="music/{{ $id_music }}">
                                                <img src="{{ $items[0]->image }}" alt="" class="r r-2x img-full">
                                            </a> 
                                        </div>
                                        <div class="padder-v"> 
                                            <div data-id ="{{ $id_music }}" class="name-music">
                                                <a href="music/{{ $id_music }}" class="text-ellipsis">{{ $items[0]->name }}</a>
                                            </div>    
                                            @php
                                                $artist = $items[0]->artists()->first();
                                            @endphp
                                            @if ($artist != null)
                                            <a href="artist/{{ $artist->id }}" class="text-ellipsis text-xs text-muted">
                                                {{ $artist->name }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-7 bg-primary">
                                    <h3 class="font-thin">{{ trans('label.album') }}</h3>
                                    <div class="row row-sm">
                                        @foreach ($albums as $items)
                                        @if ($albums != null)
                                        <div class="col-xs-6 col-sm-3">
                                            <div class="item">
                                                <div class="pos-rlt">
                                                    <div class="item-overlay opacity r r-2x bg-black">
                                                        <div class="center text-center m-t-n"> 
                                                            {{-- <a href="#">
                                                                <i class="fa fa-play-circle i-2x"></i>
                                                            </a>  --}}
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
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <h3 class="font-thin">{{ trans('label.top_songs') }}</h3>
                                    <div class="list-group bg-white list-group-lg no-bg auto"> 
                                        @foreach ($top as $item)
                                        @php
                                            $music = $item->music()->first();
                                            $artist = $music->artists()->first();
                                        @endphp
                                        @if ($music || $artist != null)
                                        <a href="#" class="list-group-item clearfix"> 
                                            <span class="pull-right h2 text-muted m-l">{{ $item->views }}</span> 
                                            <span class="pull-left thumb-sm  m-r"> 
                                                <img src="{{ $music->image }}" alt="..."> 
                                            </span> 
                                            <span class="clear"> 
                                                <span>{{ $music->name }}</span> 
                                                <small class="text-muted clear text-ellipsis">{{ $artist->name }}</small> 
                                            </span> 
                                        </a>
                                        @endif
                                        @endforeach
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
                            @foreach ($artists as $items)
                            <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                                <li class="list-group-item">
                                    <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm"> 
                                        <img src="{{ $items->image }}" class="img-circle"> 
                                    </span> 
                                    <div class="clear">
                                        <div><a href="artist/{{ $artist->id }}">{{ $items->name }}</a></div>

                                        <!-- <small class="text-muted">New York</small>  -->
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </section>
                        <footer class="footer footer-md bg-black">
                        </footer>
                    </section>
                </aside>
                <!-- / side content --> 
            </section>
            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a> 
        </section>
    </section>
</section>
{{-- modal select option playlist --}}
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('label.playlist') }}</h4>
            </div>
            <div class="modal-body" id="modal_playlist">
                @php
                    $user_id = '';    
                @endphp
                @if (session('info_user') != null)
                @php
                    $user_id = session('info_user')[0]->id;
                @endphp
                <input type="hidden" value="{{ $user_id }}" id="user_playlist">
                {{-- <li data-dismiss="modal"><a href="#">album 1</a></li> --}}
            </div>
            <div class="modal-body-last">
                <i class="icon-plus i-lg icon text-success-lter"></i>
                <li data-dismiss="modal" class="li-bottom"><a href="#" data-toggle="modal" data-target="#create_playlist"><button class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="{{ trans('label.create_new_playlist') }}">{{ __('label.create_playlist') }}</button></a></li>
                <hr>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- Modal create playlist --}}
<div class="modal fade" id="create_playlist" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('label.create_playlist') }}</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('create_playlist') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <p>{{ __('label.name') }}</p>
                        </div>
                        <div class="col-md-8">
                            <input id="name_playlist" type="text" name="name_playlist" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <button type="submit" class="btn btn-success">{{ __('label.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
