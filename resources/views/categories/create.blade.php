@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                {{isset($category) ? 'Edit Category' : 'Create Category'}}
            </div>

            <a href="{{route('categories.index')}}" class="btn btn-success btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
            <form action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store')}}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{isset($category) ? $category->name : ''}}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
                
        </div>
    </div>
@endsection

@section('scripts')

@endsection