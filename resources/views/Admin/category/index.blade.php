@extends('Admin.layouts.app')



@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Quản lý Loại sách</h1>
            </div>
            <div class="col" align="end">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Thêm mới loại</span>
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
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $category)
                                <tr>
                                    <td>{{ $category->maloai }}</td>
                                    <td>{{ $category->tenloai }}</td>
                                    <td width="100">
                                        <div class="flex">
                                            <a href="{{ route('category.edit', $category) }}"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('category.show', $category) }}"
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
