<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin/icheck-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/adminlte.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0)"><b>Admin</b> Login</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin_login') }}" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('assets/js/admin/jquery.js') }}"></script>
<script src="https://kit.fontawesome.com/ef4075029c.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/js/admin/bootstrap.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/admin/adminlte.js') }}"></script>

</body>
</html>
