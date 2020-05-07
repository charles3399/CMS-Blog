@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">

            <h3 class="float-left">Posts</h3>

            <a href="{{ route('posts.create') }}" class="btn btn-success float-right">New Post</a> 
        </div>

        <div class="card-body">
            @if ($posts->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{ asset('storage/'.$post->image) }}" class="img-thumbnail" width="120px" height="100px"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{ $post->published_at }}</td>

                                <td>
                                        @if ($post->trashed())

                                        <form action="{{ route('restore-posts', $post->id)}}" method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit" class="btn btn-primary btn-sm float-right">Restore</button>

                                        </form>
                                            
                                        @else
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm float-right">Edit</a>
                                        @endif    
                                </td>

                                <td>

                                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm float-right mb-1">
                                            
                                            {{ $post->trashed()? 'Delete' : 'Trash'}}

                                        </button>
                                    </form>
                                </td>

                                
                            </tr>
                        @endforeach
                </tbody>
                </table>
            @else
                Empty...
            @endif


        </div>
    </div>
    
@endsection