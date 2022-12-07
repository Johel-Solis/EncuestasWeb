<?php
$this->assign('title', 'Inicio');
?>
<?= $this->Html->css('style.css') ?>


<?= $this->Flash->render() ?>
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>Bienvenido <?= $this->Html->link($current_user['first_name'] . ' ' . $current_user['last_name'], ['controller' => 'Users', 'action' => 'view', $current_user['username']], ['class' => 'title_color']) ?></span></div>
                <div class="intro-heading text-uppercase"><span>Listo para ayudarnos a mejorar</span></div><?= $this->html->link(__('Agregar Encuesta'), ['controller' => 'UsersTests', 'action' => 'crearEncuesta'], ['class' => "btn btn-primary btn-xl text-uppercase js-scroll-trigger", 'role' => "button", 'style' => 'background-color : rgb(54,134,254);']) ?>
            </div>


        </div>
    </header>
