@extends('admin.master')
@section('content')
	<a href="admin/addcategories" class="btn btn-primary">Add</a>
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
				<td><a href="admin/updateCategory/{{$item->id}}">Update</a></td>
				<td><a href="admin/deleteCategory/{{$item->id}}">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
		
	
@stop