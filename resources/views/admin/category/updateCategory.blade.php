@extends('admin.master')
@section('content')
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
