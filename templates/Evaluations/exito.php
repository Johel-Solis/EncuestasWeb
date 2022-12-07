<?php
$this->assign('title', 'Inicio');
?>
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
<?= $this->Html->css('style.css') ?>

<body id="page-top">

<?= $this->Flash->render() ?>
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Felicitaciones por finalizar la encuesta</span></div>
                <div class="intro-heading text-uppercase"><span>Gracias para ayudarnos a mejorar</span></div>
            </div>


        </div>
    </header>
    
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <?= $this->Html->script('agency.js') ?>
</body>

</html>