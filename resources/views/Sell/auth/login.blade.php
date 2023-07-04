<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập - Cửa hàng sách online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home.index') }}">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"></a><span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.showLogin') }}">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.showRegister') }}">Đăng ký</a>
                </li>
            </ul>
        </div>
    </nav>



    <table height="600" width="800" align="center">
        <tr>
            <td>
                <h1>BÁN SÁCH ONLINE</h1>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="tendn">Tên đăng nhập</label>
                            <input name="tendn" type="text" class="form-control" value="{{ old('tendn') }}">
                        </div>
                        <div class="form-group row">
                            <label for="password">Mật khẩu</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        @if(session('status'))
                            <span style="color: green">{{ session('status') }}</span>
                        @endif
                        @error('error')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                        <hr>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Đăng nhập" class="btn btn-primary">
                    </div>
                </form>
                <a href="dangnhapadminController">Trang Admin</a>
            </td>
        </tr>

    </table>


</body>

</html>
