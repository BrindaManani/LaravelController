@extends('layout.app')
@extends('include.header')
@section('page_title','Home')

@section('content')
<div class="mt-5">
    <table class="table table-border table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user['id'] ?: "null"  }}</td>
            <td>{{ $user['name'] ?: "null"  }}</td>
            <td>{{ $user['email'] ?: "null"  }}</td>
            <td>{{ $user['phone'] ?: "null" }}</td>
            <td>{{ $user['role'] ?: "null"  }}</td>
            <td>
                {{ $user['status'] ?: "null"  }}</td>
            <td><a href="{{ route('detail', $user['id']) }}">View details >
            <a href="{{ route('editUser', $user['id']) }}">Edit ></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
