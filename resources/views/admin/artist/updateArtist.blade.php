@extends('admin.master')
@section('content')
    <form action="{{ route('artists.update_process', [$artists->id]) }}" method="post" enctype="multipart/form-data">
        <legend>{{ trans('label.update') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
        <table class="table"> 
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.id') }}</label>
                        <input type="text" name="id" class="form-control" value="{{ $artists->id }}" readonly="readonly">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.name') }}</label>
                        <input type="text" name="nameArtist" class="form-control" value="{{ $artists->name }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.description') }}</label>
                        <input type="text" name="description" class="form-control" value="{{ $artists->description }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.slug') }}</label>
                        <input type="text" name="slug" class="form-control" value="{{ $artists->slug }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.image') }}</label>
                        <div>
                            <div id="thumbbox">
                                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="" src="{{ $artists->image }}" />
                                <a class="removeimg" href="javascript:" ></a>
                            </div>
                            <div id="myfileupload">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{ $artists->image }}" name="dataImage">
                                <input type="file" id="uploadfile" name="image" onchange="readURL(this);" />
                                <!--      Name  mà server request về sẽ là ImageUpload-->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-success" value="{{ trans('label.update') }}" ></td>
            </tr>
        </table>
    </form>
@stop
