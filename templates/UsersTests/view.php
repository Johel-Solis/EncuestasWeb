<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersTest $usersTest
 */

$this->assign('title', 'Ver Encuesta');
?>
<?= $this->Html->css('bootstrap/bootstrap.css') ?>
<?= $this->Html->css('assets/css/styles.min.css') ?>
<?= $this->Html->script('assets/js/script.min.js') ?>
<?= $this->Html->css('style.css') ?>

<?= $this->Html->script('procesoCorreo.js') ?>

<?= $this->Html->css('styles.min.css') ?>







<!------ Include the above in your HEAD tag ---------->

<?= $this->fetch('error') ?>

<?= $this->fetch('success') ?>



<?= $this->Flash->render('auth') ?>
<!-- Start: Contact Form v2 (Modal & Full) with Google Map -->
<div style="margin: 50px;padding: 20px;">
    <!-- Start: Full Page Form -->
    <div class="container-fluid">
        <h1 style="color: rgb(231,236,241);">Informacion de Encuesta</h1>
        <hr style="color: rgb(235,190,219);">


        <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6" id="message">
                <h2 class="h4" style="color: rgb(247,247,247);"> <?= h($usersTest->name) ?> </h2>

                <div class="form-group"><label for="from-name" style="color: rgb(249,250,251);">Nombre de la encuesta :</label><span class="required-input"></span>

                    <label for="from-name" style="color: rgb(249,250,251);"> <?= h($usersTest->name) ?> </label>

                </div>
                <div class="form-group"><label for="from-name" style="color: rgb(246,248,249);">Url Pagina web :</label>
                    <label for="from-name" style="color: rgb(249,250,251);"> <?= h($usersTest->url_app) ?> </label>

                </div>
                <div class="form-group"><label for="from-email" style="color: rgb(248,249,251);">Fecha Fin (d-m-a) :</label>
                    <label for="from-name" style="color: rgb(249,250,251);"> <?= h($usersTest->max_date->format('d-m-Y')) ?> </label>

                </div>

                <div class="form-group"><label for="from-email" style="color: rgb(248,249,251);">Mensaje :</label>
                    <div class="input-group">
                        <label for="from-name" style="color: rgb(249,250,251);"> <?= h($usersTest->message) ?> </label>
                    </div>
                </div>

                <div class="form-group"><label for="from-comments" style="color: rgb(245,246,248);">Usuario Creador :</label>
                    <label for="from-name" style="color: rgb(249,250,251);"> <?= h($usersTest->username) ?> </label>
                </div>

                <div class="form-group"><label for="from-email" style="color: rgb(248,249,251);">Tets :</label>
                    <label for="from-name" style="color: rgb(249,250,251);"> <?= $this->Html->link($usersTest->test->name, ['controller' => 'Tests', 'action' => 'view', $usersTest->test->id]) ?> </label>


                </div>

                <div class="form-group">

                    <div class="form-row">
                        <div class="col">

                            <?= $this->Html->link(__('Editar'), ['controller' => 'UsersTests', 'action' => 'edit', $usersTest->id], ['class' => 'btn btn-primary btn-block']) ?>

                        </div>
                    </div>

                </div>

                <hr class="d-flex d-md-none">
            </div>

            <div class="col-12 col-md-6">
                <h2 class="h4" style="color: rgb(244,245,247);"><i class="fa fa-envelope"></i>&nbsp;Correos</h2>
                <div class="form-row">
                    <div class="col-sm-6 col-md-12 col-lg-6">
                        <div></div>
                        <hr class="d-sm-none">
                    </div>
                </div>

                <table id="mytable" class="table table-bordred ">


                    <tbody>

                        <?php
                        foreach ($evaluations as $evaluation) : ?>

                            <tr>

                                <td class='otro_color'> <?= h($evaluation->email) ?></td>











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
                <p class='otro_color'><?= $this->Paginator->counter(__('pagina {{page}} of {{pages}}, muestra {{current}} registro(s) de un total de {{count}} registros')) ?></p>



                <?= $this->Html->link(__('Ver Resultados'), ['controller' => 'Evaluations', 'action' => 'estadistica',$usersTest->id], ['class' => 'btn btn-primary btn-block']) ?>
            </div>

        </div>
        </form>
    </div>