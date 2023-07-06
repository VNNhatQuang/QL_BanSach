{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{ $list }}
</body>
</html> --}}


@extends('Sell.layouts.app')



@section('content')
    <table align="center">
        <tr>
            <td colspan="3">
                <br>
                <h1>Lịch sử mua hàng</h1>
                <br>
            </td>
        </tr>

        <tr>
            <td width="1000" valign="top">
                <table class="table table-hover">
                    <tr>
                        <td><b>STT</b></td>
                        <td><b>Mã hóa đơn</b></td>
                        <td><b>Tên sách</b></td>
                        <td><b>Số lượng mua</b></td>
                        <td><b>Giá bán</b></td>
                        <td><b>Ngày mua</b></td>
                    </tr>
                    @if ($list != null)
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($list as $bill)
                            @foreach ($bill->chitiethoadon as $billDetail)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{ $bill->mahoadon }}</td>
                                    <td><img src="{{ asset('storage/' . $billDetail->sach->anh) }}" width="100">{{ $billDetail->sach->tensach }}</td>
                                    <td>{{ $billDetail->soluongmua }}</td>
                                    <td>{{ $billDetail->sach->gia }}/cuốn</td>
                                    <td>{{ $bill->ngaymua }}</td>
                                </tr>
                                @php
                                    $index++;
                                @endphp
                            @endforeach
                        @endforeach
                    @else
                        <b>Lịch sử mua hàng trống!</b>
                    @endif
                </table>

            </td>

        </tr>
    </table>

@endsection
