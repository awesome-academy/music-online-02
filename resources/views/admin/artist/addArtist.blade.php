@extends('admin.master')
@section('content')
	<form action="{{ route('artists.add_process', ['$item->id']) }}" method="post" enctype="multipart/form-data">
	    <legend>{{ trans('label.artist') }}</legend>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table class="table"> 
		    <tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.name') }}</label>	
					    <input type="text" name="nameArtist" class="form-control" placeholder="{{ trans('label.name') }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					   <label for="">{{ trans('label.description') }}</label>
					   <textarea type="text" name="description" class="form-control" placeholder="{{ trans('label.description') }}"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.slug') }}</label>
					    <input type="text" name="slug" class="form-control" placeholder="{{ trans('label.slug') }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.image') }}</label>
					    <input type="file" name="image" class="form-control" placeholder="{{ trans('label.image') }}">
					</div>
				</td>
			</tr>
				<td colspan="2" align="center"><input type="submit" class="btn btn-danger" value="{{ trans('label.add') }}" ></td>
			</tr>
		</table>
	</form>
@stop
