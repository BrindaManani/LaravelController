@extends('layout.app')
@extends('include.header')
@section('page_title','Home')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3">
            {{-- <a class="nav-link" href="{{ route('index') }}"><</a> --}}
            <h4 class="mb-0">User Profile Detail</h4>
            <span class="badge {{ $user['status'] == 'active' ? 'bg-success' : 'bg-danger' }}">
                {{ ucfirst($user['status']) }}
            </span>
        </div>
        <div class="container">
            <div class="row m-3">
                @if($user != null)
                <div class="col-sm">
                    <h5>{{ $user['name'] }}</h5>
                    <p>Id: {{ $user['id'] }}</p>
                    <p>Email: {{ $user['email'] }}</p>
                    <p>Phone: {{ $user['phone'] }}</p>
                    <p>Role: {{ $user['role'] }}</p>
                </div>
                @endif
                @if($user['profile'] != null)
                    @if(!empty($filter = array_filter($user['profile'])))
                    <div class="col-sm">
                        <h5>Profile</h5>
                        {{-- <p>Avatar: {{ $user['profile']['avatar'] ?: "null"}}</p> --}}
                        <p>Gender: {{ $user['profile']['gender'] }}</p>
                        <p>Dat of birth: {{ $user['profile']['dob'] }}</p>
                    </div>
                    @endif
                @endif
            </div>
            <div class="row m-3">

                @if($user['address'] != null)
                    @if(!empty($filter = array_filter($user['address'])))
                    <div class="col-sm">
                        <h5>Address</h5>
                        <p>City: {{ $user['address']['city'] }}</p>
                        <p>State: {{ $user['address']['state'] }}</p>
                        <p>Country: {{ $user['address']['country'] }}</p>
                        <p>Pincode: {{ $user['address']['pincode'] }}</p>
                    </div>
                    @endif
                @endif
                @if ($user['permissions'] != null)
                    @if(!empty($filter = array_filter($user['permissions'])))
                    <div class="col-sm">
                        <h5>Permissions</h5>
                        @foreach($user['permissions'] as $permission)
                            <p>{{ $permission }}</p>
                        @endforeach
                    </div>
                    @endif
                @endif
            </div>
        </div>
  </div>
</div>
@endsection