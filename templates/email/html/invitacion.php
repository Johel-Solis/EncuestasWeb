<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>encuesta</title>
</head>
<body>
	<table style="max-width: 500px; padding: 10px; margin: 0 auto; border-collapse: collapse;">
		<tr>
			<td style="padding: 0;">
				<img style="display: block; padding: 0; margin: 0 auto;" src="https://i.postimg.cc/V63N8BQz/logo-lobos-bienvenidos.png">
			</td>
		</tr>
		<tr>
			<td style="background-color: #ecf0f1">
				<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify; font-family: sans-serif;">
					<h1 style="color: rgb(206, 55, 48); margin: 0 0 7px;">Encuesta sobre la pagina <?php echo $url_en?> </h1>
                    <p style="margin: 2px; font-size: 15px">
						Hola querido usuario, queremos saber tu experimentada opinion respecto a la pagina <?php echo $url_en?> , para mejorar todo lo posible y prestar un mejor servicio.
					</p>
					<div style="width: 100%; margin: 20px auto; display: inline-block; text-align: center; ">
						<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db; margin: 0 auto" href="http://localhost/encuestas/evaluations/responder_encuesta/<?php echo $token?>">Ir a la Encuesta</a>
					</div>
					<p style="color: #A2A2A2; font-size: 12px; text-align: center; margin: 30px 0 0;">
						Sitio encuestas Lobos.
					</p>
				</div>
			</td>
		</tr>
	</table>
    
</body>
</html>