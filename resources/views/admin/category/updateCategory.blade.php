@extends('admin.master')
@section('content')
<<<<<<< HEAD
<form action="admin/updateProcessCategories/{{$categories->id}}" method="post">
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
=======
	<form action="{{ route('categories.update_process', [$categories->id]) }}" method="post">
	    <legend>{{ trans('label.home_category') }}</legend>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table class="table"> 
			<tr>
				<td>
					<div class="form-group col-4">
					   <label for="">{{ trans('label.id') }}</label>
					   <input type="text" name="id" class="form-control" value="{{ $categories->id }} " readonly="readonly">
					</div>
				</td>
			</tr>
		    <tr>
				<td>
					<div class="form-group col-8">
					   <label for="">{{ trans('label.name') }}</label>
					   <input type="text" name="nameCategory" class="form-control" value="{{ $categories->name }}">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="{{ trans('label.update') }}"></td>
			</tr>
		</table>
	</form>
@stop
>>>>>>> 8d1cca1d4b52919c1ebfafed28862b52984c82e6
