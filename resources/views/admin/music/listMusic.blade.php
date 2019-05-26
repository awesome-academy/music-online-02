@extends('admin.master')
@section('content')
	<a href="admin/addMusics" class="btn btn-primary">Add</a>
    <table id="dataTable" class="table table-bordered dataTable" aria-describedby="dataTable_info">
		<thead>
			<th>Id</th>
			<th>Name</th>
			<th>Lyric</th>
			<th>View</th>
			<th>Path</th>
			<th>Author</th>
			<th>Rating</th>
			<th>Slug</th>
		</thead>
		<tbody>
			@foreach($music as $item)
			<tr>
				
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<td>{{$item->lyric}}</td>
				<td>{{$item->view}}</td>
				<td>{{$item->path}}</td>
				<td>{{$item->author}}</td>
				<td>{{$item->rating}}</td>
				<td>{{$item->slug}}</td>
				<td><a href="admin/updateMusics/{{$item->id}}">Update</a></td>
				<td><a href="admin/deleteMusics/{{$item->id}}">Delete</a></td>
			</tr>		
			@endforeach
		</tbody>
	</table>
@stop
