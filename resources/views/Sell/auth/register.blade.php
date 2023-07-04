<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký - Cửa hàng sách online</title>
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
                <h1>Đăng ký tài khoản</h1>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <form action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <div class="form-group">
                                    <label for="hoten">Họ tên</label>
                                    @error('hoten')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    <input name="hoten" type="text" class="form-control" value="{{ old('hoten') }}">
                                </div>
                                <div class="form-group">
                                    <label for="diachi">Địa chỉ</label>
                                    @error('diachi')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    <input name="diachi" type="text" class="form-control" value="{{ old('diachi') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="sodt">Điện thoại</label>
                                    @error('sodt')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    <input name="sodt" type="text" class="form-control" value="{{ old('sodt') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tendn">Tên đăng nhập</label>
                                        @error('tendn')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                        <input name="tendn" type="text" class="form-control" value="{{ old('tendn') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        @error('password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Nhập lại mật khẩu</label>
                                        @error('confirmPassword')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                        <input name="confirmPassword" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="submit" value="Đăng ký" class="btn btn-success form-control">
                            </div>
                        </div>
                    </div>

                </form>
            </td>
        </tr>

    </table>


</body>

</html>
