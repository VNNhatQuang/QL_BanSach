@extends('Sell.layouts.app')



@section('content')
    <table align="center">
        <tr>
            <td colspan="3">
                <br>
                <h1>Thanh toán</h1>
                <br>
            </td>
        </tr>

        <tr>
            <td width="1000" valign="top">
                @if (session('success'))
                    <span style="color: green">{{ session('success') }}</span><br><br>
                @endif
                @php
                    $carts = session('carts');
                @endphp
                @if ($carts != null)
                    <table class="table table-hover">
                        <tr>
                            <td></td>
                            <td><b>Tên sách</b></td>
                            <td><b>Số lượng</b></td>
                            <td><b>Giá bán</b></td>
                            <td><b>Thành tiền</b></td>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $product)
                            <tr>
                                <td> <img alt="" src="{{ asset('storage/' . $product->anh) }}" width="100"> </td>
                                <td> {{ $product->tensach }} </td>
                                <td> {{ $product->soluong }} </td>
                                <td> {{ $product->gia }} </td>
                                <td> {{ $product->soluong * $product->gia }} </td>
                                @php
                                    $total += $product->soluong * $product->gia;
                                @endphp
                            </tr>
                        @endforeach

                    </table>

                    <hr>
                    <b class="float-right">TỔNG TIỀN <i>@convert($total)</i> VND</b>
                    <br>
                    <br>

                    <form action="{{ route('pay.store') }}" method="post" class="form-control">
                        @csrf
                        <div class="form-group">
                            <label class="col">Nhập số điện thoại</label>
                            <input type="text" name="sodienthoai" class="form-control col">
                        </div>
                        @error('sodienthoai')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label class="col">Nhập địa chỉ giao hàng</label>
                            <input type="text" name="diachi" class="form-control col">
                        </div>
                        @error('diachi')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                        <div class="form-group" align="end">
                            <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
                        </div>
                    </form>
                @else
                    <b>Giỏ hàng trống! Xin mời <a href="{{ route('home.index') }}">Mua hàng</a></b>
                @endif

            </td>

        </tr>
    </table>
@endsection
