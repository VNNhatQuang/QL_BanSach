@extends('Sell.layouts.app')


@section('content')
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
                        @if (session('status'))
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
                <a href="{{ route('admin.auth.showLogin') }}">Trang Admin</a>
            </td>
        </tr>

    </table>
@endsection
