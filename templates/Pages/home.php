<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css?h=aad6187964b63c9cf13110b97da94f79">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>



</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="#">Encuestas S&amp;S</a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <?php if (isset($current_user)) : ?>
                        <li role="presentation" class="nav-item nav-link js-scroll-trigger"> <?= $this->Html->link('PRINCIPAL ', ['controller' => 'Users', 'action' => 'home', 'class' => 'nav-link active js-scroll-trigger']) ?></li>

                        <li role="presentation" class="nav-item nav-link js-scroll-trigger"> <?= $this->html->link('CERRAR SESION', ['controller' => 'Users', 'action' => 'logout', 'class' => 'nav-link active js-scroll-trigger']) ?></li>
                    <?php else : ?>
                        <li class="nav-item nav-link js-scroll-trigger" role="presentation"> <?= $this->Html->link(__('INICIAR SESION'), ['controller' => 'Users', 'action' => 'login', 'class' => 'nav-link active js-scroll-trigger']) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('img/intro-bg.jpg');">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">Encuestas S&amp;S</h1>
                        <p class="intro-text"><br>Realizar encuestas de evaluación de diferentes páginas web.<br><br></p><a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa fa-angle-double-down animated"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="about" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Bienvenidos a Encuestas S&S</h2>
                    <p>Califica diferentes sitios web , para que estos puedan mejorar.</p>
                    <p>Comparte tu opinión de las paginas web que usas en tu día a día y dí lo que verdaderamente piensas de ellas.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>CONTÁCTENOS</h2>
                    <p>¡No dude en dejarnos un comentario para mejorar!</p>
                    <ul class="list-inline banner-social-buttons">
                        <li class="list-inline-item">&nbsp;<button class="btn btn-primary btn-lg btn-default" type="button"><i class="fa fa-google-plus fa-fw"></i><span class="network-name">&nbsp; Google+</span></button></li>
                        <li class="list-inline-item">&nbsp;<button class="btn btn-primary btn-lg btn-default" type="button"><i class="fa fa-twitter fa-fw"></i><span class="network-name">&nbsp;Twitter</span></button></li>
                        <li class="list-inline-item">&nbsp;<button class="btn btn-primary btn-lg btn-default" type="button"><i class="fa fa-github fa-fw"></i><span class="network-name">&nbsp;github</span></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container text-center">
            <p>Copyright ©&nbsp;Brand 2020</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="js/script.min.js?h=9fd3637c22238480f4d199585a9b2174"></script>

</body>

</html>