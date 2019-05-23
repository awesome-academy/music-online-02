@extends('admin.master')
@section('content')
<form action="admin/addProcessArtists" method="post" enctype="multipart/form-data">
    <legend>Thêm Artist Mới</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table class="table"> 
	    <Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Artist Name</label>	
				<input type="text" name="nameArtist" class="form-control" placeholder="Name">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Description</label>
				<input type="text" name="description" class="form-control" placeholder="Name">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Slug</label>
				<input type="text" name="slug" class="form-control" placeholder="Name">
				</div>
			</Td>
		</Tr>
		<Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Image</label>
				<input type="file" name="image" class="form-control" placeholder="Name">
				</div>
			</Td>
		</Tr>
			<Td colspan="2" align="center"><input type="submit" value="Thêm" ></Td>
		</tr>
	</table>
</form>
@stop