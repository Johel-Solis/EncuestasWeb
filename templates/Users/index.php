<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->assign('title', 'Lista Usuarios');
?>






<?= $this->Html->css('style.css') ?>


<div class="container">


    <div class="row">
        <div class="col-md-12">
            <h3 class='otro_color'>LISTA DE ENCUESTAS</h3>
            <div class="table-responsive">






                <table id="mytable" class="table table-bordred table-striped  menfon">

                    <thead>


                        <th> <?= $this->Paginator->sort('username', 'Usuario') ?> </th>
                        <th> <?= $this->Paginator->sort('first_name', 'Nombre') ?> </th>
                        <th> <?= $this->Paginator->sort('last_name', 'Apellidos') ?> </th>

                        <th> <?= $this->Paginator->sort('role', 'Tipo Usuario') ?> </th>
                        <th> <?= $this->Paginator->sort('active', 'Activo') ?> </th>
                        <th class="title_color">Ver</th>
                        <th class="title_color">Editar</th>
                        <th class="title_color">Borrar</th>

                    </thead>
                    <tbody>

                        <?php
                        foreach ($users as $user) : ?>

                            <tr>
                                <td class='otro_color'> <?= h($user->username) ?></td>
                                <td class='otro_color'> <?= h($user->first_name) ?></td>
                                <td class='otro_color'> <?= h($user->last_name) ?></td>
                                <td class='otro_color'> <?= h($user->role) ?></td>
                                <td class='otro_color'> <?= $user->active ? __('Si') : __('No'); ?></td>

                                <td>
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->username], ['class' => "title_color"]) ?>
                                </td>
                                <td>
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->username], ['class' => "title_color"]) ?>
                                </td>
                                <td>
                                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $user->username], ['class' => "title_color", 'confirm' => __('se borrará  este usuario # {0}?', $user->username)]) ?>
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