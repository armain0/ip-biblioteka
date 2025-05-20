<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="title">
            <h1 class="h5" style="text-transform: capitalize;">Ime: {{ $name }}</h1>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Meni</span>
    <ul class="list-unstyled">
        <li><a href="{{ url('home') }}"> <i class="icon-home"></i>Početna </a></li>
        <li><a href="{{ url('category_page') }}"> <i class="icon-grid"></i>Žanr</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Knjige</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('/add_book') }}">Dodaj knjige</a></li>
                <li><a href="{{ url('/show_book') }}">Prikaži knjige</a></li>
            </ul>
        </li>
        <li><a href="{{ url('borrow_request') }}"> <i class="icon-logout"></i>Zahtjevi za posudbe</a></li>
    </ul>

</nav>
<!-- Sidebar Navigation end-->
