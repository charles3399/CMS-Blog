@extends('layouts.app')

@section('content')

    <div class="card shadow card-default">

        <div class="card-header">
            <h4>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h4>
        </div>

        <div class="card-body">

            @include('partial.errors')

            <form action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
                @csrf

                @if (isset($category))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ isset($category) ? $category->name : '' }} {{ old('name') }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{isset($category) ? 'Update category' : 'Add category' }}
                    </button>
                </div>

            </form>
        </div>

    </div>

@endsection