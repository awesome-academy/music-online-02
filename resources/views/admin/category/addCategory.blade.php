@extends('admin.master')
@section('content')
<<<<<<< HEAD
<form action="admin/addProcessCategories" method="post">
    <legend>Thêm Category Mới</legend>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table class="table"> 
	    <Tr>
			<Td>
				<div class="form-group col-8">
				<label for="">Category Name</label>
				<input type="text" name="nameCategory" class="form-control" placeholder="Name">
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
			<Td colspan="2" align="center"><input type="submit" value="Thêm" ></Td>
		</tr>
	</table>
</form>
@stop
=======
    <form action="{{ route('categories.add_process') }}" method="post">
	    <legend>{{ trans('label.home_category') }}</legend>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table class="table"> 
		    <tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.add_category') }}</label>
				        <input type="text" name="nameCategory" class="form-control" placeholder="{{ trans('label.name') }}">
					</div>
				</td>
			</tr>
			</tr>
				<td colspan="2" align="center"><input type="submit" value="{{ trans('label.add') }}"></td>
			</tr>
		</table>
    </form>
@stop
>>>>>>> 8d1cca1d4b52919c1ebfafed28862b52984c82e6
