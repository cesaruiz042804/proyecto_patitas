<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content='"Agenda fácilmente citas médicas para perros y gatos en nuestra plataforma. Promovemos la concientización sobre el cuidado responsable de los animales y ofrecemos servicios veterinarios de calidad. ¡Cuida a tu mascota con nosotros!"'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - Tu Clínica Veterinaria</title>
    <link rel="shortcut icon" href="{{ asset('img_public/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('asset_css/about.css') }}">

</head>

<body>

    @include('partials.navbar')

    <main>
        <div class="container">
              <div class="content-about-principal">
                <div class="text-principal">
                    <h1>Bienvenidos al Centro de Rehabilitación Animal "Patitas al Rescate"</h1>
                    <hr class="divider">
                    <p>Somos una organización comprometida con el rescate, rehabilitación y cuidado de perros y gatos en
                        situación de peligro. En "Amigos al Rescate", nuestro objetivo principal es dar una segunda
                        oportunidad a aquellos animales que han sufrido abandono, maltrato o que se encuentran en
                        condiciones vulnerables.</p>
                        <button class="btn-register">Registrate con nosotros</button>
                </div>
                <div class="video video-fade">
                    <video preload="none" controls autoplay muted class="fade-in-video">
                        <source src="{{ asset('recursos_sobre_nosotros/fundacion_publicidad.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="content-about">
                <div class="content-vision">
                    <div class="content-text">
                        <h2>Visión</h2>
                        <p>"Construir una comunidad unida por el amor a los animales, ofreciendo servicios veterinarios
                            de
                            excelencia y facilitando la adopción de mascotas abandonadas, creando un mundo más compasivo
                            y
                            responsable. Aspiramos a un mundo donde todos los animales tengan la oportunidad de vivir en
                            hogares amorosos y seguros. Nos esforzamos por transformar la vida de perros y gatos
                            vulnerables a través de una red de apoyo en la comunidad, fomentando la adopción responsable
                            y creando conciencia sobre el respeto y cuidado de nuestros compañeros animales."</p>
                    </div>
                </div>
                <div class="content-mision">
                    <div class="content-text">
                        <h2>Misión</h2>
                        <p>"Rescatar, rehabilitar y encontrar hogares para animales abandonados, ofreciendo servicios
                            veterinarios especializados y promoviendo la adopción responsable, y la mejor opción para
                            compartir la vida con una mascota. A través de programas de adopción, campañas de
                            esterilización, servicios veterinarios, y educación sobre la tenencia responsable, buscamos
                            mejorar su calidad de vida y construir una comunidad comprometida con el bienestar animal."
                        </p>
                    </div>
                </div>
            </div>
            <div class="content-services">
                <div class="content-title-services">
                    <h3>¿Qué Ofrecemos?</h3>
                </div>
                <div class="content-list">
                    <div class="item">
                        <div class="item-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
                                <path
                                    d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z" />
                                <path
                                    d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z" />
                            </svg>
                        </div>
                        <div class="item-text">
                            <h4>Rescate y Rehabilitación</h4>
                            <p>Cada animal que llega a nuestro centro recibe la atención veterinaria y el cuidado
                                especializado que necesita para recuperarse y tener una vida digna.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-activity" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                            </svg>
                        </div>
                        <div class="item-text">
                            <h4>Servicios Veterinarios de Calidad</h4>
                            <p>Contamos con un equipo de veterinarios especializados que se encargan de velar por la
                                salud
                                de nuestros pacientes, brindando desde consultas preventivas hasta atención de
                                emergencia.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
                            </svg>
                        </div>
                        <div class="item-text">
                            <h4>Tienda de Productos</h4>
                            <p>Ofrecemos productos de calidad para el cuidado de tus mascotas, desde alimento hasta
                                accesorios, cuyos ingresos nos ayudan a continuar con nuestra labor.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-book-half" viewBox="0 0 16 16">
                                <path
                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                            </svg>
                        </div>
                        <div class="item-text">
                            <h4>Educación y Concienciación</h4>
                            <p>Realizamos actividades y campañas para educar a la comunidad sobre la importancia de una
                                tenencia responsable, promoviendo una convivencia armoniosa con los animales.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-piggy-bank" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 2.5A2.5 2.5 0 0 0 3 5v.5h-.5A2.5 2.5 0 0 0 0 8v1a2 2 0 0 0 2 2v3a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1h4v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-3c.036 0 .072-.001.108-.004.862-.073 1.682-.27 2.427-.572a1.502 1.502 0 0 0 1.149-1.744 2 2 0 0 0-1.517-1.517A1.5 1.5 0 0 0 13 6h-.975a4.002 4.002 0 0 0-7.074-3.225A2.5 2.5 0 0 0 5.5 2.5z" />
                                <path d="M8 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                            </svg>
                        </div>
                        <div class="item-text">
                            <h4>Albergue Seguro</h4>
                            <p>Nuestro centro proporciona un hogar temporal para animales en recuperación, brindándoles
                                un ambiente seguro y lleno de cuidados hasta que encuentren una familia.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-shield-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 0c-.69 0-1.258.525-1.47 1.124-.01.031-.228.672-.588 1.381a5.94 5.94 0 0 1-1.17 1.663c-.978.987-2.134 1.769-3.622 2.255-.646.2-1.116.761-1.246 1.413-.148.74.092 1.531.62 1.98.982.85 2.556 1.479 5.164 1.479 2.608 0 4.182-.63 5.164-1.479.528-.449.768-1.24.62-1.98-.13-.652-.6-1.213-1.246-1.413-1.488-.486-2.644-1.268-3.622-2.255a5.94 5.94 0 0 1-1.17-1.663C9.257.525 8.69 0 8 0z" />
                            </svg>
                        </div>
                        <div class="item-text">
                            <h4>Apoyo a la Fundación</h4>
                            <p>Ayúdanos a continuar nuestra misión con una donación. Cada contribución es una
                                oportunidad para salvar una vida.</p>
                        </div>
                    </div>
                </div>

                <div class="container-flayers">
                    <div class="flyer-preview">
                        <button class="flyer-thumbnail"
                            onclick="showFlyer('{{ asset('recursos_donation/img_flayers.jpg') }}')">Explora nuestra
                            última novedad</button>
                    </div>

                    <div id="flyerModal" class="modal">
                        <div class="caption"><a href="{{ route('donation') }}"
                                style="color: aliceblue; text-decoration: none;">Puedes apoyarnos dandole click aquí</a>
                        </div>
                        <span class="close" onclick="closeFlyer()">&times;</span>
                        <img class="modal-content" id="flyerImage" alt="Flyer de Patitas al Rescate">
                    </div>
                </div>
            </div>

            @include('extras.teams')

            <div class="about-us-form lazy-background" data-bg="recursos_sobre_nosotros/img_contact_us.jpg">

                <form action="/send-inquiry" method="POST" class="form-about">
                    <div class="form-group">
                        <h4>Contáctanos para saber más sobre nosotros</h4>
                        <input type="text" id="name" name="name" required
                            placeholder="Ingresa tu nombre completo">
                        <input type="email" id="email" name="email" required
                            placeholder="Ingresa tu correo electrónico">
                        <input type="tel" id="phone" name="phone"
                            placeholder="Ingresa tu número de teléfono (opcional)">
                        <select id="inquiry-type" name="inquiry-type" required>
                            <option value="">Selecciona una opción</option>
                            <optgroup label="Preguntas o dudas" class="">
                                <option value="mission">Sobre nuestra misión</option>
                                <option value="mission">Sobre nuestra visión</option>
                                <option value="team">Conocer al equipo</option>
                                <option value="volunteer">Oportunidades de voluntariado</option>
                                <option value="donate">Cómo donar o apoyar</option>
                                <option value="donate">Cómo puedo comprar en la tienda</option>
                                <option value="donate">Cómo registrarse</option>
                                <option value="donate">Cómo agendar citas</option>
                                <option value="other">Otro</option>
                            </optgroup>
                        </select>
                        <textarea id="message" name="message" rows="4" required placeholder="Escribe tu mensaje aquí..."></textarea>
                        <button type="submit">Enviar Consulta</button>
                    </div>
                </form>
            </div>
        </div>
    </main>


    @include('partials.footer')

    <script src="{{ asset('asset_js/about.js') }}"></script>

</body>

</html>
