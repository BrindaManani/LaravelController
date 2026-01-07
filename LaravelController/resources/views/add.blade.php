@extends('layout.app')
@extends('include.header')
@section('page_title', 'Home')

@section('content')
    <form method="post" action="{{  route('createUser') }}" class="border">
        @csrf
        <legend class="text-center m-3"> Add User data</legend>
        <div class="form-group row m-3">
            <input type="hidden" name="id" value="{{  count(session('users') ?? []) + 1 }}">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Brinda" required>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" id="email" placeholder="email@example.com" required>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="987654321" required>
            </div>
        </div>
        <div class="form-group m-3">
            <label for="inputPassword" class="col-sm-2 col-form-label mr-3">Role</label>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios1" value="user" checked>
                <label class="form-check-label" for="user">
                    User
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios2" value="admin">
                <label class="form-check-label" for="admin">
                    Admin
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios3" value="manager">
                <label class="form-check-label" for="manager">
                    Manager
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioBtn" id="Radios3" value="support">
                <label class="form-check-label" for="support">
                    Support
                </label>
            </div>
        </div>
        <div class="form-group m-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusBtn" id="status1" value="active" checked>
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="statusBtn" id="status2" value="inactive">
                <label class="form-check-label" for="inactive">
                    Inactive
                </label>
            </div>
        </div>
        <div class="form-group m-3">
            <label for="name" class="col-sm-2 col-form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="profile[gender]" id="male" value="male"
                    checked>
                <label class="form-check-label" for="active">
                    Male
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="profile[gender]" id="female" value="female">
                <label class="form-check-label" for="inactive">
                    Female
                </label>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="profile[dob]" id="profile[dob]">
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control" name="address[city]">
                    <option value="rajkot">Rajkot</option>
                    <option value="ahmedabad">Ahmedabad</option>
                    <option value="surat">Surat</option>
                    <option value="vadodara">Vadodara</option>
                </select>            
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address[state]" id="profile[dob]" value="Gujarat" readonly>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Country</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address[country]" id="address[country]" value="India" readonly>
            </div>
        </div>
        <div class="form-group row m-3">
            <label for="email" class="col-sm-2 col-form-label">Pincode</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="address[pincode]" id="address[pincode]" placeholder="360001">
            </div>
        </div>
        <div class="form-group m-3">
            <label for="inputPassword" class="col-sm-2 col-form-label mr-3">Permissions</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission[view]" id="inlineCheckbox1" value="view">
                <label class="form-check-label" for="inlineCheckbox1">View</label>
            </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission[read]" id="inlineCheckbox2" value="read">
                <label class="form-check-label" for="inlineCheckbox2">Read</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission[write]" id="inlineCheckbox3" value="write">
                <label class="form-check-label" for="inlineCheckbox3">Write</label>
            </div>
        </div>
        <div class="form-group m-3 text-center">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
@endsection