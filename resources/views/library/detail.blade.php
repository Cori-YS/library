<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Library - Detalhes</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    @vite([
        "resources/css/style.css",
        "resources/scss/style.scss",
        "resources/js/app.js",
        "resources/js/main.js",
        "resources/js/lib/easing/easing.js",
        "resources/js/lib/easing/easing.min.js",
        "resources/js/lib/owlcarousel/owl.carousel.js",
        "resources/js/lib/owlcarousel/owl.carousel.min.js",
    ])
</head>

<body>
    <!-- Topbar Start -->
   <div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route('index')}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Library</h1>
            </a>
        </div>
         <div class="col-lg-6 col-6 text-left">
                <form method="POST" action="{{ route('shop.search') }}">
                    <div class="input-group">
                        <input id="search" type="text" class="form-control" name="search" placeholder="Porcure livros">
                        <div class="input-group-append">
                            @csrf

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="{{route('cart')}}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{$cart_count}}</span>
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Areas Ciêntificas</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 287px">
                    @foreach ($scientific_areas as $area)
                        <a href="{{route('shop')}}" class="nav-item nav-link">{{$area->name}}</a>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{route('index')}}" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Library</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('index')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('shop')}}" class="nav-item nav-link">Loja</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Paginas</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('cart')}}" class="dropdown-item">Carrinho</a>
                                <a href="{{route('checkout')}}" class="dropdown-item">Finalizar Compra</a>
                            </div>
                        </div>
                        <a href="{{route('contact')}}" class="nav-item nav-link">Contacto</a>
                    </div>
                     <div class="navbar-nav ml-auto py-0">
                            <a href="{{route('profile.edit')}}" class="nav-item nav-link">Perfil</a>
                        </div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Terminar Sessão') }}
                            </x-dropdown-link>
                        </form>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Detalhes do Livro</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Detalhes do Livro</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{$book->cover}}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$book->title}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                    </div>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{$book->price}} AOA</h3>
                <p class="mb-4">{{$book->sinopse}}</p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <a href="{{route('cart.add', $book)}}" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Adicionar ao Carrinho</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


     <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="{{route('index')}}" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Library</h1>
                </a>
                <p>Prontos para revolucionar o mercado, prontos para espalhar a educação aos melhores preços.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Minha Rua, Meu Bairro, Angola</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>elibrary@loja.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+244921321321</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Links Rapidos</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{route('index')}}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="{{route('shop')}}"><i class="fa fa-angle-right mr-2"></i>Nossa Loja</a>
                            <a class="text-dark mb-2" href="{{route('cart')}}"><i class="fa fa-angle-right mr-2"></i>Carrinho</a>
                            <a class="text-dark mb-2" href="{{route('checkout')}}"><i class="fa fa-angle-right mr-2"></i>Finalizar Compra</a>
                            <a class="text-dark" href="{{route('contact')}}"><i class="fa fa-angle-right mr-2"></i>Nos Contacte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Footer End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>