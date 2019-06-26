@extends('admin.master')
@section('content')
    <form action="{{ route('albums.update_process', [$albums->id]) }}" method="post" enctype="multipart/form-data">
    <legend>{{ trans('label.update') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }} " >
        <table class="table table"> 
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.id') }}</label>	
                        <input type="text" name="id" class="form-control" value="{{ $albums->id }}" readonly="readonly">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.name') }}</label>	
                        <input type="text" name="name" class="form-control" value="{{ $albums->name }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.slug') }}</label>
                        <input type="text" name="slug" class="form-control" value="{{ $albums->slug }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group col-8">
                        <label for="">{{ trans('label.image') }}</label>
                        <div>
                            <div id="thumbbox">
                                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="" src="{{ $albums->image }}" />
                                <a class="removeimg" href="javascript:" ></a>
                            </div>
                            <div id="myfileupload">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{ $albums->image }}" name="dataImage">
                                <input type="file" id="uploadfile" name="image" onchange="readURL(this);" />
                                <!--      Name  mà server request về sẽ là ImageUpload-->
                                <button type="submit" class="btn btn-info">
                                    {{ trans('label.update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center">
                    <input type="submit" class="btn btn-success" value="{{ trans('label.update') }}" >
                </td>
            </tr>
        </table>
    </form>
@stop
