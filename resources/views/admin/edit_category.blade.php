<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="div_center">
                        <h1 class="label_des">Ažuriraj Žanr</h1>

                        <form action="{{ url('/update_category', $data->id) }}" method="POST">
                            @csrf

                            <label>Naziv</label>
                            <input type="text" name="cat_name" id="" value="{{ $data->cat_title }}">
                            <input type="submit" value="Update" class="btn btn-outline-danger">
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
