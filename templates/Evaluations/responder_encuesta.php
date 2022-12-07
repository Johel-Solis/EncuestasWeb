<?php
?>
<!DOCTYPE html>
<html>

<head>

<?= $this->Html->css('style.css') ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>responder encuesta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    
</head>

<body >

    <div class="container">

        <h1 class="otro_color">Encuesta&nbsp; S&amp;S</h1>
        <hr style="background-color:white;">
        <p class="otro_color"><br>Por favor, tómate unos segundos para responder a nuestra Encuesta Online. Que contestes la encuesta online nos ayudará a comprender mejor tus opiniones sobre la pagina web.<br>para ver la pagina web que estas evaluando&nbsp;&nbsp;<a class="btn btn-primary" type="button" href="<?= $usersTest->url_app?>" target="_blank">Click aqui!</a><br>¡Gracias por participar en nuestra encuesta online!<br><br><br><br></p>
        <hr style="background-color: white;">
        <div>
        <?= $this->Flash->render() ?>
            <div>
            <?= $this->Form->create($evaluation) ?>
                <h4 class="otro_color" style="width: 1012px;height: 45px;">llene la siguiente informacion.</h4>
                <div class="form-group otro_color">

                    <div>
                        <label><strong> Edad </strong></label>
                        <?= $this->Form->input('age', ['class' => "form-control-sm",  'type' => 'Number']) ?>

                        

                    </div>
                    <div>
                        <label><strong> Genero </strong></label>
                        <?= $this->Form->control('gender', ['label' => false, 'options' => ['M' => 'Masculino', 'F' => 'Femenino']])  ?>
                        

                    </div>

                    <div>
                        <label><strong> Ubicacion </strong></label>

                        <?= $this->Form->input('location', ['class' => "form-control",  'type' => 'text']) ?>

                    </div>


                </div>


            </div>
        </div>
        <hr style="background-color: white;">
        <div>
            <h4 class="otro_color" style="width: 1012px;height: 45px;">Seleccione la opcion que mas le parezca de la siguiente afirmaciones.</h4>
            <div class="row">
                <div class="col">
                <?php $num=1;
                foreach ($questions as $quetion) : ?>

                    <h5 class="otro_color" style="width: 1007px;height: 28px;"><?php echo($quetion['descripcion']) ?></h5>
                    <div class="form-check" style="height: 29px;"><input class="form-check-input" type="radio" id="formCheck-1" style="width: 25px;height: 18px;" name="respuesta_<?= $num ?>" value="5"><label class="form-check-label otro_color" for="formCheck-1" style="font-size: 18px;">Totalmente de acuerdo</label></div>
                    <div class="form-check" style="height: 29px;"><input class="form-check-input" type="radio" id="formCheck-1" style="width: 25px;height: 18px;" name="respuesta_<?= $num ?>" value="4"><label class="form-check-label otro_color" for="formCheck-1" style="font-size: 18px;">De acuerdo</label></div>
                    <div class="form-check" style="height: 29px;"><input class="form-check-input" type="radio" id="formCheck-1" style="width: 25px;height: 18px;" name="respuesta_<?= $num ?>" value="3"><label class="form-check-label otro_color" for="formCheck-1" style="font-size: 18px;">Neutral</label></div>
                    <div class="form-check" style="height: 29px;"><input class="form-check-input" type="radio" id="formCheck-1" style="width: 25px;height: 18px;" name="respuesta_<?= $num ?>" value="2"><label class="form-check-label otro_color" for="formCheck-1" style="font-size: 18px;">En desacuerdo</label></div>
                    <div class="form-check" style="height: 29px;"><input class="form-check-input" type="radio" id="formCheck-1" style="width: 25px;height: 18px;" name="respuesta_<?= $num ?>" value="1"><label class="form-check-label otro_color" for="formCheck-1" style="font-size: 18px;">Totalmente en desacuerdo</label></div>
                    <hr style="background-color: white;">
                    <?php 
                    $num++;?>
                <?php endforeach; ?>
                </div>
                
                <?= $this->Form->button('guardar', ['class' => " btn btn-primary btn-block"]) ?>
                <?= $this->Form->end() ?>
            </div>
            
            <hr style="background-color: white;">
        </div>
        
    </div>
    

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>