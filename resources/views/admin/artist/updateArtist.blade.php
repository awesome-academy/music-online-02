@extends('admin.master')
@section('content')
<form action="admin/updateProcessArtists/{{$artists->id}}" method="post">
    <legend>Update Artist</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}" enctype="multipart/form-data">
	<table class="table"> 
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Artist Id</label>	
				<input type="text" name="id" class="form-control" value="{{$artists->id}}" readonly="readonly">
				</div>
			</Td>
		</Tr>
		 <Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Artist Name</label>	
				<input type="text" name="nameArtist" class="form-control" value="{{$artists->name}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Description</label>
				<input type="text" name="description" class="form-control" value="{{$artists->description}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Slug</label>
				<input type="text" name="slug" class="form-control" value="{{$artists->slug}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Image</label>
				<input type="hidden" value="{{$artists->image}}" name="dataImage">
				<input type="file" name="image" class="form-control">
				</div>
			</Td>
		</Tr>
			<Td colspan="2" align="center"><input type="submit" value="Update" ></Td>
		</tr>
	</table>
</form>
@stop