<?php

/**
 * @var \App\View\AppView $this
 * 
 */

$this->assign('title', 'Crear Encuesta');
?>

>

<?= $this->Html->css('style.css') ?>

<?= $this->Html->script('procesoCorreo.js') ?>
<?= $this->Html->css('assets/css/styles.min.css') ?>

<?= $this->Html->script('jquery/jquery.js') ?>
<?= $this->Html->script('assets/js/script.min.js') ?>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

<!------ Include the above in your HEAD tag ---------->

<?= $this->fetch('error') ?>

<?= $this->fetch('success') ?>


<?= $this->Flash->render('auth') ?>
<!-- Start: Contact Form v2 (Modal & Full) with Google Map -->
<div style="margin: 50px;padding: 20px;">
    <!-- Start: Full Page Form -->
    <div class="container-fluid">
        <?= $this->Form->create($usersTest) ?>
        <h1 style="color: rgb(231,236,241);">Crear Encuesta</h1>
        <hr style="background-color: rgb(235,190,219);">


        <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6" id="message">
                <h2 class="h4" style="color: rgb(247,247,247);">Ingrese informacion de la encuesta</h2>
                <div class="form-group"><label for="from-name" style="color: rgb(249,250,251);">Nombre de la encuesta</label><span class="required-input"></span>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div>
                        <?= $this->Form->input('name', ['class' => "form-control", 'type' => "text",  'required' => "", 'placeholder' => "Nombre de encuesta..."]) ?>
                    </div>
                </div>
                <div class="form-group"><label for="from-name" style="color: rgb(246,248,249);">Url Pagina web</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-link"></i></span></div>
                        <div class="input-group-append"></div>
                        <?= $this->Form->input('url_app', ['class' => "form-control", 'type' => "url", 'placeholder' => "pagina web..."]) ?>
                    </div>
                </div>
                <div class="form-group"><label for="from-email" style="color: rgb(248,249,251);">Ingresar Correos</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div>
                        <input class="form-control" type="text" id="correo" placeholder="Correo...">
                    </div>
                </div><button type="button" onclick="validateEmail()" class="btn btn-primary btn-block">Agregar</button>
                <div class="form-row">
                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                        <div class="form-group"><label for="from-phone" style="color: rgb(245,246,248);">Fecha Fin</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span></div>
                                <?= $this->Form->control('max_date', ['label' => false, 'type' => 'date', 'class' => "form-control"]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                        <div class="form-group"><label for="from-calltime" style="color: rgb(245,246,248);">Tipo Tests</label>
                            <!-- Start: Input Group -->
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-sort-desc"></i></span></div>
                                <?= $this->Form->control('test_id', ['label' => false, 'class' => "form-control"]) ?>
                            </div>
                            <!-- End: Input Group -->
                        </div>
                    </div>
                </div>
                <div class="form-group"><label for="from-comments" style="color: rgb(245,246,248);">Comentario</label>
                    <?= $this->Form->input('message', ['class' => "form-control", 'id' => "from-comments", 'type' => 'textarea', 'placeholder' => "ingrese comentario...", 'rows' => "5"]) ?> </div>
                <div class="form-group">

                    <div class="form-row">
                        <div class="col">
                            <?= $this->Form->button('Crear Encuesta', ['class' => " btn btn-primary btn-block"]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

                </div>

                <hr class="d-flex d-md-none" style="background-color: rgb(231,236,241);">
            </div>

            <div class="col-12 col-md-6">
                <h2 class="h4" style="color: rgb(244,245,247);"><i class="fa fa-envelope"></i>&nbsp;Correos</h2>
                <div class="form-row" style="color: rgb(244,245,247);">
                    <div class="col-sm-6 col-md-12 col-lg-6">
                        <div style="background-color: rgb(244,245,247);"></div>
                        <hr style="background-color: rgb(244,245,247);">
                    </div>
                </div>
                <ul id="lstCorreos" style="color: rgb(255,255,255);">


                </ul>
            </div>
        </div>
        </form>
    </div>