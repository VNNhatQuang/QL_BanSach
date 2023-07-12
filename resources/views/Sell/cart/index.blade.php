@extends('Sell.layouts.app')



@section('content')
    <table align="center">
        <tr>
            <td colspan="3">
                <br>
                <h1>Giỏ hàng</h1>
                <br>
            </td>
        </tr>

        <tr>
            <td width="250" valign="top">
                <table class="table table-hover">
                    <tr>
                        <td>
                            <a href="{{ route('home.index') }}">Tất cả</a>
                        </td>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <a href="{{ route('home.index', $category->maloai) }}">{{ $category->tenloai }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>

            <td width="50"></td>

            <td width="800" valign="top">
                @php
                    $carts = session('carts');
                @endphp
                @if(session('success'))
                    <span style="color: green">{{ session('success') }}</span><br><br>
                @endif
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
                            <form action="{{ route('cart.handle') }}" method="get">

                                <tr>
                                    <td> <img alt="" src="{{ asset('storage/' . $product->anh) }}" width="100">
                                    </td>
                                    <td> {{ $product->tensach }} </td>
                                    <td>
                                        <input type="hidden" value="{{ $product->masach }}" name="masach">
                                        <input type="number" value="{{ $product->soluong }}" name="soluong"
                                            style="width: 50px" min="1">
                                        <input type="submit" name="update" value="Cập nhật">
                                    </td>
                                    <td> {{ $product->gia }} </td>
                                    <td> {{ $product->soluong * $product->gia }} </td>
                                    <td> <a
                                            href="{{ route('cart.handle') }}?delete=delete&masach={{ $product->masach }}">Xóa</a>
                                    </td>
                                    @php
                                        $total += $product->soluong * $product->gia;
                                    @endphp
                                </tr>
                            </form>
                        @endforeach

                    </table>

                    <hr>
                    <b class="float-right">TỔNG TIỀN <i>@convert($total)</i> VND</b>
                    <br>
                    <br>

                    <a href="/handelCart?deleteAll=true" class="btn btn-danger">Xóa toàn bộ giỏ hàng</a>
                    {{-- <a href="{{ route('pay.index') }}" class="btn btn-primary float-right">Thanh toán</a> --}}
                    <hr>
                    <br>
                    <br>
                    <h3 align="center">Mua hàng</h3>
                    <br>
                    <form action="{{ route('pay.store') }}" method="post" class="form-control">
                        @csrf
                        <input type="hidden" name="cod" value="true">
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
                        <button type="submit" class="btn btn-success">Đặt hàng (thanh toán COD)</button>
                        <a href="{{ route('pay.index') }}" class="btn btn-primary float-right">Chuyển qua thanh toán ngay</a>
                    </form>
                @else
                    <b>Giỏ hàng trống! Xin mời <a href="{{ route('home.index') }}">Mua hàng</a></b>
                @endif

            </td>

        </tr>
    </table>
@endsection
