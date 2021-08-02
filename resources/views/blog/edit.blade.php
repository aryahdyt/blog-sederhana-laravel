@extends('master')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Blog Update
            </div>
            <div class="card-body">
                {{-- @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
            </div>
            @endforeach
            @endif --}}
            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                @if (!empty($blog->image))
                <img src="{{ Storage::url('photoblogs/') . $blog->image }}" class="card-img-top mb-3 text-center"
                    style="width: 12rem" />
                @else
                <div class="card  mb-3" style="height: 12rem; width: 12rem;">
                    <div class="card-body">
                        <h2 class="text-monospace ">Photo Not Found</h2>
                    </div>
                </div>
                @endif

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo blog</label>

                    <div class="col-sm-3">
                        <a id="updateimage" class="btn btn-sm btn-block btn-primary">Update Image</a>
                    </div>

                    <div class="col-sm-7" id="fromimage" style="display: none">
                        <input type="file" name="image" class="form-control-file">
                        <small class="form-text text-muted">Masukan Dengan Format JPG, JPEG atau
                            PNG</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Judul blog</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Content blog</label>
                    <div class="col-sm-10">
                        <textarea name="content" value="{{ old('content','') }}" class="form-control" cols="30"
                            rows="8">{{ $blog->content }}</textarea>
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
<script type="text/javascript">
    $(document).ready(function(){
		$('#updateimage').click(function(){
			$('#fromimage').toggle();
		});
	});
</script>
@endpush