<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */
$this->assign('title', 'Crear Test');
?>

<?= $this->Html->script('jquery/jquery.min.js') ?>
<?= $this->Html->css('assets/css/styles.min.css') ?>
<?= $this->Html->script('assets/js/script.min.js') ?>
<?= $this->Html->css('style.css') ?>
<?= $this->Html->script('procesoCorreo.js') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

<?= $this->fetch('error') ?>

<?= $this->fetch('success') ?>


<?= $this->Flash->render('auth') ?>
<!-- Start: Contact Form v2 (Modal & Full) with Google Map -->
<div style="margin: 50px;padding: 20px;">
    <!-- Start: Full Page Form -->
    <div class="container-fluid">
        <?= $this->Form->create($test) ?>
        <h1 style="color: rgb(231,236,241);">Crear Test</h1>
        <hr style="background-color: rgb(235,190,219);">


        <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6" id="message">
                <h2 class="h4" style="color: rgb(247,247,247);">Ingrese informacion del Test</h2>
                <div class="form-group"><label for="from-name" style="color: rgb(249,250,251);">Nombre del Test</label><span class="required-input"></span>
                    <div class="input-group">
                        <div class="input-group-prepend"></div>
                        <?= $this->Form->input('name', ['class' => "form-control", 'type' => "text",  'required' => "", 'placeholder' => "Nombre del test..."]) ?>
                    </div>
                </div>
                <div class="form-group"><label for="from-name" style="color: rgb(246,248,249);">Descripcion</label>
                    <div class="input-group">
                        <div class="input-group-prepend"></div>
                        <div class="input-group-append"></div>
                        <?= $this->Form->input('description', ['class' => "form-control", 'type' => "textarea"]) ?>
                    </div>
                </div>
                <div class="form-group"><label for="from-email" style="color: rgb(248,249,251);">Ingresar Preguntas del test</label>
                    <div class="input-group">
                        <div class="input-group-prepend"></div>
                        <input class="form-control" type="text" id="pregunta" placeholder="Preguntas...">
                    </div>
                </div><button type="button" onclick="aggPreguntas()" class="btn btn-primary btn-block">Agregar</button>
                <div class="form-row">
                    <hr style="background-color: rgb(247,247,247); color: rgb(247,247,247);">
                </div>
                <div class="form-group">
                </div>

                <div class="form-group">

                    <div class="form-row">
                        <div class="col">
                            <?= $this->Form->button('Crear Test', ['class' => " btn btn-primary btn-block"]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

                </div>

                <hr class="d-flex d-md-none">
            </div>

            <div class="col-12 col-md-6">
                <h2 class="h4" style="color: rgb(244,245,247);"><i class="fa fa-envelope"></i>&nbsp;Preguntas</h2>
                <div class="form-row">
                    <div class="col-sm-6 col-md-12 col-lg-6">
                        <hr style="background-color: rgb(247,247,247); color: rgb(247,247,247);">
                    </div>

                </div>
                <ul id="lstPreguntas" style="color: rgb(247,247,247);">


                </ul>
            </div>
        </div>
        </form>
    </div>