<!DOCTYPE html>
<html>
	<head>
		<title>Laboratory work 1</title>
		<link href="../css/style.css" rel="stylesheet">
        <meta charset="UTF-8">
	</head>
	<body>
		<header>
			<h1>Лабораторная работа №1</h1>
			<h3>Выполнили: Хлопков Д.С., Фищенко В. P3217</h3>
			<h3>Проверил: Николаев В.В.</h3>
		</header>
		<div>
		<?php 
			$x =  $_GET['x'];
			$y =  $_GET['y'];
			$r =  $_GET['r'];
		?>
		<img src = "../pics/areas.png"><p>
		<p>Координаты точки: <?php echo $x;?> , <?php echo $y;?>
		<p>Значение R: <?php echo $r;?> <br>
			<?php
				if ($x <= 0){
					if ($y <= 0)
						if ($y >= -$x - $r)
							echo "Точка попадает в область";
						else echo "Точка не попадает в область";
					else
						if ($x*$x+$y*$y <= $r*$r)
							echo "Точка попадает в область";
						else echo "Точка не попадает в область";
				}
				else
					if ($y >= 0)
						if ($x<=$r && $y <= $r/2)
							echo "Точка попадает в область";
						else echo "Точка не попадает в область";
					else echo "Точка не попадает в область";
				
			?>
		</div>
	</body>
</html>
