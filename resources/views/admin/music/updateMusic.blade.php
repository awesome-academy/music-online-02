@extends('admin.master')
@section('content')
	<form action="{{ route('musics.update_process', [$musics->id]) }}" method="post">
	    <legend>{{ trans('label.music') }}</legend>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}" enctype="multipart/form-data">
		<table class="table"> 
			<tr>
				<td>
					<div class="form-group col-8">
					   <label for="">{{ trans('label.id') }}</label>	
					   <input type="text" name="id" class="form-control" value="{{ $musics->id }}" readonly="readonly">
					</div>
				</td>
			</tr>
			 <tr>
				<td>
					<div class="form-group col-8">
					   <label for="">{{ trans('label.name') }}</label>	
					   <input type="text" name="nameMusic" class="form-control" value="{{ $musics->name }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.lyric') }}</label>
					    <input type="text" name="lyric" class="form-control" value="{{ $musics->lyric }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.path') }}</label>
					    <input type="text" name="path" class="form-control" value="{{ $musics->path }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.author') }}</label>
					    <input type="text" name="author" class="form-control" value="{{ $musics->author }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.slug') }}</label>
					    <input type="text" name="slug" class="form-control" value="{{ $musics->slug }}">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group col-8">
					    <label for="">{{ trans('label.image') }}</label>
					    <input type="hidden" value="{{ $musics->image }}" name="dataImage">
					    <input type="file" name="image" class="form-control">
					</div>
				</td>
			</tr>
				<td colspan="2" align="center"><input type="submit" value="{{ trans('label.update') }}" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>
@stop
