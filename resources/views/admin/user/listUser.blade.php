@extends('admin.master')
@section('content')
    @if (Session::has('success'))
         <p>{{ trans('label.delete_success') }}</p>
    @elseif (Session::has('fail'))
        <p>{{ trans('label.delete_fail') }}</p>
    @endif    
    <table id="dataTable" class="table table-bordered dataTable" aria-describedby="dataTable_info">
        <thead>
            <th>{{ trans('label.id') }}</th>
            <th>{{ trans('label.name') }}</th>
            <th>{{ trans('label.role') }}</th>
            <th>{{ trans('label.action') }}</th>
        </thead>
        <tbody>
            @foreach($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->role_id }}</td>
                <td>
                    <form action="{{ route('users.change', [$item->id]) }}" id="inputForm" method="post" class="formInput">
                        {{ csrf_field() }}
                        <select name="role" class="form-control role" id="role">
	                        @foreach($roles as $val)
                                <option value="{{ $val->id }}" @if ($val->id == $item->this_id) selected="selected" @endif >
                                    {{ $val->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <a href="{{ route('users.delete', [$item->id]) }}" class="btn btn-danger" onclick="return confirm('{{ trans('label.delete') }}')">
                        {{ trans('label.delete') }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop
