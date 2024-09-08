<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============--> 
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/landing.css">

    <title>Responsive Web IHC</title>
</head>
<style>
.language-dropdown .tooltip {
  position: absolute;
  display: none;
  color: #fff;
  padding: 5px;
  border-radius: 4px;
  font-size: 14px;
  top: 50px;
}

.language-dropdown:hover .tooltip {
  display: block;
}

.language-dropdown .tooltip a {
  display: block;
  margin-bottom: 5px;
}


</style>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="./logo.png" alt="" class="nav__logo-img"> 
                Donaciones
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link lang" data-i18n="nav_home" >Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#celebrate" class="nav__link lang" data-i18n="nav_celebrate">Celebracion</a>
                    </li>
                    <li class="nav__item">
                        <a href="#message" class="nav__link" data-i18n="nav_message">Mensaje</a>
                    </li>
                    
                    <li class="language-dropdown">
                        <a class="nav__link" style="cursor: pointer;">Idioma</a>
                        <div class="tooltip" onmouseover="showTooltip()" onmouseout="hideTooltip()">
                          <a onclick="changeLanguage('es')" class="nav__link" style="cursor: pointer;">Español</a>
                          <a onclick="changeLanguageINGLES('en')" class="nav__link" style="cursor: pointer; margin-left: 10px;">Inglés</a>
                        </div>
                      </li>
                      <li class="nav__item">
                        <a href="login.php" class="nav__link" >Ingreso</a>
                    </li>
                      
                    
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>

                <img src="assets/img/nav-light.png" alt="" class="nav__img">
            </div>
            <div class="nav__btns">
                <!-- Theme change button -->
                <i class='bx bx-moon change-theme' id="theme-button"></i>

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </div>

        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <img src="assets/img/home.png" alt="" class="home__img">

                <div class="home__data">
                    <h1 class="home__title" data-i18n="home_title">Comparte tu amor, <br> dona ahora!</h1>
                    <p class="home__description" data-i18n="home_description">
                        Tu donación puede marcar la diferencia entre la esperanza y la desesperación para aquellos que más lo necesitan. ¡Dona y cambia vidas!
                    </p>
                    <a href="#" class="button" data-i18n="start_donating">Empezar a Donar</a>
                </div>
            </div>
        </section>

        <!--==================== GIVING ====================-->
        <section class="giving section container">
            <h2 class="section__title" data-i18n="giving_title">
                Empieza ayudar con <br> Donaciones
            </h2>

            <div class="giving__container grid">
                <div class="giving__content">
                    <img src="assets/img/giving1.png" alt="" class="giving__img">
                    <h3 class="giving__title" data-i18n="giving_subtitle1">Sorprende</h3>
                    <p class="giving__description" data-i18n="giving_description1">Sorprende a otros, transforma su día.</p>
                </div>

                <div class="giving__content">
                    <img src="assets/img/giving2.png" alt="" class="giving__img">
                    <h3 class="giving__title" data-i18n="giving_subtitle2">Inspira</h3>
                    <p class="giving__description" data-i18n="giving_description2">Inspira cambios positivos, transforma realidades.</p>
                </div>

                <div class="giving__content">
                    <img src="assets/img/giving3.png" alt="" class="giving__img">
                    <h3 class="giving__title" data-i18n="giving_subtitle3">Mucho amor</h3>
                    <p class="giving__description" data-i18n="giving_description3">Mucho amor, la fuerza que une.</p>
                </div>
            </div>
        </section>

        <!--==================== CELEBRATE ====================-->
        <section class="celebrate section container" id="celebrate">
            <div class="celebrate__container grid">
                <div class="celebrate__data">
                    <h2 class="section__title celebrate__title" data-i18n="celebrate_title">
                        Donando <br> Celebran Todos
                    </h2>
                    <p class="celebrate__description" data-i18n="celebrate_description">
                        En la magia de las donaciones, celebra con mucho amor cada acto generoso que transforma vidas y dibuja sonrisas en corazones necesitados.
                    </p>
                    <a href="#" class="button" data-i18n="send_wishes">Enviar Buenos Deseos</a>
                </div>

                <img src="assets/img/celebrate.png" alt="" class="celebrate__img">
            </div>
        </section>




        <!--==================== MESSAGE ====================-->
        <section class="message section container" id="message">
            <div class="message__container grid">
                <form action="" class="message__form">
                    <h2 class="message__title" data-i18n="message_title">Envianos Mensajes o <br> Recomendaciones!</h2>
                    <input type="email" placeholder="Escribir un mensaje" class="message__input" data-i18n="message_input_placeholder" >
                    <button class="button message__button" data-i18n="send_message">Enviar Mensaje</button>
                </form>

                <img src="assets/img/message.png" alt="" class="message__img">
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div>
                <a href="#" class="footer__logo">
                    <img src="assets/img/logo.png" alt="" class="footer__logo-img" data-i18n="footer_logo"> 
                    Donaciones
                </a>

                <p class="footer__description" data-i18n="footer_description">
                    Dona y <br> cambia vidas
                </p>
            </div>

            <div>
                <h3 class="footer__title" data-i18n="footer_ranking">Ranking</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link" data-i18n="footer_top_donor">Top Donador</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link" data-i18n="footer_monthly_donor">Donador del Mes</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="footer__title" data-i18n="footer_help">Ayuda</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link" data-i18n="footer_support">Atencion</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link" data-i18n="footer_report_issue">Reportar Problema</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link" data-i18n="footer_contact_us">Contactanos</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="footer__title" data-i18n="footer_available_in">Disponible en</h3>

                <div class="footer__aviables">
                    <img src="assets/img/aviable1.png" alt="" class="footer__aviable-img">
                    <img src="assets/img/aviable2.png" alt="" class="footer__aviable-img">
                </div>
            </div>
        </div>

        <span class="footer__copy" data-i18n="footer_copy">&#169; Donaciones. All rights reserved</span>
    </footer>
   




    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>
    <script>
    function showTooltip(language) {
  var tooltip = document.getElementById('tooltip');
  tooltip.textContent = language;
  tooltip.style.display = 'block';
}

function hideTooltip() {
  var tooltip = document.getElementById('tooltip');
  tooltip.style.display = 'none';
}

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/i18next/23.2.6/i18next.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== jQuery ===============-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/main.js"></script>

</html>
