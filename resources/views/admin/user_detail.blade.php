@extends('main/index')

@section('title','Detail User')
    
@section('body')

<div class="mb-5" style="padding-top: 10px; padding-bottom:10px; background-color: #f1f1f1" >
    <div class="container bg-color-white">
      <div style="background-color: white">
        <div class="row" style="padding: 30px 30px; margin-top: -10px" >
            <div class="col-lg-3">
                <img src={{ asset("/storage/image/$user->image_url")}} 
                class="mt-2 mb-2" style="width: 200px; height: 200px">
            </div>
            <div class="col-lg-8">
                <div class="row mt-4">
                    <div class="col-1">Email</div>
                    <div class="col-1">:</div>
                    <div class="col-6">{{ $user->email }} </div>
                </div>
                <div class="row">
                    <div class="col-1">Name</div>
                    <div class="col-1">:</div>
                    <div class="col-6">{{ $user->name }} </div>
                </div>
                <div class="row mb-3">
                    <div class="col-1">Role</div>
                    <div class="col-1">:</div>
                    <div class="col-6">{{ $user->role == "admin_user" ? "Admin" : "Guest" }} </div>
                </div>
                <div>
                    <button class="btn-primary"><a href="{{url("home")}}" class="text-white p-2"> Kembali </a> </button>
                </div>
            </div>

        </div>  
    </div>
</div>

@endsection