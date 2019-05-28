@extends('admin.master')
@section('content')
<form action="admin/addProcessCategory" method="post">
    <legend>Thêm Category Mới</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table class="table"> 
	    <Tr>
			<Td>
				<div class="form-group col-8">
				<input type="text" name="nameCategory" class="form-control" placeholder="Name">
				</div>
			</Td>
		</Tr>
			<Td colspan="2" align="center"><input type="submit" value="Thêm" ></Td>
		</tr>
	</table>
</form>
@stop
