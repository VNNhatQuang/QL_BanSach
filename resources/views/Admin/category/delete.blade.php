@extends('Admin.layouts.app')



@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Sửa loại sách</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" id="table-result">
            <div class="card-body" id="content-table">
                <div class="table-responsive">
                    <form action="{{ route('category.destroy', $category) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="form-group">
                            <label class="control-label col-sm-2">Mã loại:</label>
                            <div class="col-sm-12">
                                <p class="text-dark">{{ $category->maloai }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Tên loại:</label>
                            <div class="col-sm-12">
                                <p class="text-dark">{{ $category->tenloai }}</p>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" align="end">
                            <div class="col-sm-offset-2">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>&nbsp;
                                    Xóa
                                </button>
                                <a href="{{ route('category.index') }}" class="btn btn-warning">
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
