@extends('admin.master')
@section('content')
<form action="admin/updateProcessCategory/{{$categories->id}}" method="post">
    <legend>Thêm Category Mới</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table class="table"> 
		<Tr>
			<Td>
				<div class="form-group col-4">
				<label for="">id</label>
				<input type="text" name="id" class="form-control" value="{{$categories->id}}" readonly="readonly">
				</div>
			</Td>
		</Tr>
	    <Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Name</label>
				<input type="text" name="nameCategory" class="form-control" value="{{$categories->name}}">
				</div>
			</Td>
		</Tr>
			<Td colspan="2" align="center"><input type="submit" value="Update" ></Td>
		</tr>
	</table>
</form>
@stop
