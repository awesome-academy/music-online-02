@extends('admin.master')
@section('content')
	<a href="{{ route('artist.add_view', ['$item->id'])) }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    <table>
		<thead>
			<th>{{ trans('label.id') }}</th>
			<th>{{ trans('label.name') }}</th>
			<th>{{ trans('label.description') }}</th>
			<th>{{ trans('label.image') }}</th>
			<th>{{ trans('label.action') }}</th>
		</thead>
		<tbody>
			@foreach ($aritsts as $item)
			<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td>{{ $item->description }}</td>
				<td>{{ $item->image }}</td>
				<td>
					<a href="{{ route('artist.update_view', ['$item->id'])) }}">{{ trans('label.update') }}</a>
					<a href="{{ route('artist.delete', ['$item->id'])) }}">{{ trans('label.delete') }}</a>
				</td>
			</tr>		
			@endforeach
		</tbody>
	</table>
@stop
