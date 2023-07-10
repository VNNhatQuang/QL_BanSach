@extends('Admin.layouts.app')



@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Sửa sách</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="table-result">
            <div class="card-body" id="content-table">
                <div class="table-responsive">
                    <form action="{{ route('book.destroy', $book) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <label class="control-label col">Tên sách:</label>
                            <div class="col">
                                <p class="text-dark">{{ $book->tensach }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Số lượng:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $book->soluong }}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Giá bán:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $book->gia }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Loại:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $book->tenloai }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Số tập:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $book->sotap }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Ngày nhập:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $book->ngaynhap }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col">Tác giả:</label>
                                    <div class="col">
                                        <p class="text-dark">{{ $book->tacgia }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="col">
                                        <img width="200" src="{{ asset('storage/' . $book->anh) }}" id="imgPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" align="end">
                            <div class="col-sm-offset-2">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>&nbsp;
                                    Xóa
                                </button>
                                <a href="{{ route('book.index') }}" class="btn btn-warning">
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
