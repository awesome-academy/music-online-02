@extends('admin.master')
@section('content')
<<<<<<< HEAD
	<a href="admin/addCategories" class="btn btn-primary">Add</a>
    <table>
		<thead>
			<th>Id</th>
			<th>Name</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($categories as $item)
			<tr>
				
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<td><a href="admin/updateCategories/{{$item->id}}">Update</a></td>
				<td><a href="admin/deleteCategories/{{$item->id}}">Delete</a></td>
=======
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
>>>>>>> 8d1cca1d4b52919c1ebfafed28862b52984c82e6
			</tr>
			@endforeach
		</tbody>
	</table>
<<<<<<< HEAD
	
		
	
@stop
=======
@stop
>>>>>>> 8d1cca1d4b52919c1ebfafed28862b52984c82e6
