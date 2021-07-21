<html>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <head></head>
    <body>
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="box-login ">
                <form action="{{url('auth/login')}}" method="POST">
                    @csrf
                    <div class="header-login">
                        <h2>Login</h2>
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
                            <button type="submit" class="btn btn-primary w-100" style="height: 50px; margin-bottom:15px;">Login</button>
                            <p>Not a member? <a href="{{url('auth/register')}}">Sign up now</a></p>
                        </div>

                </form>
            </div>
        </div>
    </body>
</html>


<style>
    .box-login {
        width: 500px;
        min-height: 400px;
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 10px 8px #888888;
    }
    .container-form {
        padding: 0 20px;
    }
    .header-login {
        text-align: center;
        padding: 30px 10px
    }
    .form-input-text {
        height: 50px; 
        border: 1px solid
    }
</style>