<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        th {
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            background-color: #dc3545;
            margin: 20px;
            color: white;
        }

        tr {
            padding: 10px;
            border: 1px solid white;
        }

        td>form>button {
            margin: 5px;
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
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-secondary">
                                    {{ session()->get('message') }}

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                </div>
                            @endif
                        </div>

                        <h1 class="label_des">Knjige</h1>

                        <div>
                            <table class="center">
                                <tr>
                                    <th>Naziv</th>
                                    <th>Ime autora</th>
                                    <th>Broj knjiga</th>
                                    <th>Žanr</th>
                                    <th>Slika</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->author_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->category->cat_title }}</td>
                                        <td>
                                            <img class="img_book" src="book/{{ $item->book_img }}" alt="Book Image">
                                        </td>
                                        <td class="book_btn">
                                            <a href="{{ url('/edit_book', $item->id) }}"
                                                class="btn btn-primary">Ažuriraj</a>
                                        </td>
                                        <td>
                                            <form id="deleteForm{{ $item->id }}"
                                                action="{{ url('delete_book', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf

                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="deleteConfirmation('{{ $item->id }}')"
                                                    class="btn btn-primary">Izbriši</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
        @include('admin.confirmation')
    </div>
    </div>
</body>

</html>
