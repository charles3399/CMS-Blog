@extends('layouts.app')

@section('content')

    <div class="card shadow card-default">
        <div class="card-header">
            <h3 class="float-left">Tags</h3>
            <a href="{{route('tags.create')}}" class="btn btn-success float-right">New Tag</a>
        </div>

        <div class="card-body">
            @if ($tags->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Posts</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    {{$tag->posts->count()}}
                                </td>
                                <td>

                                    <div class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$tag->id}})">Delete</div>

                                    <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-primary btn-sm  float-right mr-2">Edit</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="post" id="deleteTagForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>WARNING
                                        </b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-bold">
                                        Are you sure you want to delete this tag?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                There are no tags yet...
            @endif

        </div>
    </div>
@endsection

@section('script')

    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteTagForm')

            form.action = 'tags/' + id

            $('#deleteModal').modal('show')
        }
    </script>

@endsection