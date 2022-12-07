<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 */

$this->assign('title', 'Editar Test');
?>

<?= $this->Html->css('style.css') ?>



<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">

            <?= $this->Form->create($test) ?>

            <div class="card-header">
                <h3> Editar Test <?= $test->name ?> </h3>
            </div>
            <div class="card-body">
                <form>
                    <div class=" form-group otro_color">


                        <div>
                            <label><strong> Nombre Test</strong></label>
                            <?php
                            echo $this->Form->input('name', ['class' => 'form-control', 'type' => 'text']);
                            ?>
                        </div>
                        <div>
                            <label><strong> Descripcion </strong></label>
                            <?php
                            echo $this->Form->input('description', ['class' => 'form-control', 'type' => 'textarea']);
                            ?>
                        </div>

                    </div>

                    <div class="form-group">

                        <?= $this->Form->button('Guardar', ['class' => 'btn float-right login_btn']) ?>
                    </div>
                </form>
            </div>
            <?= $this->Form->end() ?>



        </div>
    </div>
</div>