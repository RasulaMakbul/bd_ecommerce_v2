<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('welcome')}}">BD Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('Categories')}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="#" class="btn btn-dark m-2"><i class="fa-solid fa-location-dot"></i></a>
                <a href="#" class="btn btn-dark m-2"><i class="fa-solid fa-heart"></i></a>
                <a href="#" class="btn btn-dark m-2"><i class="fa-solid fa-user"></i></a>
                <a href="#" class="btn btn-dark m-2"><i class="fa-solid fa-cart-shopping"></i></a>
            </form>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>



<!-- #@foreach($categories as $item)
                                <li><a class="dropdown-item" href="{{#route('collections.category',$item->id)}}">{{#$item->name}}</a></li>
                                #@endforeach -->