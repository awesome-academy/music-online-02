<aside class="bg-black dk nav-xs aside hidden-print" id="nav">
    <section class="vbox">
        <section class="w-f-md scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <!-- nav --> 
                <nav class="nav-primary hidden-xs">
                    <ul class="nav bg clearfix">
                        <li> 
                            <a href="#"> 
                                <i class="icon-music-tone-alt icon text-info"></i> 
                                <span class="font-bold">{{ trans('label.music') }}</span> 
                            </a> 
                        </li>
                    </ul>
                    <ul class="nav" data-ride="collapse">
                        <li >
                            <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i> 
                                </span> <i class="icon-screen-desktop icon"> </i> 
                                <span>{{ trans('label.home_category') }}</span> 
                            </a> 
                            <ul class="nav dk text-sm">
                                @foreach($category as $items)
                                <li > 
                                    <a href="category/{{ $items->id }}" class="auto"> 
                                        <i class="fa fa-angle-right text-xs"></i> 
                                        <span>{{ $items->name }}</span> 
                                    </a> 
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav text-sm">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> 
                            <span class="pull-right">
                                <a href="#">
                                    <i class="icon-plus i-lg"></i>
                                </a>
                            </span>
                            {{ trans('label.home_playlist') }}
                        </li>
                        <li> 
                            <a href="#"> 
                                <i class="icon-playlist icon text-success-lter"></i> 
                                <b class="badge bg-success dker pull-right">9</b> 
                                <span>{{ config('home.menu.playlist') }}</span> 
                            </a> 
                        </li>
                    </ul>
                </nav>
                <!-- / nav --> 
            </div>
        </section>
    </section>
</aside>
