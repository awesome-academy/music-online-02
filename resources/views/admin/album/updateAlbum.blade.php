@extends('admin.master')
@section('content')
    <form action="{{ route('albums.update_process', [$albums->id]) }}" method="post">
    <legend>{{ trans('label.update') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }} " >
        <table class="table table"> 
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.id') }}</label>	
                        <input type="text" name="id" class="form-control" value="{{ $albums->id }}" readonly="readonly">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.name') }}</label>	
                        <input type="text" name="name" class="form-control" value="{{ $albums->name }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.slug') }}</label>
                        <input type="text" name="slug" class="form-control" value="{{ $albums->slug }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.image') }}</label>
                        <input type="hidden" value="{{ $albums->image }}" name="dataImage">
                        <input type="file" name="image" class="form-control">
                    </div>
				</td>
            </tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-success" value="{{ trans('label.update') }}" ></td>
            </tr>
        </table>
    </form>
@stop
