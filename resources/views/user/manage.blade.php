@extends('layouts.app')
@section('content')
    <div class="container-fluid col-md-6">
        <form action="{{ $user->id > 0 ? route('user.update', $user->id) : route('user.store') }}" method="POST">
            @if ($user->id > 0)
                @method('PUT')
            @endif
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name ?? old('name')}}">
                @error('name') <span class="text-sm text-danger">{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email ?? old('email')}}">
                @error('email') <span class="text-sm text-danger">{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" class="form-control" id="password" name="password">
                @error('password') <span class="text-sm text-danger">{{$message}}</span> @enderror
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-sm btn-dark mx-1">Back</a>
            <button type="submit" class="btn btn-primary btn-sm mx-1">Submit</button>
        </form>
    </div>
@endsection
