{{-- modal select option playlist --}}
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('label.add_to_playlist') }}</h4>
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
                <li data-dismiss="modal" class="li-bottom"><a href="#" data-toggle="modal" data-target="#create_playlist">{{ __('label.create_playlist') }}</a></li>
                <hr>
                @endif
                <i class="fa fa-arrow-circle-o-right icon text-success-lter"></i>
                <li data-dismiss="modal" class="li-bottom"><a href="#">{{ __('label.add_to_queue') }}</a></li>
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
