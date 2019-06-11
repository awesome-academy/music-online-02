@extends('admin.master')
@section('content')
    <form action="{{ route('roles.update_process', [$roles->id]) }}" method="post">
        <legend>{{ trans('label.role') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table"> 
            <tr>
                <td>
                    <div class="form-group col-4">
                        <label for="">{{ trans('label.id') }}</label>
                        <input type="text" name="id" class="form-control" value="{{ $roles->id }}" readonly="readonly">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.name') }}</label>
                        <input type="text" name="nameRole" class="form-control" value="{{ $roles->name }}">
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center"><input type="submit" value="{{ trans('label.update') }}" ></td>
            </tr>
        </table>
    </form>
@stop
