@extends('template.master')

@section('title')
Blog
@endsection

@section('page')
<div class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></div>
@endsection

@section('btn-tambah')
<a href="{{ route('blog.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            @forelse ($blogs as $blog)
            <div class="col-sm-6">
                <div class="card mb-2 p-4">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            @if ($blog->image)
                            <img src="{{ Storage::url('photoblogs/') . $blog->image }}" class="card-img"
                                alt="{{ $blog->image }}" style="height: 80%">
                            @else
                            <div class="card" style="height: 80%">
                                <div class="card-body">
                                    <h2 class="text-monospace">Photo Not Found</h2>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title text-capitalize font-weight-bold">{{ $blog->title }}
                                </h4>
                                <div class="overflow-auto" style="height: 120px">
                                    <p class="card-text">{!! $blog->content !!}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $blog->created_at->diffForHumans() }} By {{ $blog->user->name }}
                        </div>
                        <div class="col">
                            <div class="text-right">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    @if(session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

    @endif
</script>
@endpush