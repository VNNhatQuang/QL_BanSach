@extends('Admin.layouts.app')



@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1><br>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="table-result">
            <div class="card-body" id="content-table">
                <div class="table-responsive">
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Mã hóa đơn:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $order->mahoadon }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Mã khách hàng:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $order->makh }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Ngày mua:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $order->ngaymua }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Trạng thái:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ ($order->damua == 1) ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Địa chỉ giao hàng:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $order->diachi }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col">Số điện thoại liên lạc:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $order->sodienthoai }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="card shadow mb-4" id="table-result">
                            <div class="card-body" id="content-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã sách</th>
                                                <th>Tên sách</th>
                                                <th>Mã loại</th>
                                                <th>Tác giả</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($order->chitiethoadon as $book)
                                                <tr>
                                                    <td>{{ $book->masach }}</td>
                                                    <td>{{ $book->sach->tensach }}</td>
                                                    <td>{{ $book->sach->maloai }}</td>
                                                    <td>{{ $book->sach->tacgia }}</td>
                                                    <td>{{ $book->soluongmua }}</td>
                                                    <td>{{ $book->sach->gia }} VND</td>
                                                    <td>{{ ($book->soluongmua) * ($book->sach->gia) }} VND</td>
                                                </tr>
                                                @php
                                                    $total += ($book->soluongmua) * ($book->sach->gia);
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <p>Tổng trị giá đơn hàng <b>{{ $total }} VND</b></p>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" align="end">
                            <div class="col-sm-offset-2">
                                <a href="{{ route('order.index') }}" class="btn btn-warning">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;
                                    Quay lại
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
