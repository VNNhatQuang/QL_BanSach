<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bán sách online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>


    @include('Sell.layouts.header')



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
                    <input class="form-control" name="searchValue" type="text" value=""
                        placeholder="Tìm kiếm sách" autofocus><br>
                    <input type="submit" value="Tìm kiếm" class="btn btn-primary form-control">
                </form>
            </td>

        </tr>
    </table>

</body>

</html>
