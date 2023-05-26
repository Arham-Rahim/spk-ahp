<?php
echo "<h2>Perbandingan Berpasangan Kriteria</h2>";
	echo "<form method='post'>";
	echo "<table border='1'>";
	echo "<tr><td></td><td>C1</td><td>C2</td><td>C3</td></tr>";
	echo "<tr><td>C1</td>";
	for ($j=0; $j<3; $j++) {
		echo "<td><input type='text' name='c1$j' value=''></td>";
	}
	echo "</tr>";
	echo "<tr><td>C2</td>";
	for ($j=0; $j<3; $j++) {
		echo "<td><input type='text' name='c2$j' value=''></td>";
	}
	echo "</tr>";
	echo "<tr><td>C3</td>";
	for ($j=0; $j<3; $j++) {
		echo "<td><input type='text' name='c3$j' value=''></td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' name='submit_kriteria' value='Hitung Bobot'>";
	echo "</form>";


?>