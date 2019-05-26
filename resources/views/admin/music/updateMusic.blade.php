@extends('admin.master')
@section('content')
<form action="admin/updateProcessMusics/{{$musics->id}}" method="post">
    <legend>Update Music</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}" enctype="multipart/form-data">
	<table class="table"> 
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Music Id</label>	
				<input type="text" name="id" class="form-control" value="{{$musics->id}}" readonly="readonly">
				</div>
			</Td>
		</Tr>
		 <Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Music Name</label>	
				<input type="text" name="nameMusic" class="form-control" value="{{$musics->name}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Lyric</label>
				<input type="text" name="lyric" class="form-control" value="{{$musics->lyric}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Path</label>
				<input type="text" name="path" class="form-control" value="{{$musics->path}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Author</label>
				<input type="text" name="author" class="form-control" value="{{$musics->author}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Slug</label>
				<input type="text" name="slug" class="form-control" value="{{$musics->slug}}">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Image</label>
				<input type="hidden" value="{{$musics->image}}" name="dataImage">
				<input type="file" name="image" class="form-control">
				</div>
			</Td>
		</Tr>
			<Td colspan="2" align="center"><input type="submit" value="Update" class="btn btn-primary"></Td>
		</tr>
	</table>
</form>
@stop