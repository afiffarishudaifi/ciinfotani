dsafds

<?php
foreach ($cekpanen as $a) :
    $hasilcekpanen = $a['KTP'];
endforeach;

echo $hasilcekpanen;

foreach ($cekktp as $hasil) :
    $hasilktp = $hasil['KTP'];
endforeach;


if ($hasilktp == 0) {
    echo $hasilktp;
} else{
    echo "Tidak ada";
}
?>