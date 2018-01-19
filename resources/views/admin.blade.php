@extends('layouts.meta') 
@section('body')
<div class="container" id="adjust">
  <div class="well">
    <form action="/adminlogin" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" class="form-control" id="pwd">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</div>
@endsection