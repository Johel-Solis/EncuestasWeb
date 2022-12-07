<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?= h($this->fetch('title')) ?></title>

    <?= $this->Html->meta('icon') ?>





    <?= $this->Html->css('assets/bootstrap/css/bootstrap.min.css') ?>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>



</head>

<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container">
            <?php if (isset($current_user)) : ?>
                <?= $this->Html->link(__('Encuestas S&S'), ['controller' => 'Users', 'action' => 'home'], ['class' => 'navbar-brand', 'style'=>'color : #428BCA;']) ?>
            <?php else : ?>
                <?= $this->Html->link(__('Encuestas S&S'), ['controller' => 'Pages', 'action' => 'display'], ['class' => 'title_color navbar-brand', 'style'=>'color : #428BCA;']) ?>
            <?php endif; ?> <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase navbar-right">
                    <?php if (isset($current_user)) : ?>
                        <?php if ($current_user['role'] == 'admin') : ?>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Usuario</a>
                                <div class="dropdown-menu" role="menu"> <?= $this->html->link(__('Crear Usuario '), ['controller' => 'Users', 'action' => 'add'], ['class' => "dropdown-item", 'role' => "presentation"]) ?> <?= $this->html->link(__('Lista de Usuarios'), ['controller' => 'Users', 'action' => 'index'], ['class' => "dropdown-item", 'role' => "presentation"]) ?> </div>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Encuesta</a>
                            <div class="dropdown-menu" role="menu"> <?= $this->html->link(__('Crear Encuesta'), ['controller' => 'UsersTests', 'action' => 'crearEncuesta'], ['class' => "dropdown-item", 'role' => "presentation"]) ?> <?= $this->html->link(__('Lista de Encuestas'), ['controller' => 'UsersTests', 'action' => 'index'], ['class' => "dropdown-item", 'role' => "presentation"]) ?> </div>
                        </li>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Test</a>
                            <div class="dropdown-menu" role="menu"> <?= $this->html->link(__('Crear Test'), ['controller' => 'Tests', 'action' => 'add'], ['class' => "dropdown-item", 'role' => "presentation"]) ?> <?= $this->html->link(__('Lista Test'), ['controller' => 'Tests', 'action' => 'index'], ['class' => 'dropdown-item', 'role' => "presentation"]) ?> </div>
                        </li>
                        <li class="nav-item" role="presentation"><?= $this->html->link(__('Cerrar sesion'), ['controller' => 'Users', 'action' => 'logout'], ['class' => "nav-link js-scroll-trigger"]) ?> </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <section>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <?= $this->Html->script('agency.js') ?>
</body>

</html>