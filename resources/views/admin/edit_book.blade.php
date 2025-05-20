<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        label {
            display: inline-block;
            text-align: left;
            width: 200px;
        }

        .div_center>form>div {
            padding: 10px;
        }

        .div_book {
            width: 100%;
            text-align: center;
        }

        .div_book img {
            display: inline-block;
            max-width: 100%;
            height: auto;
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
                    <div class="div_center">
                        <h1 class="label_des">Ažuriraj Knjigu</h1>

                        <form action="{{ url('/update_book', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label>Naziv</label>
                                <input type="text" name="book_name" value="{{ $data->title }}">
                            </div>

                            <div>
                                <label>Ime autora</label>
                                <input type="text" name="author_name" value="{{ $data->author_name }}">
                            </div>

                            <div>
                                <label>Broj knjiga</label>
                                <input type="number" name="quantity" value="{{ $data->quantity }}">
                            </div>

                            <div>
                                <label>Žanr</label>
                                <select name="category">

                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $data->category_id ? 'selected' : '' }}>
                                            {{ $item->cat_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="div_book">
                                <img src="/book/{{ $data->book_img }}" alt="Book Image">
                            </div>

                            <div>
                                <label>Slika</label>
                                <input type="file" name="book_img">
                            </div>

                            <input class="btn btn-outline-primary" type="submit" value="Ažuriraj">
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
