@extends('Admin.layouts.app')



@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Quản lý Sách</h1>
            </div>
            <div class="col" align="end">
                <a href="{{ route('book.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Thêm mới sách</span>
                </a>
            </div>
        </div>
        <br>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="table-result">
            <div class="card-body" id="content-table">
                <form action="" class="input-group form-group" id="formSearch">
                    <input type="search" name="searchValue" class="form-control" placeholder="Nhập thông tin tìm kiếm" value="{{ $searchValue }}" autofocus/>
                    <button type="submit" class="btn btn-primary rounded-0">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </button>
                </form>
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info">Có {{ $list->lastPage() }} trang trên tổng số {{ $list->total() }} loại sách</div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã sách</th>
                                <th>Tên sách</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Loại sách</th>
                                <th>số tập</th>
                                <th>Ngày nhập</th>
                                <th>Tác giả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $book)
                                <tr>
                                    <td>{{ $book->masach }}</td>
                                    <td>{{ $book->tensach }}</td>
                                    <td>{{ $book->soluong }}</td>
                                    <td>@convert($book->gia)VND</td>
                                    <td>{{ $book->tenloai }}</td>
                                    <td>{{ $book->sotap }}</td>
                                    <td>{{ $book->ngaynhap }}</td>
                                    <td>{{ $book->tacgia }}</td>
                                    <td width="100">
                                        <div class="flex">
                                            <a href="{{ route('book.edit', $book->masach) }}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('book.show', $book->masach) }}"
                                                class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
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
