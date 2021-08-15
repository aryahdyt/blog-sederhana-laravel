@extends('template.master')

@section('title')
Blog
@endsection

@section('page')
<div class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></div>
<div class="breadcrumb-item active">Tambah</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Blog Baru
            </div>
            <div class="card-body">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Photo blog</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control-file">
                            <small class="form-text text-muted">Masukan Dengan Format JPG, JPEG atau
                                PNG</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Judul blog</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ old('title','') }}"
                                class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content blog</label>
                        <div class="col-sm-10">
                            <textarea name="content"
                                class="my-editor @error('content') is-invalid @enderror">{!! old('content','') !!}</textarea>
                            @error('content')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-sm btn-success">Simpan Blog Baru</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            // "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            // "searchreplace wordcount visualblocks visualchars code fullscreen",
            // "insertdatetime media nonbreaking save table contextmenu directionality",
            // "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
            } else {
            cmsURL = cmsURL + "&type=Files";
            }
    
            tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 2,
            resizable : "yes",
            close_previous : "no"
            });
        }
        };
    
    tinymce.init(editor_config);
</script>
@endpush