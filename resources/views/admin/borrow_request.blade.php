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

        td {
            padding: 15px;
            font-size: 16px;
        }

        td>form>button {
            margin: 2px;
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
                        <h1 class="label_des">Zahtjevi za posudbe</h1>
                        <div>
                            <table class="center">
                                <tr>
                                    <th>Korisničko ime</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>Naziv knjige</th>
                                    <th>Broj</th>
                                    <th>Status posudbe</th>
                                    <th>Slika knjige</th>
                                    <th>Promijeni status</th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->user->phone }}</td>
                                        <td>{{ $item->book->title }}</td>
                                        <td>{{ $item->book->quantity }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <img class="img_book" src="book/{{ $item->book->book_img }}" alt="Book Image">
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('/change_book_status', $item->id) }}">
                                                @csrf
                                                <button type="submit" name="action" value="approve"
                                                    class="btn btn-outline-danger">Prihvati</button>
                                                <button type="submit" name="action" value="reject"
                                                    class="btn btn-outline-danger">Odbij</button>
                                                <button type="submit" name="action" value="return"
                                                    class="btn btn-outline-danger">Vrati</button>
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
    </div>
    </div>
</body>

</html>
