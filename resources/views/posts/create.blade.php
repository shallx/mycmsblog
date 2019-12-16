@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                {{isset($post) ? 'Edit Post' : 'Create Post'}}
            </div>

            <a href="{{route('posts.index')}}" class="btn btn-success btn-sm float-right">Back</a>
        </div>
    

        <div class="card-body">
            <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{isset($post) ? $post->title : ''}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" rows="5" cols="5" name="description" id="description" class="form-control" >{{isset($post) ? $post->description : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea type="text" rows="5" cols="5" name="content" id="content" class="form-control" >{{isset($post) ? $post->content : ''}}</textarea>
                </div>
                <div class="form-group">
                    @if($categories->count() > 0)
                    <label for="category_id">Title</label>
                        @foreach ($categories as $cat)
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="{{$cat->id }}"
                                    @if(isset($post))
                                        @if ($cat->id == $post->category_id)
                                            selected
                                        @endif
                                    @endif
                                    >{{$cat->name}}</option>
                            </select>
                            
                        @endforeach
                    @endif
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('storage/' . $post->image)}}" alt="" style="width:100%">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Upload File</label>
                    <input type="file" name="image" id="image" class="form-control" value="">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
                
    </div>

    </div>

@endsection

@section('scripts')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'content', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );

    flatpickr("#published_at", {
        enableTime : true
    });
</script>
@endsection