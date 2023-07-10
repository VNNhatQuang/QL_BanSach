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
                    <form action="{{ route('category.update', $category) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="control-label col-sm-2">Tên loại:</label>
                            <div class="col-sm-12">
                                <input type="text" name="tenloai" class="form-control" value="{{ $category->tenloai }}">
                            </div>
                        </div>
                        @error('tenloai')
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <span style="color: red">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                        @if(session('success'))
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <span style="color: green">{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif
                        <br>
                        <div class="form-group" align="end">
                            <div class="col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk"></i>&nbsp;
                                    Cập nhật
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
