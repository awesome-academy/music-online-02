@extends('admin.master')
@section('content')
	<a href="{{ route('artists.add_view') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    <table id="dataTable" class="table table-bordered dataTable" >
		<thead>
			<th>{{ trans('label.id') }}</th>
			<th>{{ trans('label.name') }}</th>
			<th>{{ trans('label.description') }}</th>
			<th>{{ trans('label.image') }}</th>
			<th>{{ trans('label.action') }}</th>
		</thead>
		<tbody>
			@foreach ($artists as $item)
			<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td>{{ $item->description }}</td>
				<td><img src="{{ $item->image }}" class="img-thumbnail"></td>
				<td>
					<a href="{{ route('artists.update_view', [$item->id]) }}" class="btn btn-dark">{{ trans('label.update') }}</a>
					<a href="{{ route('artists.delete', [$item->id]) }}" class="btn btn-danger">{{ trans('label.delete') }}</a>
				</td>
			</tr>		
			@endforeach
		</tbody>
	</table>
@stop
