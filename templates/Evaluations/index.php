<?php
$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table encuestados</title>
    <?= $this->Html->css('assets/bootstrap.min.css') ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">


                <div class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span><?= $this->Html->link(__('Encuestas S&S'), ['controller' => 'Users', 'action' => 'home'], ['class' => "navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"]) ?></span></div>
                </div>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-tachometer-alt')) . 'Resultado', array('controller' => 'Evaluations', 'action' => 'estadistica', $id_encuesta), array('escape' => false, 'class' => "nav-link")) ?></li>
                    
                    <li class="nav-item" role="presentation"> <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-table')) . 'Resultado', array('controller' => 'Evaluations', 'action' => 'index', $id_encuesta), array('escape' => false, 'class' => "nav-link active"))?></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Menu</span><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-user fa-sm fa-fw mr-2 text-gray-400')) . 'Perfil', array('controller' => 'Users', 'action' => 'view', $current_user['username']), array('escape' => false, 'class' => "dropdown-item", 'role' => "presentation")) ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-table fa-sm fa-fw mr-2 text-gray-400')) . 'Encuestas', array('controller' => 'UsersTests', 'action' => 'index'), array('escape' => false, 'class' => "dropdown-item", 'role' => "presentation")) ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-list fa-sm fa-fw mr-2 text-gray-400')) . 'Tests', array('controller' => 'Tests', 'action' => 'index'), array('escape' => false, 'class' => "dropdown-item", 'role' => "presentation")) ?>
                                        <div class="dropdown-divider"></div>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400')) . 'Cerrar sesion', array('controller' => 'Users', 'action' => 'logut'), array('escape' => false, 'class' => "dropdown-item", 'role' => "presentation")) ?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Encuestados</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Informacion de encuestados</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th><?= $this->Paginator->sort('email', 'Correo') ?></th>
                                            <th><?= $this->Paginator->sort('age', 'Edad') ?></th>
                                            <th><?= $this->Paginator->sort('gender', 'Genero') ?></th>
                                            <th><?= $this->Paginator->sort('location', 'Ubicacion') ?></th>
                                            <th><?= $this->Paginator->sort('date', 'Fecha de Respuesta') ?></th>

                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php foreach ($evaluations as $evaluation) : ?>
                                            <tr>
                                                <td><?= h($evaluation->email) ?></td>
                                                <td><?= $this->Number->format($evaluation->age) ?></td>
                                                <td><?= h($evaluation->gender) ?></td>
                                                <td><?= h($evaluation->location) ?></td>
                                                <td><?= h($evaluation->date) ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Correo</strong></td>
                                            <td><strong>Edad</strong></td>
                                            <td><strong>Genero</strong></td>
                                            <td><strong>Ubicacion</strong></td>
                                            <td><strong>Fecha de respuesta</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"> <?= $this->Paginator->counter(__('pagina {{page}} de {{pages}}, muestra {{current}} registro(s) de un total de {{count}} registros')) ?> </p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <?= $this->Paginator->first('<<Primero') ?>
                                            <?= $this->Paginator->prev('<Atras') ?>
                                            <?= $this->Paginator->numbers() ?>
                                            <?= $this->Paginator->next('Siguiente>') ?>
                                            <?= $this->Paginator->last('Ultimo>>') ?>
                                        </ul>
                                        <p></p>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <?= $this->Html->script('theme.js') ?>
</body>

</html>