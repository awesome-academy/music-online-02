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
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <div class="form-group"> 
                                    <label>{{ config('home.comment.comment') }}</label> 
                                    <textarea id="content_comment" name="content_comment" class="form-control" rows="5"></textarea> 
                                 </div>
                                 <p id="noti"></p>
                                 <input type="hidden" id="music_comment" name="music_comment" value="{{ $musics->id }}">
                                 @php
                                 if (!(session('info_user'))) {
                                    $user_id = '';
                                 } else {
                                    $user_id = session('info_user')[0]->id;
                                 }
                                 @endphp
                                 <input type="hidden" id="user_comment" name="user_comment" value="{{ $user_id }}">
                                 <div class="form-group"> 
                                    <button type="submit" id="submit_comment" class="btn btn-success">{{ config('home.comment.submit') }}</button> 
                                 </div>
                              </form>
                           </div>
                           <div class="col-xs-12">
                              <section class=" block" id="line-comment">
                                 @foreach ($comments as $item) 
                                 <article id="comment-id-{{ $item->id }}" class="comment-item">
                                    <a class="pull-left thumb-sm"> 
                                       <img src="{{ $item->user()->first()->image }}" class="img-circle"> 
                                    </a> 
                                    <section class="comment-body m-b">
                                       <header> 
                                          <a href="#"><strong>{{ $item->user()->first()->name }}</strong></a> 
                                          @php
                                             $time = $item->created_at;
                                             $dt = Carbon::create($time->year, $time->month, $time->day, $time->hour, $time->minute, $time->second);
                                             $now = Carbon::now();
                                          @endphp
                                          <span class="text-muted text-xs block m-t-xs">{{ $dt->diffForHumans($now) }}</span> 
                                       </header>
                                       <div class="row">
                                          @php
                                             if (!session('info_user')) {
                                                $id_user_login = '';
                                             } else {
                                                $id_user_login = session('info_user')[0]->id;
                                             }
                                             $id_user_comment = $item->user()->first()->id;
                                          @endphp
                                          <div class="col-md-10 m-t-sm" id="label-content-{{ $item->id }}">{{ $item->content }}</div>
                                          @if ($id_user_login == config('home.role_admin') && $id_user_login == $id_user_comment)
                                             <div class="col-md-1"><a class="edit_comment" data-id ="{{ $item->id }}" data-content ="{{ $item->content }}" href="javascript:;">{{ __('label.edit') }}</a></div>
                                             <div class="col-md-1"><a class="delete_comment" data-id="{{ $item->id }}" href="javascript:;">Delete</a></div>

                                          @elseif ($id_user_login != config('home.role_admin') && $id_user_login == $id_user_comment)
                                             <div class="col-md-1"><a class="edit_comment" data-id="{{ $item->id }}" data-content ="{{ $item->content }}" href="javascript:;">{{ __('label.edit') }}</a></div>
                                             <div class="col-md-1"><a class="delete_comment" data-id="{{ $item->id }}" href="javascript:;">{{ __('label.delete') }}</a></div>

                                          @elseif ($id_user_login == config('home.role_admin') && $id_user_login != $id_user_comment)
                                             <div class="col-md-1"></div>
                                             <div class="col-md-1"><a class="delete_comment" data-id="{{ $item->id }}" href="javascript:;">{{ __('label.delete') }}</a></div>
                                          @endif
                                       </div>
                                       <div>
                                          <form action="" class="frm_edit_comment" id="edit-comment-id-{{ $item->id }}">
                                             <div class="row">
                                                <textarea class="form-control" name="" id="textarea-edit-{{ $item->id }}" rows="2"></textarea>
                                             </div>
                                             <div class="row">
                                                <button type="submit" class="btn btn-success"><a class="submit-edit" id="btn-edit-{{ $item->id }}">{{ __('label.edit') }}</a></button>
                                                <button type="submit" class="btn btn-success"><a class="cancel-edit" href="javascript:;">{{ __('label.cancel') }}</a></button>
                                             </div>
                                          </form>
                                       </div>
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
<input type="hidden" id="song" name="song" value="{{ $musics->id }}">
@endsection
