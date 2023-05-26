<?php

// Matriks kriteria
$kriteria = [
  [1, 2, 4],
  [0.5, 1, 3],
  [0.25, 0.33, 1]
];

// Matriks alternatif
$alternatif = [
  [2, 3, 4],
  [3, 4, 5],
  [4, 5, 6]
];

// Bobot kriteria
$bobot_kriteria = [];
for ($i=0; $i<count($kriteria); $i++) {
  $sum = 0;
  for ($j=0; $j<count($kriteria[$i]); $j++) {
    $sum += $kriteria[$j][$i];
  }
  $bobot_kriteria[] = $sum / count($kriteria);
}

// Normalisasi matriks kriteria
$normalisasi_kriteria = [];
for ($i=0; $i<count($kriteria); $i++) {
  for ($j=0; $j<count($kriteria[$i]); $j++) {
    $normalisasi_kriteria[$i][$j] = $kriteria[$i][$j] / $bobot_kriteria[$j];
  }
}

// Bobot alternatif
$bobot_alternatif = [];
for ($i=0; $i<count($alternatif); $i++) {
  $sum = 0;
  for ($j=0; $j<count($alternatif[$i]); $j++) {
    $sum += $normalisasi_kriteria[$j][$i] * $bobot_kriteria[$j];
  }
  $bobot_alternatif[] = $sum / count($alternatif[$i]);
}

// Ranking alternatif
arsort($bobot_alternatif);

echo "Ranking Alternatif:\n";
foreach ($bobot_alternatif as $alternatif => $bobot) {
  echo "Alternatif " . ($alternatif+1) . ": " . $bobot . "\n";
}

?>

<!-- Penjelasan singkat mengenai kode di atas:

Pertama-tama, kita buat matriks kriteria dan matriks alternatif sebagai masukan dari pengguna.
Selanjutnya, kita hitung bobot kriteria dengan menghitung rata-rata dari setiap kolom di matriks kriteria.
Setelah itu, kita normalisasi matriks kriteria dengan membagi setiap elemen dengan bobot kriteria pada kolom yang sama.
Kemudian, kita hitung bobot alternatif dengan mengalikan setiap elemen pada matriks normalisasi kriteria dengan bobot kriteria yang sesuai, kemudian menjumlahkan hasilnya untuk setiap baris di matriks alternatif dan dibagi dengan jumlah elemen di baris tersebut.
Akhirnya, kita ranking alternatif berdasarkan bobot alternatif yang sudah dihitung sebelumnya, dengan menggunakan fungsi arsort() untuk mengurutkan bobot secara menurun. -->