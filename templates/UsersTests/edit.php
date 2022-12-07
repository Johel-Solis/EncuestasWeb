<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersTest $usersTest
 */
$this->assign('title', 'Editar Usuario');
?>

<?= $this->Html->css('style.css') ?>
<?= $this->Html->css('assets/css/styles.min.css') ?>
<?= $this->Html->script('assets/js/script.min.js') ?>






<?= $this->fetch('error') ?>

<?= $this->fetch('success') ?>



<?= $this->Flash->render('auth') ?>
<!-- Start: Contact Form v2 (Modal & Full) with Google Map -->
<div style="margin: 50px;padding: 20px;">
    <!-- Start: Full Page Form -->
    <div class="container-fluid">
        <?= $this->Form->create($usersTest) ?>
        <h1 style="color: rgb(231,236,241);">Editar Encuesta</h1>
        <hr style="background-color: rgb(231,236,241);">


        <div class="form-row">
            <div class="col-md-6">
                <div id="successfail"></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6" id="message">
                <h2 class="h4" style="color: rgb(247,247,247);">Editar informacion de la encuesta</h2>
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
                        <?= $this->Form->input('url_app', ['class' => "form-control", 'type' => "url", 'readonly' => "readonly"]) ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                        <div class="form-group"><label for="from-phone" style="color: rgb(245,246,248);">Fecha Fin</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span></div>
                                <?= $this->Form->control('max_date', ['label' => false, 'type' => 'date', 'class' => "form-control"]) ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group"><label for="from-comments" style="color: rgb(245,246,248);">Comentario</label>
                    <?= $this->Form->input('message', ['class' => "form-control", 'id' => "from-comments", 'type' => 'textarea', 'placeholder' => "ingrese comentario...", 'rows' => "5"]) ?> </div>
                <div class="form-group">

                    <div class="form-row">
                        <div class="col">
                            <?= $this->Form->button('Editar', ['class' => " btn btn-primary btn-block"]) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>

                </div>

                <hr class="d-flex d-md-none" style="background-color: rgb(231,236,241); color: rgb(231,236,241); ">
            </div>

            <div class="col-12 col-md-6">
                <h2 class="h4" style="color: rgb(244,245,247);"><svg class="bi bi-exclamation-octagon-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0011.107 0H4.893a.5.5 0 00-.353.146L.146 4.54A.5.5 0 000 4.893v6.214a.5.5 0 00.146.353l4.394 4.394a.5.5 0 00.353.146h6.214a.5.5 0 00.353-.146l4.394-4.394a.5.5 0 00.146-.353V4.893a.5.5 0 00-.146-.353L11.46.146zM8 4a.905.905 0 00-.9.995l.35 3.507a.552.552 0 001.1 0l.35-3.507A.905.905 0 008 4zm.002 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg></i>&nbsp;Informacion a Tener en cuenta</h2>
                <div class="form-row">
                    <div class="col-sm-6 col-md-12 col-lg-6" style="background-color: rgb(231,236,241);">
                        <div></div>
                        <hr class="d-sm-none" style="background-color: rgb(231,236,241); color: rgb(231,236,241);">
                    </div>
                </div>
                <h3 class="h4" style="color: rgb(244,245,247);"> La url de la pagina Web no se puede modificar.</h3>
            </div>

        </div>
        </form>
    </div>