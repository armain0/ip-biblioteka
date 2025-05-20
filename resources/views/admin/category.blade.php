<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        th {
            padding: 10px;
            background-color: #dc3545;
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

                        <h1 class="label_des">Dodaj žanr</h1>

                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <span style="padding-right: 15px;">
                                <label style="margin-right: 5px;">Naziv žanra</label>
                                <input type="text" name="category" required>
                            </span>
                            <input class="btn btn-outline-primary" type="submit" value="Dodaj">
                        </form>

                        <div>
                            <table class="center">
                                <tr>
                                    <th>Naziv žanra</th>
                                    <th></th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="text-transform: capitalize;">{{ $item->cat_title }}</td>
                                        <td>
                                            <form id="deleteForm{{ $item->id }}"
                                                action="{{ url('delete_category', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf

                                                <a href="{{ url('/edit_category', $item->id) }}"
                                                    class="btn btn-primary">Ažuriraj</a>

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
