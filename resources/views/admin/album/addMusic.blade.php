@extends('admin.master')
@section('content')
    <form action="{{ route('albums.music_add_process') }}" method="post" enctype="multipart/form-data">
        <legend>{{ trans('label.album') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table"> 
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.album') }}</label>
                        <select name="album" class="form-control" required="required">
                        @foreach ($albums as $albums)
                            <option value="{{ $albums->id }}">{{ $albums->name }}</option>
                        @endforeach
                    </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.music') }}</label>
                        <select name="music" class="form-control" required="required">
                        @foreach ($musics as $musics)
                            <option value="{{ $musics->id }}">{{ $musics->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-danger" value="{{ trans('label.add') }}" ></td>
            </tr>
        </table>
    </form>
@stop
