@extends('lay.index')
@section('content')
@include('lay.header')       
<section>
    <section class="hbox stretch">
        @include('lay.menu')
        <section id="content">
            <section class="vbox">
                <section class="w-f-md" id="bjax-target">
                    <section class="hbox stretch">
                        <section>
                            <section class="vbox">
                                <section class="scrollable padder-lg">
                                    <h2 class="font-thin m-b">{{ $category->name }}</h2>
                                    <table>
                                        <div class="row row-sm">
                                            @foreach ($music as $item)
                                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                                <div class="item">
                                                    <div class="pos-rlt">
                                                        <div class="item-overlay opacity r r-2x bg-black">
                                                            <div data-id ="{{ $item->id }}" class="center text-center m-t-n play-music" > 
                                                                <a href="javascript:;">
                                                                    <i class="icon-control-play i-2x"></i>
                                                                </a> 
                                                            </div>
                                                        </div>
                                                        <a>
                                                            <img src="{{ $item->image }}" class="r r-2x img-full">
                                                        </a> 
                                                    </div>
                                                    <div class="padder-v"> 
                                                        <a href="music/{{ $item->id }}" class="text-ellipsis">{{ $item->name }}</a> 
                                                        @php
                                                            $artist = $item->artists()->first();
                                                        @endphp
                                                        <a href="artist/{{ $artist->id }}" class="text-ellipsis text-xs text-muted">{{ $artist->name }}</a> 
                                                    </div>
                                                </div>
                                            </div>   
                                            @endforeach
                                        </div>
                                    </table>
                                    {!! $music->render() !!}
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
@endsection
