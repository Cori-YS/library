<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finalizar - E Library</title>
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
                <a href="" class="text-decoration-none d-block d-lg-none">
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Finalizar Compra</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('index')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Finallizar</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Endereço</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> Primeiro Nome</label>
                            <input class="form-control" type="text" disabled placeholder="John" value="{{$user->first_name}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ultimo Nome</label>
                            <input class="form-control" type="text" disabled placeholder="Doe" value="{{$user->last_name}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" disabled placeholder="example@email.com" value="{{$user->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Telemovel</label>
                            <input class="form-control" type="text" disabled placeholder="+123 456 789" value="{{$user_info->phone_number}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Endereço</label>
                            <input class="form-control" type="text" disabled placeholder="123 Rua" value="{{$user_info->address}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Compra Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Produtos</h5>
                        @foreach ($cart as $item)
                        <div class="d-flex justify-content-between">
                            <p>{{$item->book->title}}</p>
                            <p>{{$item->price}} AOA</p>
                        </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{$subtotal}} AOA</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Entrega</h6>
                            <h6 class="font-weight-medium">0.00 AOA</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{$subtotal}} AOA</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Pagamento</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Multicaixa Express</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Kwik</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Transferência Bancaria</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <a href="{{route('checkout.over')}}" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Efetuar Compra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>