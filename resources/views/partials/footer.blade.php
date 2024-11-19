<link rel="stylesheet" href="{{ asset('asset_css/partials/footer.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<footer>
    <div class="foot">
        <div class="container-foot">
            <div class="nav-foot">
                <li><a class="" href="{{ route('home') }}">Inicio</a></li>
                <li><a class="" href="{{ route('about') }}">Sobre nosotros</a></li>
                <li><a class="" href="{{ route('cita_medica') }}">Cita médica</a></li>
                <li><a class="" href="{{ route('donation') }}">Donación</a></li>
            </div>
        </div>

        <div class="container-foot">
            <div class="item-foot">
                <a href="https://www.facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://www.whatsapp.com" target="_blank"><i class="bi bi-whatsapp"></i></a>
                <a href="https://www.youtube.com" target="_blank"><i class="bi bi-youtube"></i></a>
            </div>

            <hr class="divider">

            <div class="item-foot">
                <p href="/politica-privacidad" target="_blank">Política de Privacidad</p>
                <p href="/terminos-condiciones" target="_blank">Términos y Condiciones</p>
                <p>Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</footer>
