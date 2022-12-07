<?php

$this->disableAutoLayout();



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
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
                    <li class="nav-item" role="presentation"><?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-tachometer-alt')) . 'Resultado', array('controller' => 'Evaluations', 'action' => 'estadistica', $id_encuesta), array('escape' => false, 'class' => "nav-link active")) ?></li>

                    <li class="nav-item" role="presentation"> <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-table')) . 'Resultado', array('controller' => 'Evaluations', 'action' => 'index', $id_encuesta), array('escape' => false, 'class' => "nav-link")) ?></li>
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


                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                                <h3 class="text-dark mb-0">Resultados</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-left-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>cantidad de hombres</span></div>
                                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?= $estadista['male'] ?></span></div>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-mars fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-left-success py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Edad promedio</span></div>
                                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?= $estadista['promed'] ?></span></div>
                                                </div>
                                                <div class="col-auto"><i class="material-icons fa-2x text-gray-300">person</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-left-warning py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>cantidad de resultados</span></div>
                                                    <div class="text-dark font-weight-bold h5 mb-0"><span> <?= $estadista['numres'] ?></span></div>
                                                </div>
                                                <div class="col-auto"><i class="material-icons fa-2x text-gray-300">person</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-left-info py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Encuestas respondidas</span></div>
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-auto">
                                                            <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span> <?= $this->Number->format($estadista['promen']) . '%' ?></span></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar bg-info" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style=<?php echo ('" width:' . $estadista['promen'] . '%;"') ?>><span class="sr-only"><?= $estadista['promen'] . '%' ?></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 mb-4">
                                    <div class="card shadow border-left-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>cantidad de mujeres</span></div>
                                                    <div class="text-dark font-weight-bold h5 mb-0"><span><?= $estadista['female'] ?></span></div>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-venus fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 id='title_pre' class="text-primary font-weight-bold m-0">Resultados pregunta: </h6>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="small font-weight-bold">Totalmente Desacuerdo<span id='cant1' class="float-right">0</span></h4>
                                            <div class="progress mb-4">
                                                <div id='1' class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"><span class="sr-only">20%</span></div>
                                            </div>
                                            <h4 class="small font-weight-bold">En Desacuerdo<span id='cant2' class="float-right">0</span></h4>
                                            <div class="progress mb-4">
                                                <div id='2' class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"><span class="sr-only">40%</span></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Ni de acuerdo ni desacuerdo<span id='cant3' class="float-right">0</span></h4>
                                            <div class="progress mb-4">
                                                <div id='3' class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"><span class="sr-only">60%</span></div>
                                            </div>
                                            <h4 class="small font-weight-bold">De acuerdo<span id='cant4' class="float-right">0</span></h4>
                                            <div class="progress mb-4">
                                                <div id='4' class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="5" aria-valuemax="100" style="width: 0%;"><span class="sr-only">80%</span></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Totalmente de acuerdo<span id='cant5' class="float-right">0</span></h4>
                                            <div class="progress mb-4">
                                                <div id='5' class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"><span class="sr-only">100%</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card shadow mb-4">

                                    </div>
                                </div>

                                <div class="col">

                                    <div class="card-header py-3">
                                        <h6 class="text-primary font-weight-bold m-0">Preguntas</h6>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($questions as $quetion) : ?>

                                            <li class="list-group-item">
                                                <div class="row align-items-center no-gutters">
                                                    <div class="col mr-2">
                                                        <button type="button" onclick="llenarResultado (<?= $quetion['id'] ?>)" class="btn btn-primary btn-block">
                                                            <h6 class="mb-0"><strong> <?php echo ($quetion['descripcion']) ?></strong></h6></span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </li>




                                        <?php endforeach; ?>


                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
                    <?= $this->Html->script('theme.js') ?>
                    <script>
                        function llenarResultado(id_preg) {
                            var r1 = 0;
                            var r2 = 0;
                            var r3 = 0;
                            var r4 = 0;
                            var r5 = 0;
                            var numR = 0;

                            numR = (<?php echo $estadista['numres'] ?>);
                            <?php foreach ($answers as $answer) : ?>
                                if (id_preg == (<?php echo $answer['question_id'] ?>)) {
                                    (r<?php echo ($answer['value']) ?>) = +1;


                                }



                            <?php endforeach; ?>



                           
                                var porc = (r1 / numR) * 100;
                                document.getElementById('cant1').innerHTML = r1 + 'de ' + numR + ' /' + Number.parseInt(porc) + '%';
                                document.getElementById('1').style.width = Number.parseInt(porc) + '%';

                           


                           
                                var porc = (r2 / numR) * 100;
                                document.getElementById('cant2').innerHTML = r2 + 'de ' + numR + ' /' + Number.parseInt(porc) + '%';
                                document.getElementById('2').style.width = Number.parseInt(porc) + '%';

                           

                           
                                var porc = (r3 / numR) * 100;
                                document.getElementById('cant3').innerHTML = r3 + 'de ' + numR + ' /' + Number.parseInt(porc) + '%';
                                document.getElementById('3').style.width = Number.parseInt(porc) + '%';

                           

                           
                                var porc = (r4 / numR) * 100;
                                document.getElementById('cant4').innerHTML = r4 + 'de ' + numR + ' /' + Number.parseInt(porc) + '%';
                                document.getElementById('4').style.width = Number.parseInt(porc) + '%';

                           

                           
                                var porc = (r5 / numR) * 100;
                                document.getElementById('cant5').innerHTML = r5 + 'de ' + numR + ' /' + Number.parseInt(porc) + '%';
                                document.getElementById('5').style.width = Number.parseInt(porc) + '%';

                           





                        }
                    </script>


</body>

</html>