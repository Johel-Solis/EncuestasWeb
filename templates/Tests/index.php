<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test[]|\Cake\Collection\CollectionInterface $tests
 */
$this->assign('title', 'Lista Tests');
?>

<?= $this->Html->css('style.css') ?>



<?= $this->Html->css('styles.min.css') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">



<div class="container">
    <div class="row">


        <div class="col-md-12">
            <h3 class='otro_color'>LISTA DE TESTS</h3>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred ">

                    <thead>
                        <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                        <th><?= $this->Paginator->sort('description', 'Descripcion') ?></th>
                        <th class="title_color">Ver</th>
                        <th class="title_color">Editar</th>
                        <th class="title_color">Borrar</th>

                    </thead>
                    <tbody>

                        <?php
                        foreach ($tests as $test) : ?>

                            <tr>
                                <td class='otro_color'> <?= h($test->name) ?> </td>
                                <td class='otro_color'> <?= h($test->description) ?> </td>

                                <td>
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $test->id]) ?>
                                </td>
                                <td>
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $test->id]) ?>
                                </td>
                                <td>
                                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $test->id], ['confirm' => __('se borrará  este test', $test->id)]) ?>
                                </td>
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

            </div>

        </div>
    </div>
</div>