@extends('admin.master')
@section('content')
	<a href="{{ route('musics.add_view') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    <table id="dataTable" class="table table-bordered dataTable" aria-describedby="dataTable_info" >
		<thead>
			<th>{{ trans('label.id') }}</th>
			<th>{{ trans('label.name') }}</th>
			<th>{{ trans('label.lyric') }}</th>
			<th>{{ trans('label.view') }}</th>
			<th>{{ trans('label.image') }}</th>
			<th>{{ trans('label.author') }}</th>
			<th>{{ trans('label.rating') }}</th>
			<th>{{ trans('label.slug') }}</th>
			<th>{{ trans('label.action') }}</th>
		</thead>
		<tbody>
			@foreach($music as $item)
			<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td>{{ $item->lyric }}</td>
				<td>{{ $item->view }}</td>
				<td><img src="{{ $item->image }}" class="img-thumbnail"></td>
				<td>{{ $item->author }}</td>
				<td>{{ $item->rating }}</td>
				<td>{{ $item->slug }}</td>
				<td>
					<a href="{{ route('musics.update_view', [$item->id]) }}">{{ trans('label.update') }}</a>
					<a href="{{ route('musics.delete', [$item->id]) }}">{{ trans('label.delete') }}</a>
				</td>
			</tr>		
			@endforeach
		</tbody>
	</table>
@stop
