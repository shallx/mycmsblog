@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                Category
            </div>

            <a href="{{route('categories.create')}}" class="btn btn-success btn-sm float-right">Add Category</a>
        </div>
        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table">
                    <thead class="text-center">
                        <th>Name</th>
                        <th>Post Count</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($categories as $cat)
                            <tr class="text-center">
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->posts->count()}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-primary btn-sm">Edit</a href="{{route('categories.edit', $cat->id)}}">
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{$cat->id}})">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @else 
                    <h3 class="text-center">No Categories Yet</h3>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to <span class="text-danger font-weight-bold">Delete</span> this Category?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type = "text/javascript">

    function handleDelete(id){
        console.log("Deleting " + 1);
        $('#deleteModal').modal('show');
        var form = $('#deleteForm');
        form.attr('action', "/categories/" + id);

    }

</script>

@endsection