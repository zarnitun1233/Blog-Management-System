@extends('master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <h1>Create Post</h1>
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Post Title" value={{ old('title') }}>
          @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror" placeholder="Enter content ...">{{ old('content') }}</textarea>
          @error('content')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
@endsection