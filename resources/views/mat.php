<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>MAT </title>
    <link rel="icon"
        href="https://storage.googleapis.com/openkitchen_cdn/ok_landing_page/logo/openkitchen_isotipo_xNm_icon.ico"
        type="image/png">

    <link rel="stylesheet"
        href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.css">
    <link rel="stylesheet" href="mat/css/final.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
    <!-- Angular Material style sheet -->
    <script src="https://kit.fontawesome.com/bfd5830640.js" crossorigin="anonymous"></script>
</head>

<body ng-app="mainModule" ng-cloak>
    <!--
    Your HTML content here
  -->

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.js"></script>

    <!-- Your application bootstrap  -->
    <script type="text/javascript">
        /**
         * You must include the dependency on 'ngMaterial' 
         */
        angular.module('mainModule', ['ngMaterial', 'ngMessages']);
    </script>

    <div id="main-container" hide-xs>

        <div layout="row" layout-align="space-between start" id="header">

            <!-- logo -->
            <div layout="row" layout-align="start center">
                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/signo-victoria.svg" alt=""
                    id="v-sign-img">

                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/logo/logomatfblanco.png" alt=""
                    id="mat-logo">
            </div>
            <!-- logo -->

            <!-- actions -->
            <div layout="row" layout-align="end center" id="header-actions">
                <md-button class="md-raised">Regístrate</md-button>
            </div>

        </div>

        <div id="first-section" layout="row" layout-xs="column" layout-align="space-between center">

            <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/mujer-conduciendo.png" alt=""
                class="driving-img">

            <div layout="column" layout-align="center center" id="first-section-text" flex>

                <h1>La ciudad es tuya</h2>

                    <h3>
                        Recorre tu ciudad con libertad, comodidad y seguridad
                    </h3>

                    <h3>
                        MAT conoce las necesidades de los usuarios, pero también de los conductores
                    </h3>

            </div>

        </div>

        <div id="road" hide-xs>
            <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/linea.svg" alt="">
        </div>

        <div layout="row" layout-xs="column" layout-align="start center">

            <div id="second-section" layout="column" layout-align="center center" flex>

                <div layout="column" layout-align="center center">

                    <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/celular.png" alt="">

                    <h1>
                        Descarga el App
                    </h1>

                    <div layout="row" layout-align="start center" id="second-section-actions">
                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/android.png" alt="">
                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/ios.png" alt="">
                    </div>
                </div>

            </div>

            <div id="third-section" flex layout="column" layout-align="end end" layout-align-xs="start start"
                flex-xs="100">
                <div layout="column" layout-align="center center">

                    <h1>
                        ¿Porqué escoger MAT?
                    </h1>

                    <div layout="row" layout-align="start center">
                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/certificate_white.svg"
                            alt="">
                        <h3>
                            Nuestra prioridad es la legalidad
                        </h3>
                    </div>

                    <div layout="row" layout-align="start center">
                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/credit-card.svg"
                            alt="">
                        <h3>Precios claros y justos</h3>
                    </div>

                    <div layout="row" layout-align="start center">

                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/love_community.svg"
                            alt="">

                        <h3>
                            Más que un App, somos una comunidad
                        </h3>

                    </div>

                </div>

            </div>


        </div>

        <div id="forth-section" layout="row" layout-xs="column" layout-align-xs="start center"
            layout-align="space-between start" class="w-full">

            <div layout="column" layout-align-xs="start center" layout-align="end center"
                layout-align-sm="center center">
                <h2>
                    No te conformes, la ciudad es TUYA
                </h2>

                <md-button class="md-raised">Conoce más</md-button>
            </div>

            <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/mujer-victoria.png">
        </div>

        <div class="w-full" id="sixth-section">

            <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/mapa.png" alt="">

        </div>

        <div id="footer" layout="row" layout-align="space-between start">

            <!-- first two sections -->
            <content layout="row" layout-align="space-between start">

                <div layout="column" layout-align="start start">

                    <h2>
                        App
                    </h2>

                    <h4>
                        Conductores
                    </h4>

                    <h4>
                        Negocio
                    </h4>

                    <h4>
                        Ciudades
                    </h4>

                </div>

                <div layout="column" layout-align="start center">

                    <h2>
                        Acerca de MAT
                    </h2>

                </div>

            </content>
            <!-- end  -->

            <!-- third and forth section -->
            <content layout="row" layout-align="space-between start">

                <div layout="column" layout-align="start center">

                    <h2>
                        Quiénes somos
                    </h2>

                </div>


                <div layout="column" layout-align="start center">

                    <h2>
                        Descarga el App
                    </h2>

                    <div layout="column" layout-align="center center" class="w-full">

                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/android.png" alt="">

                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/ios.png" alt="">

                        <div layout="row" layout-align="center center">
                            <i class="fab fa-facebook-square"></i>
                            <i class="fab fa-instagram-square"></i>
                        </div>

                        <h3>
                            gomat.co
                        </h3>

                    </div>

                </div>

            </content>
            <!-- third and forth section -->

        </div>


        <div layout="row" layout-align="center center" id="rights-reserved-section">

            <h5>
                <i class="far fa-registered m-r"></i> Todos los derechos reservados. MAT 2020.
            </h5>
        </div>


    </div>


    <div hide-gt-xs>

        <div layout="row" layout-align="space-between start" id="header">

            <!-- logo -->
            <div layout="row" layout-align="start center">
                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/signo-victoria.svg" alt=""
                    id="v-sign-img">

                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/logo/logomatfblanco.png" alt=""
                    id="mat-logo">
            </div>
            <!-- logo -->

            <!-- actions -->
            <div layout="row" layout-align="end center" id="header-actions">
                <md-button class="md-raised">Regístrate</md-button>
            </div>

        </div>

        <div id="xs-first-section">

            <h1 id="xs-slogan">
                La ciudad es tuya
            </h1>

            <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/mujer-conduciendo.png" alt=""
                class="driving-img">

            <div id="xs-second-section" layout="column" layout-align="center center" flex>

                <div layout="column" layout-align="center center">

                    <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/celular.png" alt="">

                    <h1>
                        Empieza a viajar con MAT
                    </h1>

                    <div layout="row" layout-align="center center" id="second-section-actions">
                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/android.png" alt="">
                        <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/ios.png" alt="">
                    </div>
                </div>

            </div>

        </div>

        <div id="xs-third-section" layout="column" layout-align="start center">

            <h4>
                ¿Porqué escoger MAT?
            </h4>

            <div layout="row" layout-align="start center">

                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/driver.svg" alt="">

                <h3>
                    Diseñamos un app centrado en el conductor
                </h3>

            </div>

            <div layout="row" layout-align="start center">

                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/money.svg" alt="">

                <h3>
                    Tarifas competitivas
                </h3>

            </div>

            <div layout="row" layout-align="start center">

                <img src="https://storage.googleapis.com/openkitchen_cdn/mat/landing_page/verified.svg" alt="">

                <h3>
                    Seguros para conductores y clientes
                </h3>

            </div>

        </div>

        <div id="xs-footer" layout="row" layout-align="space-between start">

            <div layout="column" layout-align="center start">

                <h3>
                    App
                </h3>

                <h3>
                    Acerca de MAT
                </h3>

                <h3>
                    Quiénes somos
                </h3>

            </div>


            <div layout="column" layout-align="center start">

                <h3>
                    gomat.co
                </h3>

                <h3>
                    @gomat.co
                </h3>

                <div layout="row" layout-align="center center" class="w-full">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-instagram-square"></i>
                </div>

            </div>

        </div>

        <div layout="row" layout-align="center center" id="rights-reserved-section">

            <h5>
                <i class="far fa-registered m-r"></i> Todos los derechos reservados. MAT 2020.
            </h5>
        </div>

    </div>
</body>

</html>