@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="action-btns d-flex justify-content-end align-items-center my-3">
            <a href="{{route('user.create')}}" class="btn btn-sm btn-success">Add New</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a href="{{route('user.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="javascript:void(0)" onclick="deleteUser({{$item->id}})" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-secondary">Data not found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @section('footer-script')
    <script>
        const deleteUser = (userId) => {
            console.log("Function called")
            fetch(`/user/${userId}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": "{{csrf_token()}}"
                },
            });
            window.location.reload();
            toastr.success("User deleted!")
        }
    </script>
        
    @endsection
@endsection
