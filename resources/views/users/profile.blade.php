@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:5%">
<form method="PUT" action="{{route('profile.update')}}">
    @csrf
     @method('POST')
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}">
      </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Facebook</label>
      <input type="text" class="form-control" name="facebook" value="">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1"> Gender</label>
      <select class="form-control" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>Famel</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Bio</label>
      <textarea class="form-control" name="bio" rows="3">
        {{$user->profile->bio}}
      </textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" name="password" >
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">confirm password</label>
        <input type="password" class="form-control" name="c_password">
      </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
  </form>
</div>
@endsection
