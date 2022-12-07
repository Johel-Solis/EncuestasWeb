<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */

$this->assign('title', 'Ver Test');
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
        <h1 style="color: rgb(231,236,241);">Informacion de Test</h1>
        <hr style="background-color: rgb(235,190,219);">


        <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6" id="message">
                <h2 class="h4" style="color: rgb(247,247,247);"> <?= h($test->name) ?> </h2>

                <div class="form-group"><label for="from-name" style="color: rgb(249,250,251);">Nombre del Test :</label><span class="required-input"></span>

                    <label for="from-name" style="color: rgb(249,250,251);"> <?= h($test->name) ?> </label>

                </div>

                <div class="form-group"><label for="from-email" style="color: rgb(248,249,251);">Descipción :</label>
                    <div class="input-group">
                        <label for="from-name" style="color: rgb(249,250,251);"> <?= h($test->description) ?> </label>
                    </div>
                </div>

                <div class="form-group">

                    <div class="form-row">
                        <div class="col">

                            <?= $this->Html->link(__('Editar'), ['controller' => 'Tests', 'action' => 'edit', $test->id], ['class' => 'btn btn-primary btn-block']) ?>

                        </div>
                    </div>


                </div>

                <hr class="d-flex d-md-none">
            </div>

            <div class="col-12 col-md-6">
                <h2 class="h4" style="color: rgb(244,245,247);"><i class="fa fa-envelope"></i>&nbsp;Preguntas</h2>
                <div class="form-row">
                    <div class="col-sm-6 col-md-12 col-lg-6">
                        <div></div>
                        <hr class="d-sm-none">
                    </div>
                </div>
                <?php if (!empty($test->questions)) : ?>

                    <table id="mytable" class="table table-bordred  table-responsive">
                        <thead>

                            <th><?= $this->Paginator->sort('descripcion', 'Descripcion') ?></th>
                            <th class="title_color">Ver</th>
                            <th class="title_color">Editar</th>
                            <th class="title_color">Borrar</th>

                        </thead>


                        <tbody>

                            <?php foreach ($questions as $question) : ?>

                                <tr>

                                    <td class='otro_color'> <?= h($question->descripcion) ?> </td>
                                    <td> <?= $this->Html->link(__('Ver'), ['controller' => 'Questions', 'action' => 'view', $question->id], ['class' => 'otro_color']) ?> </td>
                                    <td> <?= $this->Html->link(__('Editar'), ['controller' => 'Questions', 'action' => 'edit', $question->id], ['class' => 'otro_color']) ?> </td>
                                    <td> <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Questions', 'action' => 'delete', $question->id], ['class' => 'otro_color', 'confirm' => __('se borrará  esta pregunta', $question->id)]) ?> </td>

                                </tr>

                            <?php endforeach; ?>


                        </tbody>

                    </table>

                    <div class="clearfix"></div>

                    <ul class="pagination pull-right">

                        <?= $this->Paginator->first('<<Primero') ?>
                        <?= $this->Paginator->prev('<Atras') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('Siguiente>') ?>
                        <?= $this->Paginator->last('Ultimo>>') ?>
                    </ul>
                    <p class='otro_color'> <?= $this->Paginator->counter(__('pagina {{page}} of {{pages}}, muestra {{current}} registro(s) de un total de {{count}} registros')) ?></p>

                <?php else : ?>
                    <hr style="background-color: rgb(235,190,219);">
                    <p class='otro_color'>Este Test no contiene preguntas</p>
                <?php endif; ?>
                <div class="form-group">

                    <div class="form-row">
                        <div class="col">

                            <?= $this->Html->link(__('Agregar Pregunta'), ['controller' => 'Questions', 'action' => 'add', $test->id], ['class' => 'btn btn-primary btn-block']) ?>

                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>