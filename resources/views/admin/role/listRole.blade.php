@extends('admin.master')
@section('content')
    <a href="{{ route('roles') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    <table id="dataTable" class="table table-bordered dataTable" aria-describedby="dataTable_info">
        <thead>
            <th>{{ trans('label.id') }}</th>
            <th>{{ trans('label.name') }}</th>
            <th>{{ trans('label.action') }}</th>
        </thead>
        <tbody>
            @foreach($roles as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('roles.update_view', [$item->id]) }}" class="btn btn-warning">{{ trans('label.update') }}</a>
                        <a href="{{ route('roles.delete', [$item->id]) }}" class="btn btn-danger">{{ trans('label.delete') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>	
@stop
