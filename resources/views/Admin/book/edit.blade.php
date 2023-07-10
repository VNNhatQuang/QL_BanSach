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
                    <form action="{{ route('book.update', $book->masach) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="control-label col">Tên sách:</label>
                            <div class="col">
                                <input type="text" name="tensach" class="form-control" value="{{ $book->tensach }}" autofocus>
                            </div>
                        </div>
                        @error('tensach')
                            <div class="form-group">
                                <div class="col">
                                    <span style="color: red">{{ $message }}</span>
                                </div>
                            </div>
                        @enderror

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Số lượng:</label>
                                    <div class="col">
                                        <input type="number" min="1" value="1" name="soluong" class="form-control" value="{{ $book->soluong }}">
                                    </div>
                                </div>
                                @error('soluong')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Giá bán:</label>
                                    <div class="col">
                                        <input type="text" name="gia" class="form-control" value="{{ $book->gia }}">
                                    </div>
                                </div>
                                @error('gia')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Loại:</label>
                                    <div class="col">
                                        <select name="maloai" class="custom-select form-control">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->maloai }}" @if($category->maloai == $book->maloai) {{ 'selected' }} @endif>{{ $category->tenloai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('maloai')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Số tập:</label>
                                    <div class="col">
                                        <input type="number" min="1" value="1" name="sotap" class="form-control" value="{{ $book->sotap }}">
                                    </div>
                                </div>
                                @error('sotap')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col">Ngày nhập:</label>
                                    <div class="col">
                                        <input type="date" name="ngaynhap" class="form-control" value="{{ $book->ngaynhap }}">
                                    </div>
                                </div>
                                @error('ngaynhap')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label class="control-label col">Tác giả:</label>
                                    <div class="col">
                                        <input type="text" name="tacgia" class="form-control" value="{{ $book->tacgia }}">
                                    </div>
                                </div>
                                @error('tacgia')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Ảnh:</label>
                                    <div class="col">
                                        <input type="file" name="anh" class="form-control-file" onchange="previewImage(event)">
                                    </div>
                                </div>
                                @error('anh')
                                    <div class="form-group">
                                        <div class="col">
                                            <span style="color: red">{{ $message }}</span>
                                        </div>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <div class="col">
                                        <img width="200" src="{{ asset('storage/' . $book->anh) }}" id="imgPreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (session('success'))
                            <div class="form-group">
                                <div class="col">
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


    <script>
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var image = document.getElementById('imgPreview');
                    image.src = e.target.result;
                    image.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
