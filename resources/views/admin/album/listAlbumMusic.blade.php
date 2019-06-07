@extends('admin.master')
@section('content')
    <table id="dataTable" class="table table-bordered dataTable" >
        <thead>
            <th>{{ trans('label.id') }}</th>
            <th>{{ trans('label.music') }}</th>
            <th>{{ trans('label.album') }}</th>
            <th>{{ trans('label.image') }}</th>
            <th>{{ trans('label.action') }}</th>
        </thead>
        <tbody>
            @foreach ($albums->musics as $music)
            <tr>
                <td>{{ $music->id }}</td> 
                <td>{{ $music->name }}</td>
                <td>{{ $albums->name }}</td>
                <td>
                    <img src="{{ config('home.image.image') }}/{{ $music->image }}" class="img-thumbnail">
                </td>
                <td>
                    <a href="{{ route('albums.music_delete', [$music->id, $albums->id]) }}" class="btn btn-danger">{{ trans('label.delete') }}</a>
                </td>
            </tr>		
            @endforeach
        </tbody>
    </table>
    <hr>
@stop
