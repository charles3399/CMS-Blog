@extends('layouts.app')

@section('content')

    <div class="card shadow card-default">
        <div class="card-header">
            <h3 class="float-left">Categories</h3>
            <a href="{{route('categories.create')}}" class="btn btn-success float-right">New Category</a>
        </div>

        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Posts</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->posts->count() }}</td>
                                <td>

                                    <div class="btn btn-danger btn-sm float-right" onclick="handleDelete({{$category->id}})">Delete</div>

                                    <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm  float-right mr-2">Edit</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="post" id="deleteCategoryForm">
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
                                        Are you sure you want to delete this category?
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
                There are no categories yet...
            @endif

        </div>
    </div>
@endsection

@section('script')

    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteCategoryForm')

            form.action = 'categories/' + id

            $('#deleteModal').modal('show')
        }
    </script>

@endsection