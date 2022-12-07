<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersTest[]|\Cake\Collection\CollectionInterface $usersTests
 */

$this->assign('title', 'Lista Encuestas');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">

<?= $this->Html->css('style.css') ?>


<div class="container ">


    <div class="row">


        <div class="col-md-12">
            <h3 class='otro_color'>LISTA DE ENCUESTAS</h3>
            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                        <th> <?= $this->Paginator->sort('name', 'Nombre Encuesta') ?></th>
                        <th> <?= $this->Paginator->sort('url_app', 'Pagina Web') ?></th>
                        <th> <?= $this->Paginator->sort('max_date', 'Fecha Fin') ?></th>
                        <th class="title_color">Ver</th>
                        <th class="title_color">Editar</th>
                        <th class="title_color">Borrar</th>

                    </thead>
                    <tbody>

                        <?php
                        foreach ($usersTests as $usersTest) : ?>

                            <tr>

                                <td class='otro_color'> <?= h($usersTest->name) ?></td>
                                <td class='otro_color'> <?= h($usersTest->url_app) ?></td>
                                <td class='otro_color'> <?= h($usersTest->max_date) ?></td>







                                <td>
                                    <?= $this->Html->link(__('ver'), ['action' => 'view', $usersTest->id]) ?>
                                </td>
                                <td>
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usersTest->id]) ?>
                                </td>
                                <td>
                                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $usersTest->id], ['confirm' => __('se borrará esta encuesta', $usersTest->id)]) ?>
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
                <p class='otro_color'><?= $this->Paginator->counter(__('pagina {{page}} of {{pages}}, muestra {{current}} registro(s) de un total de {{count}} registros')) ?></p>

            </div>

        </div>
    </div>
</div>