@extends('admin.master')
@section('content')
	@if (Session::has('errId'))
		<div>{{ trans('validation.exists') }}</div>
	@endif
	<a href="{{ route('categories.add_view') }}" class="btn btn-primary">{{ trans('label.add') }}</a>
    <table>
		<thead>
			<th>{{ trans('label.id') }}</th>
			<th>{{ trans('label.name') }}</th>
			<th>{{ trans('label.action') }}</th>
		</thead>
		<tbody>
			@foreach ($categories as $item)
			<tr>	
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td><a href="{{ route('categories.update_view', [$item->id]) }}">{{ trans('label.update') }}</a></td>
				<td>
					<a href="{{ route('categories.delete', [$item->id]) }}" onclick="return confirm('ok?')">
						{{ trans('label.delete') }}
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
