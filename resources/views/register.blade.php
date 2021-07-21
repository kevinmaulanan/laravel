<html>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <head></head>
    <body>
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="box-register ">
                <form action="{{url('auth/register')}}" method="POST">
                    @csrf
                    <div class="header-register">
                        <h2>Register</h2>
                        @if(session('message-error'))
                        <div class="alert alert-danger mb-0" style="text-align: center">
                            {{session('message-error')}}
                        </div>
                        @endif
                    </div>

                        <div class="container-form">
                            {{-- Form Email --}}
                            <div class="form-group" style="margin-bottom:25px;">
                                <input type="text" class="form-control form-input-text @error('email') is-invalid @enderror" placeholder="Email" name="email">

                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- EndForm Password --}}

                            {{-- Form Password --}}
                            <div class="form-group" style="margin-bottom:25px;">
                                <input type="password" class="form-control form-input-text @error('password') is-invalid @enderror" name="password" placeholder="Password">

                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- End Form Password --}}

                             {{-- Form Name --}}
                             <div class="form-group">
                                <input style="height: 50px; margin-bottom:25px; border: 1px solid" type="text" class="form-control" name="name" @error('name') is-invalid @enderror" placeholder="Name">

                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- End Form Name --}}
                            
                            {{-- Form Name --}}
                            <div class="form-group">
                                <label>Masukkan Foto</label> <br>
                                <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg">
                                @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- End Form Name --}}
                            <button type="submit" class="btn btn-primary w-100" style="height: 50px; margin-bottom:15px;">Register</button>
                            <p>You have a member? <a href="{{url('auth/login')}}">Login Now!</a></p>
                        </div>

                </form>
            </div>
        </div>
    </body>
</html>


<style>
    .box-register {
        width: 500px;
        min-height: 400px;
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 10px 8px #888888;
    }
    .container-form {
        padding: 0 20px;
    }
    .header-register {
        text-align: center;
        padding: 30px 10px
    }
    .form-input-text {
        height: 50px; 
        border: 1px solid
    }
</style>