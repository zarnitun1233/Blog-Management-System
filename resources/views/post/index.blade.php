@extends('master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h1>Posts List</h1>
      <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-end mb-4">Add New</a>
      @if (Session('successAlert'))
      <div class="alert alert-dismissible show fade alert-success">
        <strong>{{ Session('successAlert') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
      </div>
      @endif
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-success btn-sm" href="{{ route('posts.edit', $post->id) }}">
                  <i class="fa fa-edit"></i> Edit
                </a>
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                  <i class="fa fa-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $posts->links() }}
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
@endsection