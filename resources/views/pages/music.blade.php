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
                                 <span class="h2 font-thin">{{ $musics->name }}</span> 
                              </div>
                              <div>
                                 <img class="img-full" src="{{ $musics->image }}">
                              </div>
                           </div>
                           <div class="col-xs-12">
                              <h4>{{ $musics->name }}</h4>
                              <p>
                                 @foreach ($artists as $item)
                                 {{ $item->name }}
                                 @endforeach
                              </p>
                              <h4>{{ trans('label.lyric') }}</h4>
                              <p>{{ $musics->lyric }}</p>
                              <br>
                           </div>
                           <div class="col-xs-12">
                              <form>
                                 <div class="form-group"> 
                                    <label>{{ config('home.comment.comment') }}</label> 
                                    <textarea class="form-control" rows="5"></textarea> 
                                 </div>
                                 <div class="form-group"> 
                                    <button type="submit" class="btn btn-success">{{ config('home.comment.submit') }}</button> 
                                 </div>
                              </form>
                           </div>
                           <div class="col-xs-12">
                              <section class=" block">
                                 @foreach ($comments as $item) 
                                 <article id="comment-id-1" class="comment-item">
                                    <a class="pull-left thumb-sm"> 
                                       <img src="{{ $item->user()->first()->image }}" class="img-circle"> 
                                    </a> 
                                    <section class="comment-body m-b">
                                       <header> 
                                          <a href="#"><strong>{{ $item->user()->first()->name }}</strong></a> 
                                          {{-- <span class="text-muted text-xs block m-t-xs"> 24 minutes ago </span>  --}}
                                       </header>
                                       <div class="m-t-sm">{{ $item->content }}</div>
                                    </section>
                                 </article>
                                 @endforeach
                              </section>
                           </div>
                        </section>
                     </section>
                  </aside>
                  <!-- / side content --> 
                  <section class="col-sm-4 no-padder bg">
                     <section class="vbox">
                        <section class="scrollable hover">
                           <ul class="list-group list-group-lg no-bg auto m-b-none m-t-n-xxs">
                              @foreach ($songs as $item)
                              <li class="list-group-item clearfix"> 
                                 <a href="#" class="jp-play-me pull-right m-t-sm m-l text-md"> 
                                    <i class="icon-control-play text"></i> 
                                    <i class="icon-control-pause text-active"></i> 
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
<input type="hidden" id="song" value="{{ $musics->id }}">
@endsection
