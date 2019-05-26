@extends('admin.master')
@section('content')
<form action="admin/addProcessMusics" method="post" enctype="multipart/form-data">
    <legend>Thêm Music Mới</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table class="table" > 
	    <Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Music Name</label>	
				<input type="text" name="nameMusic" class="form-control" placeholder="Name" required="required">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Lyric</label>
				<input type="text" name="lyric" class="form-control" placeholder="Lyric" required="required">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Artist</label>
				<select name="artist" class="form-control" required="required">
					@foreach($artist as $artist)
					<option value="{{$artist->id}}">{{$artist->name}}</option>
					@endforeach
				</select>
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Category</label>
				<select name="category" class="form-control" required="required">
					@foreach($category as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Path</label>
				<input type="text" name="path" class="form-control" placeholder="/Url" required="required">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Author</label>
				<input type="text" name="author" class="form-control" placeholder="Author" required="required">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Slug</label>
				<input type="text" name="slug" class="form-control" placeholder="Ex:my-tam" required="required">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Image</label>
				<input type="file" name="image" class="form-control" required="required">
				</div>
			</Td>
		</Tr>

			<Td colspan="2" align="center"><input type="submit" value="Thêm" class="btn btn-primary"></Td>
		</tr>
	</table>
</form>
@stop