@extends('layouts.app')

@section('content')

    <div class="card shadow card-default">
        <div class="card-header">

          <h4>{{isset($post)? 'Edit post' : 'Create post'}}</h4>
        
        </div>
        
        <div class="card-body">

          @include('partial.errors')

            <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                @if (isset($post))
                  @method('PATCH')
                @endif
    
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" class="form-control" value="{{ isset($post)? $post->title : '' }} {{ old('title') }}">
                </div>
    
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post)? $post->description : '' }} {{ old('description') }}
                    </textarea>
                  </div>
    
                  <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post)? $post->content : '' }} {{ old('content') }}">
                    <trix-editor input="content"></trix-editor>
                  </div>
    
                  <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{ isset($post)? $post->published_at : '' }} {{ old('published_at') }}">
                  </div>

                  @if (isset($post))
                      <div class="form form-group">
                      <img src="{{ asset('storage/'.$post->image) }}" alt="" style="width: 50%">
                      </div>
                  @else
                      
                  @endif
    
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          
                          @if (isset($post))
                            @if ($category->id == $post->category_id)
                              selected
                            @endif
                          @endif>

                          {{ $category->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  @if ($tags->count() > 0)
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <select class="tagSelect form-control" name="tags[]" id="tags" multiple="multiple">
                      @foreach ($tags as $tag)
                        <option value="{{ $tag->id }} {{ old('tags[]') }}"
                          
                          @if (isset($post))
                            @if ($post->hasTag($tag->id))
                              selected
                            @endif
                          @endif
                          
                          >
                          {{ $tag->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  @endif
    
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      {{ isset($post)? 'Update post' : 'Create post' }}
                    </button>
                </div>
    
            </form>
        </div>

    </div>

    
    
@endsection

@section('script') <!--trixeditor, datepicker, and select2 plugin-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
      flatpickr('#published_at', {

        enableTime: true,
        enableSeconds: true

      })
    </script>

    <script>
      $(document).ready(function()
      {
        $('.tagSelect').select2();
      })
    </script>
@endsection

@section('css') <!--trixeditor, datepicker, and select2 plugin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection