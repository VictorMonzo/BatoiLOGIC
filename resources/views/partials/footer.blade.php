<footer>
    <div class="bg-danger">
        <div class="container">
            <div class="row py-4 d-flex align-items-center">
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0 text-light">
                    <h4 class="mb-0">Síguenos en nuestras redes</h4>
                </div>
                <div class="col-md-6 col-lg-7 text-center text-md-right text-light h3">
                    <a href="https://instagram.com" target="_blank" class="text-light mr-4"><i class="fab fa-instagram"></i></a>
                    <a href="https://es-es.facebook.com/" target="_blank" class="text-light"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4 py-5 text-light" style="padding: 0 20px">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 mt-4">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('/imgs/logo.svg') }}" height="35px" class="d-inline-block align-top" alt="Logo proyecto DIW">
                </a>
                <p class="pt-3">Somos distribuidores oficiales de grandes marcas como Nike, Adidas, Puma, Converse, Champion...</p>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-4">
            <h4 class="mb-3">Productos</h4>
                <ul class="list-unstyled foot-desc">
                    @forelse($categories as $categorie)
                        <li class="mb-2"><a href="{{ route('indexByCategorie', $categorie->id) }}" class="text-danger">{{ $categorie->name }}</a></li>
                    @empty
                        <a class="dropdown-item" href="#">No hay categorías</a>
                        <li class="mb-2"><a href="#">No hay categorías</a></li>
                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-4">
                <h4 class="mb-3">Contacto</h4>
                <ul class="fa-ul foot-desc list-unstyled m-0">
                    <li class="mb-2">
                        <a href="tel: 652 999 276" class="text-light">
                            <span class="pr-2">
                            <i class="fas fa-phone"></i>
                            </span>652 999 276
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="mailto:info@sneak.com" class="text-light">
                            <span class="pr-2">
                            <i class="fas fa-envelope"></i>
                            </span>info@sneak.com
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d797504.8622407085!2d-1.3447217686455446!3d38.6660447899824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sjd%20sports!5e0!3m2!1ses!2ses!4v1611750570116!5m2!1ses!2ses" height="200" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>

    <div class="text-center py-3 text-light">© 2021 Copyright -
        <a href="{{ route('home') }}" class="text-danger"> SNEAK</a>
    </div>
</footer>
