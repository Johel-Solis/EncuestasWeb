<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->assign('title', 'Crear Usuario');
?>



<?= $this->Html->css('style.css') ?>



<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="height: 470px;">
			<?= $this->Form->create($user) ?>

			<div class="card-header">
				<h3>Crear nuevo Usuario </h3>
			</div>
			<div class="card-body">
				<form>
					<div class="form-group otro_color">

						<div>
							<label><strong> Nombre Usuario </strong></label>
							<?php
							echo $this->Form->input('username', ['class' => 'form-control', 'type' => 'text']);
							?>
						</div>
						<div>
							<label><strong> Nombre </strong></label>
							<?php
							echo $this->Form->input('first_name', ['class' => 'form-control']);
							?>
						</div>

						<div>
							<label><strong> Apellido </strong></label>
							<?php
							echo $this->Form->input('last_name', ['class' => 'form-control']);
							?>
						</div>
						<div>
							<label><strong> Contraseña </strong></label>
							<?php
							echo $this->Form->input('password', ['class' => 'form-control', 'type' => 'password']);?>
						</div>
						<div>
						 <label><strong>Tipo de Usuario </strong></label>
							<div id='papel'>
								<?= $this->Form->control('role', ['label' => false, 'options' => ['admin' => 'Administrador', 'user' => 'Usuario']])  ?>
							</div>
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