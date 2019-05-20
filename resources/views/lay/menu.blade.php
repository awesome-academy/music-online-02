<aside class="bg-black dk nav-xs aside hidden-print" id="nav">
    <section class="vbox">
        <section class="w-f-md scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
            <!-- nav --> 
            <nav class="nav-primary hidden-xs">
                <ul class="nav bg clearfix">
                    <li> <a href="genres.html"> <i class="icon-music-tone-alt icon text-info"></i> <span class="font-bold">{{ trans('label.music') }}</span> </a> </li>
                </ul>
                <ul class="nav" data-ride="collapse">
                    <li >
                        <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-down text-active"></i> </span> <i class="icon-screen-desktop icon"> </i> <span>{{ trans('label.home_category') }}</span> </a> 
                        <ul class="nav dk text-sm">
                            <li > <a href="layout-color.html" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>{{ config('home.menu.category.pop') }}</span> </a> </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav text-sm">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> <span class="pull-right"><a href="#"><i class="icon-plus i-lg"></i></a></span>{{ trans('label.home_playlist') }}</li>
                    <li> <a href="#"> <i class="icon-playlist icon text-success-lter"></i> <b class="badge bg-success dker pull-right">9</b> <span>{{ config('home.menu.playlist') }}</span> </a> </li>
                </ul>
            </nav>
            <!-- / nav --> 
        </div>
        </section>
        <footer class="footer hidden-xs no-padder text-center-nav-xs">
        <div class="bg hidden-xs ">
            <div class="dropdown dropup wrapper-sm clearfix">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left m-l-xs"> <img src="" class="dker" alt="..."> <i class="on b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-l"> <strong class="font-bold text-lt">{{ config('home.user.name') }}</strong> <b class="caret"></b> </span> <span class="text-muted text-xs block m-l">Art Director</span> </span> </a> 
                <ul class="dropdown-menu animated fadeInRight aside text-left">
                    <li> <span class="arrow bottom hidden-nav-xs"></span> <a href="#">{{ trans('label.settings') }}</a> </li>
                    <li> <a href="profile.html">{{ trans('label.profile') }}</a> </li>
                    <li class="divider"></li>
                    <li> <a href="modal.lockme.html" data-toggle="ajaxModal" >{{ trans('label.logout') }}</a> </li>
                </ul>
            </div>
        </div>
        </footer>
    </section>
</aside>
