@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Posts
        </div>

        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm float-right">Add Post</a>
    </div>
    <div class="card-body">
        @if ($posts->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <img src="{{asset('storage/' . $post->image)}}" width="70px" height="70px"
                            class="img-responsive" alt="">
                    </td>
                    <td>
                        <div class="mt-4">{{$post->title}}</div>
                    </td>
                    <td>
                        <div class="mt-4"> 
                            <a href="{{route('categories.edit', $post->category_id)}}">{{$post->category->name}}</a>
                        </div>
                    </td>
                    <td>
                        <div class="mt-3">
                            @if (!$post->trashed())
                            <a class="btn btn-info btn-small text-white float-left"
                                href="{{route('posts.edit', $post->id)}}">Edit</a>

                            @else
                            <form action="{{route('restore-post', $post->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-small text-white float-left"
                                    href="{{route('posts.edit', $post->id)}}">Restore</button>
                            </form>
                            @endif
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST"
                                    class="form-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-small text-white">
                                        {{$post->trashed() ?'Delete': 'Trash'}}
                                        </button>
                                </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Posts Yet</h3>
        @endif
    </div>

    @endsection