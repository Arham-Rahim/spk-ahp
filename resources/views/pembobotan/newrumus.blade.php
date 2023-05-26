<!DOCTYPE html>
<html>
<head>
	<title>Form dan Matrix Perbandingan Berpasangan AHP</title>
</head>
<body>
	<h1>Form dan Matrix Perbandingan Berpasangan AHP</h1>

	<?php
		// inisialisasi variabel bobot kriteria
		$bobot_kriteria = array(
			array(1, 3, 5),
			array(1/3, 1, 3),
			array(1/5, 1/3, 1)
		);
		// inisialisasi variabel bobot alternatif
		$bobot_alternatif = array(
			array(1, 1/3, 3),
			array(3, 1, 5),
			array(1/3, 1/5, 1)
		);

		// fungsi untuk menghitung nilai konsistensi
		function hitung_konsistensi($matriks) {
			$jumlah_baris = count($matriks);
			$jumlah_kolom = count($matriks[0]);
			$jumlah_eigen = array();
			$lambda_max = 0;
			$CI = 0;
			$CR = 0;

			// hitung jumlah eigen tiap baris
			for ($i=0; $i<$jumlah_baris; $i++) {
				$jumlah = 0;
				for ($j=0; $j<$jumlah_kolom; $j++) {
					$jumlah += $matriks[$i][$j];
				}
				$jumlah_eigen[] = $jumlah;
			}

			// hitung lambda max
			for ($i=0; $i<$jumlah_baris; $i++) {
				$lambda_max += $jumlah_eigen[$i];
			}
			$lambda_max /= $jumlah_baris;

			// hitung CI
			if ($jumlah_baris == 1) {
				$CI = 0;
			} else {
				$CI = ($lambda_max - $jumlah_baris) / ($jumlah_baris - 1);
			}

			// hitung CR
			$IR = array(0, 0, 0, 0, 0, 0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49);
			$n = $jumlah_baris;
			if ($n <= 15) {
				$CR = $CI / $IR[$n];
			} else {
				$CR = "n/a";
			}

			return array(
				"jumlah_eigen" => $jumlah_eigen,
				"lambda_max" => $lambda_max,
				"CI" => $CI,
				"CR" => $CR
			);
		}

		// hitung konsistensi bobot kriteria
		$konsistensi_kriteria = hitung_konsistensi($bobot_kriteria);

		// hitung konsistensi bobot alternatif
		$konsistensi_alternatif = array();
		for ($i=0; $i<count($bobot_alternatif); $i++) {
			$konsistensi_alternatif[] = hitung_konsistensi($bobot_alternatif[$i]);
	}

	// tampilkan form untuk input bobot kriteria
	echo "<h2>Perbandingan Berpasangan Kriteria</h2>";
	echo "<form method='post'>";
	echo "<table border='1'>";
	echo "<tr><td></td><td>C1</td><td>C2</td><td>C3</td></tr>";
	echo "<tr><td>C1</td>";
	for ($j=0; $j<3; $j++) {
		echo "<td><input type='text' name='c1$j' value='" . $bobot_kriteria[0][$j] . "'></td>";
	}
	echo "</tr>";
	echo "<tr><td>C2</td>";
	for ($j=0; $j<3; $j++) {
		echo "<td><input type='text' name='c2$j' value='" . $bobot_kriteria[1][$j] . "'></td>";
	}
	echo "</tr>";
	echo "<tr><td>C3</td>";
	for ($j=0; $j<3; $j++) {
		echo "<td><input type='text' name='c3$j' value='" . $bobot_kriteria[2][$j] . "'></td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' name='submit_kriteria' value='Hitung Bobot'>";
	echo "</form>";

	// tampilkan konsistensi bobot kriteria
	if (isset($_POST["submit_kriteria"])) {
		$bobot_kriteria = array(
			array($_POST["c10"], $_POST["c11"], $_POST["c12"]),
			array(1/$_POST["c10"], $_POST["c21"], $_POST["c22"]),
			array(1/$_POST["c11"], 1/$_POST["c21"], $_POST["c32"])
		);
		$konsistensi_kriteria = hitung_konsistensi($bobot_kriteria);
		echo "<p>Bobot Kriteria:</p>";
		echo "<table border='1'>";
		echo "<tr><td>C1</td><td>" . $konsistensi_kriteria["jumlah_eigen"][0] . "</td><td>" . $bobot_kriteria[0][0] . "</td><td>" . $bobot_kriteria[0][1] . "</td><td>" . $bobot_kriteria[0][2] . "</td></tr>";
		echo "<tr><td>C2</td><td>" . $konsistensi_kriteria["jumlah_eigen"][1] . "</td><td>" . round(1/$bobot_kriteria[1][0], 2) . "</td><td>" . $bobot_kriteria[1][1] . "</td><td>" . $bobot_kriteria[1][2] . "</td></tr>";
		echo "<tr><td>C3</td><td>" . $konsistensi_kriteria["jumlah_eigen"][2] . "</td><td>" . round(1/$bobot_kriteria[2][0], 2) . "</td><td>" . round(1/$bobot_kriteria[2][1], 2) . "</td><td>" . $bobot_kriteria[2][2] . "</td></tr>";
		echo "</table>";
// tampilkan form untuk input bobot alternatif
echo "<h2>Perbandingan Berpasangan Alternatif</h2>";
for ($i=0; $i<$jumlah_alternatif; $i++) {
echo "<h3>Alternatif " . ($i+1) . "</h3>";
echo "<form method='post'>";
echo "<table border='1'>";
echo "<tr><td></td><td>A1</td><td>A2</td><td>A3</td><td>A4</td></tr>";
echo "<tr><td>A1</td>";
for ($j=0; $j<$jumlah_alternatif; $j++) {
echo "<td><input type='text' name='a" . ($i+1) . "" . ($j+1) . "' value='" . $bobot_alternatif[$i][$j] . "'></td>";
}
echo "</tr>";
echo "<tr><td>A2</td>";
for ($j=0; $j<$jumlah_alternatif; $j++) {
echo "<td><input type='text' name='a" . ($i+2) . "" . ($j+1) . "' value='" . (1/$bobot_alternatif[$j][$i]) . "' readonly></td>";
}
echo "</tr>";
echo "<tr><td>A3</td>";
for ($j=0; $j<$jumlah_alternatif; $j++) {
echo "<td><input type='text' name='a" . ($i+3) . "" . ($j+1) . "' value='" . (1/$bobot_alternatif[$i][$j]) . "' readonly></td>";
}
echo "</tr>";
echo "<tr><td>A4</td>";
for ($j=0; $j<$jumlah_alternatif; $j++) {
echo "<td><input type='text' name='a" . ($i+4) . "" . ($j+1) . "' value='" . $bobot_alternatif[$j][$i] . "' readonly></td>";
}
echo "</tr>";
echo "</table>";
echo "<input type='submit' name='submit_alternatif" . ($i+1) . "' value='Hitung Bobot'>";
echo "</form>";
if (isset($_POST["submit_alternatif" . ($i+1)])) {
			$bobot_alternatif[$i] = array(
				array($_POST["a" . ($i+1) . "1"], $_POST["a" . ($i+1) . "2"], $_POST["a" . ($i+1) . "3"], $_POST["a" . ($i+1) . "4"]),
				array($_POST["a" . ($i+2) . "1"], $_POST["a" . ($i+2) . "2"], $_POST["a" . ($i+2) . "3"], $_POST["a" . ($i+2) . "4"]),
				array($_POST["a" . ($i+3) . "1"], $_POST["a" . ($i+3) . "2"], $_POST["a" . ($i+3) . "3"], $_POST["a" . ($i+3) . "4"]),
				array($_POST["a" . ($i+4) . "1"], $_POST["a" . ($i+4) . "$j"], $_POST["a" . ($i+4) . "" . ($j+1) . ""]),
);

$jumlah_kolom = count($bobot_alternatif[$i][0]);
$jumlah_baris = count($bobot_alternatif[$i]);
$jumlah_bobot = $jumlah_baris * $jumlah_kolom;
$sum_kolom = array();
$eigenvektor_kolom = array();
for ($k=0; $k<$jumlah_kolom; $k++) {
$sum = 0;
for ($l=0; $l<$jumlah_baris; $l++) {
$sum += $bobot_alternatif[$i][$l][$k];
}
$sum_kolom[$k] = $sum;
}
$sum_bobot = 0;
for ($k=0; $k<$jumlah_kolom; $k++) {
$eigenvektor_kolom[$k] = $sum_kolom[$k] / array_sum($sum_kolom);
$sum_bobot += $eigenvektor_kolom[$k];
}
$konsistensi = 0;
for ($k=0; $k<$jumlah_kolom; $k++) {
$konsistensi += ($sum_kolom[$k] * $eigenvektor_kolom[$k]);
}
$konsistensi = ($konsistensi / $sum_bobot - $jumlah_bobot) / ($jumlah_bobot - 1);
echo "<p>Konsistensi Bobot Alternatif: " . number_format($konsistensi, 4) . "</p>";
		}
	}
	
	// tampilkan matrix perbandingan berpasangan kriteria
	echo "<h2>Perbandingan Berpasangan Kriteria</h2>";
	echo "<form method='post'>";
	echo "<table border='1'>";
	echo "<tr><td></td><td>C1</td><td>C2</td><td>C3</td><td>C4</td></tr>";
	echo "<tr><td>C1</td>";
	for ($j=0; $j<$jumlah_kriteria; $j++) {
		echo "<td><input type='text' name='c1" . ($j+1) . "' value='" . $bobot_kriteria[0][$j] . "'></td>";
	}
	echo "</tr>";
	echo "<tr><td>C2</td>";
	for ($j=0; $j<$jumlah_kriteria; $j++) {
		echo "<td><input type='text' name='c2" . ($j+1) . "' value='" . (1/$bobot_kriteria[0][$j]) . "' readonly></td>";
	}
	echo "</tr>";
	echo "<tr><td>C3</td>";
	for ($j=0; $j<$jumlah_kriteria; $j++) {
		echo "<td><input type='text' name='c3" . ($j+1) . "' value='" . (1/$bobot_kriteria[0][$j]) . "' readonly></td>";
	}
	echo "</tr>";
	echo "<tr><td>C4</td>";
	for ($j=0; $j<$jumlah_kriteria; $j++) {
		echo "<td><input type='text' name='c4" . ($j+1) . "' value='" . $bobot_kriteria[3][$j] . "'></td>";
}
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<input type='submit' value='Hitung'>";
echo "</form>";
// hitung bobot kriteria
$bobot_kriteria = array();
	for ($i=0; $i<$jumlah_kriteria; $i++) {
		for ($j=0; $j<$jumlah_kriteria; $j++) {
			$bobot_kriteria[$i][$j] = $_POST["c" . ($i+1) . "" . ($j+1)];
		}
	}
	$jumlah_kolom = count($bobot_kriteria[0]);
	$jumlah_baris = count($bobot_kriteria);
	$jumlah_bobot = $jumlah_baris * $jumlah_kolom;
	$sum_kolom = array();
	$eigenvektor_kolom = array();
	for ($k=0; $k<$jumlah_kolom; $k++) {
		$sum = 0;
		for ($l=0; $l<$jumlah_baris; $l++) {
			$sum += $bobot_kriteria[$l][$k];
		}
		$sum_kolom[$k] = $sum;
	}
	$sum_bobot = 0;
	for ($k=0; $k<$jumlah_kolom; $k++) {
		$eigenvektor_kolom[$k] = $sum_kolom[$k] / array_sum($sum_kolom);
		$sum_bobot += $eigenvektor_kolom[$k];
	}
	$konsistensi = 0;
	for ($k=0; $k<$jumlah_kolom; $k++) {
		$konsistensi += ($sum_kolom[$k] * $eigenvektor_kolom[$k]);
	}
	$konsistensi = ($konsistensi / $sum_bobot - $jumlah_bobot) / ($jumlah_bobot - 1);
	
	echo "<p>Konsistensi Bobot Kriteria: " . number_format($konsistensi, 4) . "</p>";
	echo "<h2>Hasil Akhir</h2>";
	
	// hitung nilai preferensi untuk setiap alternatif
	$preferensi = array();
	for ($i=0; $i<$jumlah_alternatif; $i++) {
		$sum = 0;
		for ($j=0; $j<$jumlah_kriteria; $j++) {
			$sum += ($bobot_alternatif[$j][$i] * $eigenvektor_kolom[$j]);
		}
		$preferensi[$i] = $sum;
	}
	
	// tampilkan tabel hasil akhir
	echo "<table border='1'>";
	echo "<tr><td>No</td><td>Nama Alternatif</td><td>Nilai Preferensi</td></tr>";
	for ($i=0; $i<$jumlah_alternatif; $i++) {
		echo "<tr>";
		echo "<td>" . ($i+1) . "</td>";
		echo "<td>" . $nama_alternatif[$i] . "</td>";
		echo "<td>" . number_format($preferensi[$i], 4) . "</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	// jika belum submit form, tampilkan form input
	echo "<h2>Masukkan Data</h2>";
	echo "<form method='post'>";
	echo "<h3>Kriteria</h3>";
	echo "<table border='1'>";
	echo "<tr><td>Kriteria</td><td>Bobot</td><td>Bobot</td><td>Bobot</td><td>Bobot</td></tr>";
	for ($i=0; $i<$jumlah_kriteria; $i++) {
		echo "<tr>";
		echo "<td>" . $nama_kriteria[$i] . "</td>";
		echo "<td><input type='text' name='b" . ($i+1) . "'></td>";
		for ($j=0; $j<$jumlah_kriteria; $j++) {
			echo "<td><input type='text' name='c" . ($i+1) . "" . ($j+1) . "'></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "<br>";
	echo "<h3>Alternatif</h3>";
	echo "<table border='1'>";
	echo "<tr><td>Alternatif</td><td>Kriteria 1</td><td>Kriteria 2</td><td>Kriteria 3</td><td>Kriteria 4</td></tr>";
	for ($i=0; $i<$jumlah_alternatif; $i++) {
		echo "<tr>";
		echo "<td>" . $nama_alternatif[$i] . "</td>";
		for ($j=0; $j<$jumlah_kriteria; $j++) {
			echo "<td><input type='text' name='a" . ($i+1) . "" . ($j+1) . "'></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "<br>";
	echo "<input type='submit' value='Hitung'>";
	echo "</form>";
} ?>

</body>
</html>