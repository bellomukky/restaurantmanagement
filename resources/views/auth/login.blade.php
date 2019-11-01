@extends('layouts.app')
@section('styles')
<style>
  body {
            background-color: #eeeeee;
        }
</style>
@endsection
@section('main-content')
<div class="main-container" style="margin-top:6.5rem;">
        <div class="container">
           <div class="row align-items-center" style="height:100vh;" >
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-bdoy" style="padding:20px 15px;">
                            <div class="card-title">
                            <h5 style="font-size:18px;">LOGIN</h5>
                            </div>
                            <hr>
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" value="{{old('email')}}" name="email"
                                     class="form-control">
                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                     <p class="text-danger">{{$errors->first('password')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="remember"><input type="checkbox" name="remeber" id="remember" > 
                                        Remember Me</label>
                                        <span class="float-right">Forgotten Password?</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-gradient btn-block">
                                        LOGIN</button>
                                </div>
                            </form>
                            <h5 class="text-muted text-center" style="font-size:16px;">Or continue with</h5>
                            <button type="submit" class="btn btn-info btn-primary btn-block icon-color fb" >
                                <span class="fa fa-facebook"></span> Facebook</button>
                               
                                <button type="submit" class="btn btn-info btn-danger btn-block icon-color pin mt-3">
                                <span class="fa fa-google"></span> Google</button>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
@endsection
