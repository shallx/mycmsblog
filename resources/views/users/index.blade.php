@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-left">
            Posts
        </div>

    </div>
    <div class="card-body">
        @if ($users->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Privilage</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <div>{{ucfirst($user->name)}}</div>
                    </td>
                    <td>
                        <div>{{$user->email}}</div>
                    </td>
                    <td>
                        <div> 
                            <div>{{ucfirst($user->role)}}</div>
                        </div>
                    </td>
                    <td>
                        <div>
                            @if($user->role == 'writer')  
                                {{-- <form action="{{route('users.update', $user->id)}}" method="POST" --}}
                                <form action="" method="POST"
                                    class="form-inline">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-success btn-sm text-white">
                                        Make Admin
                                        </button>
                                </form>
                            @endif
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