@extends('admin.master')
@section('content')
	<a href="admin/addArtists" class="btn btn-primary">Add</a>
    <table>
		<thead>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Name</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($aritsts as $item)
			<tr>
				
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<td>{{$item->description}}</td>
				<td><a href="admin/updateArtists/{{$item->id}}">Update</a></td>
				<td><a href="admin/deleteArtists/{{$item->id}}">Delete</a></td>
			</tr>		
			@endforeach
		</tbody>
	</table>
@stop
