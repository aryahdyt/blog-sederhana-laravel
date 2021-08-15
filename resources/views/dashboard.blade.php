@extends('template.master')

@section('title')
Dashboard
@endsection

@section('content')
@if (auth()->user()->role == "admin")
{{-- admin --}}
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4><a href="{{ route('user.index') }}" class="text-decoration-none">Total User</a></h4>
                </div>
                <div class="card-body">
                    {{ $countUser }}
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(auth()->user()->role == "normal")
{{-- siswa --}}
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-clipboard"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Blog Saya</h4>
                </div>
                <div class="card-body">
                    {{ $countBlog }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection