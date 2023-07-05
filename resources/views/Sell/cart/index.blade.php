<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>
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


    @include('Sell.layouts.header')


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
                                    <td> <img alt="" src="{{ asset('storage/' . $product->anh) }}"
                                            width="100"> </td>
                                    <td> {{ $product->tensach }} </td>
                                    <td>
                                        <input type="hidden" value="{{ $product->masach }}" name="masach">
                                        <input type="number" value="{{ $product->soluong }}"
                                            name="soluong" style="width: 50px" min="1">
                                        <input type="submit" name="update" value="Cập nhật">
                                    </td>
                                    <td> {{ $product->gia }} </td>
                                    <td> {{ $product->soluong * $product->gia }} </td>
                                    <td> <a href="{{ route('cart.handle') }}?delete=delete&masach={{ $product->masach }}">Xóa</a> </td>
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

                        <button onclick="window.location.href='/handelCart?deleteAll=true'" class="btn btn-danger">Xóa toàn bộ giỏ hàng</button>

                    @else
                        <b>Giỏ hàng trống! Xin mời <a href="{{ route('home.index') }}">Mua hàng</a></b>
                    @endif

                </td>

        </tr>
    </table>


</body>

</html>
