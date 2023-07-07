@extends('Sell.layouts.app')


@section('content')
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
@endsection
