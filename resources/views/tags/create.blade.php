@extends('layouts.app')

@section('content')

    <div class="card shadow card-default">

        <div class="card-header">
            <h4>{{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}</h4>
        </div>

        <div class="card-body">
            
            @include('partial.errors')

            <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="post">
                @csrf

                @if (isset($tag))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ isset($tag) ? $tag->name : '' }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{isset($tag) ? 'Update tag' : 'Add tag' }}
                    </button>
                </div>

            </form>
        </div>

    </div>

@endsection