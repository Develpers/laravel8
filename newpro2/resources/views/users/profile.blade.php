@extends('layouts.app')

@section('content')



<div class="container" style="padding-top: 3%">

    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}}
      </div>
    @endforeach

    @endif


<form method="POST" action="{{route('profile.update')}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1"> Name </label>
      <input type="text" name="name" class="form-control"  value="{{$user->name}}">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"> facebook </label>
          <input type="text" name="facebook" class="form-control"  value="{{$user->profile->facebook}}">   
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1"> Gender </label>
          <select class="form-control" name="gender" value="{{$user->profile->gender}}">

              <option value="Male"> Male</option>
              <option value="Femal"> Femal</option> 
              
          </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> province </label>
             <input type="text" name="province" class="form-control" value="{{$user->profile->province}}" ></div>


        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio  </label>
          <textarea class="form-control" name="bio" rows="3">
            {!! $user->profile->bio !!}
          </textarea>
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1"> password </label>
          <input type="password" name="password" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1"> confirm password </label>
          <input type="password" name="c_passowrd" class="form-control"  >
          </div>

        <div class="form-group">
         <button class="btn btn-success" type="submit"> update</button>
 </div>

    </form>
</div>







@endsection
