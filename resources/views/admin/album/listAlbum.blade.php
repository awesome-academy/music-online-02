@extends('admin.master')
@section('content')
    <a href="{{ route('albums.add_view') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    <a href="{{ route('albums.music_add') }}" class="btn btn-primary">{{ trans('label.add_music') }}</a>
    <table id="dataTable" class="table table-bordered dataTable" >
        <thead>
            <th>{{ trans('label.id') }}</th>
            <th>{{ trans('label.name') }}</th>
            <th>{{ trans('label.slug') }}</th>
            <th>{{ trans('label.image') }}</th>
            <th>{{ trans('label.action') }}</th>
        </thead>
        <tbody>
            @foreach ($albums as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><a href="{{ route('albums.music_view', [$item->id]) }}">{{ $item->name }}</a></td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->image }}</td>
                <td>
                    <a href="{{ route('albums.update_view', [$item->id]) }}" class="btn btn-dark">{{ trans('label.update') }}</a>
                    <a href="{{ route('albums.delete', [$item->id]) }}" class="btn btn-danger">{{ trans('label.delete') }}</a>
                </td>
            </tr>		
            @endforeach
        </tbody>
    </table>
    <hr>
@stop
