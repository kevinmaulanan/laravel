@extends('main/index')

@section('title', 'User ')

@section('body')
<html>
    <body>
        <div class="container mt-5 mb-5">
            <h2 class="mb-3">List User</h2>
            <div class="d-flex flex-row ">
                @foreach ($users as $u)
                <div class="d-flex flex-row box-media w-50 mr-3">
                    <div style="width: 25%">
                        <img src="{{asset('/storage/image/'. $u->image_url)}}" class="mr-3 rounded-circle" alt="Image - {{ $u ? $u->name : null }}">
                    </div>
                    <div class="d-inline-block w-75">
                        <div class="row">
                            <div class="col-2">Email</div>
                            <div class="col-1">:</div>
                            <div class="col-6">{{ $u->email }} </div>
                        </div>
                        <div class="row">
                            <div class="col-2">Name</div>
                            <div class="col-1">:</div>
                            <div class="col-6">{{ $u->name }} </div>
                        </div>
                        <div class="row">
                            <div class="col-2">Role</div>
                            <div class="col-1">:</div>
                            <div class="col-6">{{ $u->role == "admin_user" ? "Admin" : "Guest" }} </div>
                        </div>
                        <div>
                            <button class="float-right btn-primary"><a href="{{url("user/$u->id")}}" class="text-white p-2"> Lihat </a> </button>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>  
    </body>
</html>

@endsection

<style>
    .box-media {
        border: 1px solid;
        padding: 20px;
        box-shadow: 5px 10px 8px #888888;
    }
    .box-media div img {
        width: 100px;
        height: 100px;
    }
</style>
