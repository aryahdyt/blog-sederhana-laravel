@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">

        <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3">Tambah Blog</a>
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
                                    <h2 class="text-monospace ">Photo Not Found</h2>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title text-capitalize font-weight-bold">{{ $blog->title }}</h4>
                                <p class="card-text overflow-auto" style="height: 150px">{!! $blog->content !!}
                                </p>
                            </div>
                            <div class="text-right">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                    <a href="{{ route('blog.edit', $blog->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">X</button>
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