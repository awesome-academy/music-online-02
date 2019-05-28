@extends('admin.master')
@section('content')
    <form action="{{ route('categories.add_process') }}" method="post">
	    <legend>{{ trans('label.category') }}</legend>
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
