@extends('admin.master')
@section('content')
    <form action="{{ route('roles.add_process') }}" method="post">
        <legend>{{ trans('label.role') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table"> 
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.name') }}</label>
                        <input type="text" name="nameRole" class="form-control" placeholder="{{ trans('label.name') }}">
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center"><input type="submit" value="{{ trans('label.add') }}" class="btn btn-danger" ></td>
            </tr>
        </table>
    </form>
@stop
