@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                {{isset($tag) ? 'Edit Tag' : 'Create Tag'}}
            </div>

            <a href="{{route('tags.index')}}" class="btn btn-success btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
            <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{isset($tag) ? $tag->name : ''}}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
                
        </div>
    </div>
@endsection

@section('scripts')

@endsection