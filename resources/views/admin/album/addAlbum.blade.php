@extends('admin.master')
@section('content')
    <form action="{{ route('albums.add_process') }}" method="post" enctype="multipart/form-data">
        <legend>{{ trans('label.album') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table"> 
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.name') }}</label>	
                        <input type="text" name="name" class="form-control" placeholder="{{ trans('label.name') }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.artists') }}</label>
                        <select name="artist" class="form-control" required="required">
                        @foreach($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                    </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.slug') }}</label>
                        <input type="text" name="slug" class="form-control" placeholder="{{ trans('label.slug') }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.image') }}</label>
                        <input type="file" name="image" class="form-control" placeholder="{{ trans('label.image') }}">
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-danger" value="{{ trans('label.add') }}" ></td>
            </tr>
        </table>
    </form>
@stop
