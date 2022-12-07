<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
$this->assign('title', 'Ver Usuario');
?>
<?= $this->Html->css('style.css') ?>



<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">

            <div class="card-header">
                <h3 class="otro_color"> Pregunta del Test <?= $this->Html->link($test->name, ['controller' => 'Tests', 'action' => 'view', $test->id]) ?> </h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <table>
                        <tr class="otro_color">
                            <th> <?= __('Pregunta:') ?></th>
                            <td></td>
                            <td><?= h($question->descripcion) ?></td>
                        </tr>

                    </table>

                </div>

                <div class="form-group">

                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $question->id], ['class' => 'btn float-right login_btn']) ?>
                </div>

            </div>

        </div>
    </div>
</div>