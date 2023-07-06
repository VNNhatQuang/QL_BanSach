@extends('Sell.layouts.app')



@section('content')
    <table align="center">
        <tr>
            <td colspan="3">
                <br>
                <h1>Trang chủ</h1>
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

            <td width="700" valign="top">
                <table class="table table-hover">
                    @for ($i = 0; $i < count($books); $i++)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $books[$i]->anh) }}"><br>
                                {{ $books[$i]->tensach }}<br>
                                {{ $books[$i]->gia }}<br>
                                <a class="btn btn-success"
                                    href="{{ route('home.addToCart') }}?anh={{ $books[$i]->anh }}&masach={{ $books[$i]->masach }}&tensach={{ $books[$i]->tensach }}&gia={{ $books[$i]->gia }}">Thêm
                                    vào giỏ</a>
                            </td>
                            @php
                                $i++;
                            @endphp
                            @if ($i < count($books))
                                <td>
                                    <img src="{{ asset('storage/' . $books[$i]->anh) }}"><br>
                                    {{ $books[$i]->tensach }}<br>
                                    {{ $books[$i]->gia }}<br>
                                    <a class="btn btn-success"
                                        href="{{ route('home.addToCart') }}?anh={{ $books[$i]->anh }}&masach={{ $books[$i]->masach }}&tensach={{ $books[$i]->tensach }}&gia={{ $books[$i]->gia }}">Thêm
                                        vào giỏ</a>
                                </td>
                            @endif
                        </tr>
                    @endfor
                </table>
            </td>

            <td width="400" valign="top" class="form-control">
                <form action="" method="get">
                    <input class="form-control" name="searchValue" type="text" value="" placeholder="Tìm kiếm sách"
                        autofocus><br>
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary form-control">
                </form>
            </td>

        </tr>
    </table>
@endsection
