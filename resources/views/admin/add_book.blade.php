<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .div_book>form>div {
            padding: 10px;
        }

        .div_book>form>input {
            margin: 15px;
        }

        label {
            display: inline-block;
            text-align: left;
            width: 200px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="div_center div_book">
                        <h1 class="label_des">Dodaj knjigu</h1>

                        <form action="{{ url('/store_book') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label>Naziv</label>
                                <input type="text" name="book_name" required>
                            </div>

                            <div>
                                <label>Ime autora</label>
                                <input type="text" name="author_name" required>
                            </div>

                            <div>
                                <label>Broj knjiga</label>
                                <input type="number" name="quantity" required>
                            </div>

                            <div>
                                <label>Žanr</label>
                                <select name="category">
                                    <option value="" disabled selected>Izaberi žanr</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->cat_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label>Slika</label>
                                <input type="file" name="book_img">
                            </div>

                            <input class="btn btn-outline-primary" type="submit" value="Dodaj">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>
    </div>
</body>

</html>
