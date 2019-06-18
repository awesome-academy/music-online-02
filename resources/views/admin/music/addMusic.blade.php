@extends('admin.master')
@section('content')
	<form action="{{ route('musics.add_process') }}" method="post" enctype="multipart/form-data">
	    <legend>{{ trans('label.music') }}</legend>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table class="table" > 
		    <tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.name') }}</label>	
					    <input type="text" name="name" class="form-control" placeholder="{{ trans('label.name') }}" required="required">
					    <input type="hidden" name="view" class="form-control" value="0">   <!----- cai dat mac dinh cho view --->
					    <input type="hidden" name="rating" class="form-control" value="0">  <!-- cai dat mac dinh cho rating --->
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.lyric') }}</label>
					    <input type="text" name="lyric" class="form-control" placeholder="{{ trans('label.lyric') }}" required="required">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.artists') }}</label>
					    <select name="artist" class="form-control" required="required">
						@foreach($artist as $artist)
							<option value="{{ $artist->id }}">{{ $artist->name }}</option>
						@endforeach
					</select>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					<label for="">{{ trans('label.home_category') }}</label>
					<select name="category" class="form-control" required="required">
						@foreach($category as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.path') }}</label>
					    <input type="text" name="path" class="form-control" placeholder="/Url" required="required">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.author') }}</label>
					    <input type="text" name="author" class="form-control" placeholder="{{ trans('label.author') }}" required="required">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.slug') }}</label>
					    <input type="hidden" name="slug" class="form-control" placeholder="Ex:my-tam" required="required">
					</div>
				</td>
			</tr> 
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.image') }}</label>
					    <input type="file" name="image" class="form-control" required="required">
					</div>
				</td>
			</tr>
				<td colspan="2" align="center"><input type="submit" value="{{ trans('label.add') }}" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
@stop
