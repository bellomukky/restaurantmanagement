@extends('layouts.app')
@section('styles')
<style>
  body {
            background-color: #eeeeee;
        }
</style>
@endsection
@section('main-content')
  <div class="main-container" style="margin-top:6rem;">
        <div class="container">
            <div class="row align-items-center" style="height:100vh;">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-bdoy" style="padding:20px 15px;">
                            <div class="card-title">
                                <h5 style="font-size:18px;">CREATE ACCOUNT</h5>
                            </div>
                            <hr>
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" >
                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" >
                                     <p class="text-danger">{{$errors->first('password')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                     class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""><input type="checkbox" name="" required>
                                        Agree with terms and conditions</label>
                                   
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-gradient btn-block">
                                        REGISTER</button>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
