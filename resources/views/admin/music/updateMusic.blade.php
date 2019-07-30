@extends('admin.master')
@section('content')
    <form action="{{ route('musics.update_process', [$musics->id]) }}" method="post" enctype="multipart/form-data">
        <legend>{{ trans('label.music') }}</legend>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
        <table class="table table"> 
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
                        <div>
                            <div id="thumbbox">
                                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="" src="{{ $musics->image }}" />
                                <a class="removeimg" href="javascript:" ></a>
                            </div>
                            <div id="myfileupload">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{ $musics->image }}" name="dataImage">
                                <input type="file" id="uploadfile" name="image" onchange="readURL(this);" />
                                <!--      Name  mà server request về sẽ là ImageUpload-->
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
                <td colspan="2" align="center">
                     <input type="submit" value="{{ trans('label.update') }}" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>
@stop
