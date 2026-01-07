@extends('layout.app')
@extends('include.header')
@section('page_title', 'Home')

@section('content')
    <form method="post" action="{{  route('createUser') }}" class="border">
        @csrf
        <legend class="text-center m-3"> Add User data</legend>
        <div class="form-group row m-3">
            <input type="hidden" name="id" value="{{  $user['id'] ?? count(session('users') ?? []) + 1 }}">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $user['name'] ?? ""}}" placeholder = "Brinda" required>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="email" value="{{ $user['email'] ?? ""}}" placeholder = "example@gmail.com" required>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $user['phone'] ?? ""}}" placeholder = "987654321" required>
            </div>
        </div>
        <div class="form-group m-3">
            <label for="inputPassword" class="col-sm-2 col-form-label mr-3">Role</label>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios1" value="user" {{ (isset($user['role']) && $user['role'] == 'user') ? "checked" : "" }} checked>
                <label class="form-check-label" for="user">
                    User
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios2" value="admin"  {{ (isset($user['role']) && $user['role'] == 'admin') ? "checked" : "" }}>
                <label class="form-check-label" for="admin">
                    Admin
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios3" value="manager"  {{ (isset($user['role']) && $user['role'] == 'manager') ? "checked" : "" }}>
                <label class="form-check-label" for="manager">
                    Manager
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios3" value="support"  {{ (isset($user['role']) && $user['role'] == 'support') ? "checked" : "" }}>
                <label class="form-check-label" for="support">
                    Support
                </label>
            </div>
        </div>
        <div class="form-group m-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusBtn" id="status1" value="active"  {{ (isset($user['status']) && $user['status'] == 'active') ? "checked" : "" }} checked>
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusBtn" id="status2" value="inactive" {{ (isset($user['status']) && $user['status'] == 'inactive') ? "checked" : "" }}>
                <label class="form-check-label" for="inactive">
                    Inactive
                </label>
            </div>
        </div>
        <div class="form-group m-3">
            <label for="name" class="col-sm-2 col-form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="profile[gender]" id="male" value="male" {{ (isset($user['profile']['gender']) && $user['profile']['gender'] == 'male') ? "checked" : "" }} checked>
                <label class="form-check-label" for="active">
                    Male
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="profile[gender]" id="female" value="female" {{ (isset($user['profile']['gender']) && $user['profile']['gender'] == 'female') ? "checked" : "" }} >
                <label class="form-check-label" for="inactive">
                    Female
                </label>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="profile[dob]" id="profile[dob]" value="{{ $user['profile']['dob'] ?? ""}}">
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="address[city]">
                    <option value="">Select city</option>
                    <option value="rajkot" {{ (isset($user['address']['city'] ) && $user['address']['city'] == 'rajkot') ? "selected" : "" }} >Rajkot</option>
                    <option value="ahmedabad" {{ (isset($user['address']['city'] ) && $user['address']['city'] == 'ahmedabad') ? "selected" : "" }} >Ahmedabad</option>
                    <option value="surat" {{ (isset($user['address']['city'] ) && $user['address']['city'] == 'surat') ? "selected" : "" }} >Surat</option>
                    <option value="vadodara" {{ (isset($user['address']['city'] ) && $user['address']['city'] == 'vadodara') ? "selected" : "" }} >Vadodara</option>
                </select>            
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address[state]" id="profile[dob]" value="{{ $user['address']['state'] ?? "Gujarat" }}" >
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address[country]" id="address[country]" value="{{ $user['address']['country'] ?? "India"}}" >
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Pincode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address[pincode]" id="address[pincode]" value="{{ $user['address']['pincode'] ?? ""}}" placeholder="360001">
            </div>
        </div>
        <div class="form-group m-3">
            <label for="inputPassword" class="col-sm-2 col-form-label mr-3">Permissions</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission[view]" id="inlineCheckbox1" value="view" {{ (isset($user['permissions']['view'] ) && $user['permissions']['view'] == 'view') ? "checked" : "" }}>
                <label class="form-check-label" for="inlineCheckbox1">View</label>
            </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission[read]" id="inlineCheckbox2" value="read" {{ (isset($user['permissions']['read'] ) && $user['permissions']['read'] == 'read') ? "checked" : "" }}>
                <label class="form-check-label" for="inlineCheckbox2">Read</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission[write]" id="inlineCheckbox3" value="write" {{ (isset($user['permissions']['write'] ) && $user['permissions']['write'] == 'write') ? "checked" : "" }}>
                <label class="form-check-label" for="inlineCheckbox3">Write</label>
            </div>
        </div>
        <div class="form-group m-3 text-center">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
@endsection