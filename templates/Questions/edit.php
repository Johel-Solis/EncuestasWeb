<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
$this->assign('title', 'Editar Pregunta');
?>

<?= $this->Html->css('style.css') ?>


<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">

            <?= $this->Form->create($question) ?>

            <div class="card-header">
                <h3> Editar Pregunta del Test <?= $test->name ?> </h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group otro_color">



                        <div>
                            <label><strong> Descripcion de la pregunta </strong></label>
                            <?php
                            echo $this->Form->input('descripcion', ['class' => 'form-control', 'type' => 'textarea']);
                            ?>
                        </div>

                    </div>

                    <div class="form-group">

                        <?= $this->Form->button('Editar', ['class' => 'btn float-right login_btn']) ?>
                    </div>
                </form>
            </div>
            <?= $this->Form->end() ?>



        </div>
    </div>
</div>