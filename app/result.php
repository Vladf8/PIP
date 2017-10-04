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
				$time = microtime();
				$validate = true;
				$matches = '';
				$x =  $_GET['x'];
				$y =  $_GET['y'];
				$r =  $_GET['r'];
				$regInt = "/^[-?\d]+$/";
				$regFloat = "/^[-?\d]+[.|,]?[\d]*$/";
				if ((preg_match($regInt, $x, $matches) == 1) &&
					(preg_match($regFloat, $y, $matches) == 1) &&
					(preg_match($regInt, $r, $matches) == 1) &&
					$x <= 4 && $x >= -4 &&
					$y <= 3 && $y >= -3 &&
					$r <= 5 && $r >= 1 )
					$validate = true;
				else
					$validate = false;
				$strike = true;
			?>
			<center>
			<img src = "../pics/areas.png"><p>
			<?php
			    echo "<p>Координаты точки: (";
			    $str=wordwrap($y, 3, "\n",1);
			    echo $x;
			    echo "; ";
			    echo "$str";
			    echo ")<p>Значение R: ";
			    echo $r;
			    echo "<br>";
				if ($validate){
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
					$time = microtime() - $time;
					echo "Скрипт выполнялся ";
					echo $time;
					echo " секунд";
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
				}
				else
					echo "Данные введены неверно";
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
						$str=wordwrap($_SESSION['y'][$i], 3,"\n",1) ;
						echo "$str";
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
			<a href="../index.html" style="color: red">Назад</a>
		</center>
		</div>
	</body>
</html>
