@extends('Admin.layouts.app')



@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh sách Đơn hàng</h1>
        </div>

        <div class="dropdown-divider"></div>
        <br />

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="table-result">
            <div class="card-body" id="content-table">
                <form action="" class="input-group form-group" id="formSearch">
                    <input type="search" name="searchValue" class="form-control"
                        placeholder="Tìm kiếm theo tên Khách hàng hoặc SĐT đặt hàng" value="{{ $searchValue }}"
                        autofocus />
                    <button type="submit" class="btn btn-primary rounded-0">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </button>
                </form>
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info">Có {{ $list->lastPage() }} trang trên tổng số {{ $list->total() }} đơn hàng
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Khách hàng</th>
                                <th>Ngày đặt mua</th>
                                <th>Địa chỉ giao</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $order)
                                <tr>
                                    <td>{{ $order->khachhang->hoten }}</td>
                                    <td>{{ $order->ngaymua }}</td>
                                    <td>{{ $order->diachi }}</td>
                                    <td>{{ $order->sodienthoai }}</td>
                                    <td>{{ $order->damua == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</td>
                                    <td>
                                        @if ($order->damua == 0)
                                            <form action="{{ route('order.confirmPay', $order->mahoadon) }}" method="post"
                                                class="flex">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm w-100 confirmPay">
                                                    <i class="fas fa-check"></i>
                                                    Xác nhận chuyển tiền
                                                </button>
                                            </form>
                                            <br>
                                        @endif
                                        <div class="flex">
                                            <a href="{{ route('order.detail', $order->mahoadon) }}" class="btn btn-warning btn-sm w-100">
                                                <i class="fas fa-eye"></i>
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @include('Admin.layouts.paging')

            </div>
        </div>

    </div>

@endsection
