@extends('master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Blog Baru
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
                @endif
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
                            <input type="text" name="title" value="{{ old('title','') }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content blog</label>
                        <div class="col-sm-10">
                            <textarea name="content" value="{{ old('content','') }}" class="form-control" cols="30"
                                rows="8"></textarea>
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