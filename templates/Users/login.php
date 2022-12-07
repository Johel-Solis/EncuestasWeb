<?php
/**
 * @var \App\View\AppView $this
 * 
 */

 
$this->assign('title', 'Iniciar Sesion');
 
?>
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->script('jquery/jquery.js') ?>
<?= $this->Html->script('bootstrap/bootstrap.min.js') ?>

<?= $this->Html->css('style.css') ?>



<
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
<!--	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
-->    
	<!--Fontawesome CDN-->
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	
	
	

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<?= $this->Flash->render('auth') ?>
			<?= $this->Form->create() ?>

			<div class="card-header">
				<h3>Ingrese sus datos: </h3>
				
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						
						<?= $this->Form->input('username', ['class'=>"form-control", 'placeholder'=>'username', 'label'=>false, 'required'])?>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						
						<?= $this->Form->input('password', ['class'=>"form-control", 'type'=>'password', 'placeholder'=>'password', 'label'=>false, 'required'])?>
					</div>
					
					<div class="form-group">
						
						<?= $this->Form->button('Login', ['class'=>'btn float-right login_btn'])?>
					</div>
				</form>
			</div>
			<div class="card-footer">
				
				
			</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
