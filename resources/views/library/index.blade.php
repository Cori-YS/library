<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>E Library</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                <a href="" class="text-decoration-none">
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
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Areas Cientificas</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 287px">
                        @foreach ($scientific_areas as $area)
                            <a href="{{route('shop')}}" class="nav-item nav-link">{{$area->name}}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Library</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="" class="nav-item nav-link active">Home</a>
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
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">-10% Na sua primeira compra</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Conhecimento e Cultura</h3>
                                    <a href="{{route('checkout')}}" class="btn btn-light py-2 px-3">Comprar Agora</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">-10% Na sua primeira compra</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Preços Razoaveis</h3>
                                    <a href="{{route('checkout')}}" class="btn btn-light py-2 px-3">Comprar Agora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Livros de Qualidade</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Entrega Gratuita</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Retorno de 14 Dias</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Suporte 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="{{route('shop')}}" class="cat-img position-relative overflow-hidden mb-3" style="text-align: center">
                        <i class="fa fa-plus" aria-hidden="true" style="font-size: 190pt;"></i>
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Matemática</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="{{route('shop')}}" class="cat-img position-relative overflow-hidden mb-3" style="text-align: center">
                        <i class="fa fa-balance-scale" aria-hidden="true" style="font-size: 190pt;"></i>
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Direito</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="{{route('shop')}}" class="cat-img position-relative overflow-hidden mb-3" style="text-align: center">
                        <i class="fa fa-user-md" aria-hidden="true" style="font-size: 190pt;"></i>
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Medicina</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Fique Actualizado</span></h2>
                    <p>O conhecimento na palma das tuas mãos.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Livros Novos</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($books as $book)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{$book->cover}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$book->title}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{$book->price}} AOA</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('detail', $book)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Ver Detalhes</a>
                            <a href="{{route('cart.add', $book)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Adicionar ao Carrinho</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
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
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Home</a>
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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>