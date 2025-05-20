<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .table_des {
            border: 1px solid white;
            margin: auto;
            text-align: center;
            margin-top: 50px;
        }

        th {
            background-color: #9756f7;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid white;
        }

        .book_img {
            height: 120px;
            width: auto;
        }
    </style>
</head>

<body>
    @include('home.header')

    <div class="currently-market">
        <div class="container">
            @if (session()->has('message'))
                <div style="margin-top: 50px;" class="alert alert-secondary">
                    {{ session()->get('message') }}

                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                </div>
                <br>
            @endif
            <table class="table_des">
                <tr>
                    <th>Naziv</th>
                    <th>Ime autora</th>
                    <th>Status posudbe</th>
                    <th>Slika</th>
                    <th></th>
                </tr>

                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->book->author_name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <img class="book_img" src="/book/{{ $item->book->book_img }}" alt="Book Image">
                        </td>
                        <td>
                            <form method="POST" action="{{ url('/cancel_request', $item->id) }}">
                                @csrf
                                <button type="submit" name="action" value="cancel"
                                    class="btn btn-outline-danger">Otkaži</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('home.footer')
</body>

</html>
