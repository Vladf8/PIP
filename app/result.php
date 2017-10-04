<?php 
session_start();
?>
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
				$strike = true;
			?>
			<center>
			<img src = "../pics/areas.png"><p>
			<p>Координаты точки: (<?php echo $x;?> ; <?php echo $y;?>)
			<p>Значение R: <?php echo $r;?> <br>
			<?php
				if ($x <= 0){
					if ($y <= 0)
						if ($y >= -$x - $r)
							$strike = true;
						else $strike = false;
					else
						if ($x*$x+$y*$y <= $r*$r)
							$strike = true;
						else $strike = false;
				}
				else
					if ($y >= 0)
						if ($x<=$r && $y <= $r/2)
							$strike = true;
						else $strike = false;
					else $strike = false;
				if ($strike){
					echo "Точка попадает в область.<br>";
				}
				else {
					echo "Точка не попадает в область.<br>";
				}
				if (!isset($_SESSION['x'])) {
					$_SESSION['x'] = array($x);
				} else {
					$_SESSION['x'][] = $x;
				}
				if (!isset($_SESSION['y'])) {
					$_SESSION['y'] = array($y);
				} else {
					$_SESSION['y'][] = $y;
				}
				if (!isset($_SESSION['r'])) {
					$_SESSION['r'] = array($r);
				} else {
					$_SESSION['r'][] = $r;
				}
				if (!isset($_SESSION['strike'])) {
					$_SESSION['strike'] = array($strike);
				} else {
					$_SESSION['strike'][] = $strike;
				}
			?>
			<table border = "1">
				<caption>Таблица всех значений и их попаданий</caption>
				<tr>
					<th>x</th>
					<th>y</th>
					<th>r</th>
					<th>Попадает в область?</th>
				</tr>
				<?php
					for ($i = 0; $i < sizeof($_SESSION['strike']); $i++){
						echo "<tr>";
						echo "<td>";
						echo $_SESSION['x'][$i];
						echo "</td>";
						echo "<td>";
						echo $_SESSION['y'][$i];
						echo "</td>";
						echo "<td>";
						echo $_SESSION['r'][$i];
						echo "</td>";
						echo "<td>";
						if ($_SESSION['strike'][$i])
							echo "Попадает";
						else echo "Не попадает";
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
			<a href="https://se.ifmo.ru/~s223375/" style="color: red">Назад</a>
		</center>
		</div>
	</body>
</html>
