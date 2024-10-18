<?php

#note "n\" untuk garis baru di output

# if : membuat satu kondisi
$nilai = 90;

if ($nilai > 90) {
    echo "Peringkat Anda A\n";
}

echo "\n";  


#else if : 2 kondisi atau lebih
$nilai = 91;

if ($nilai > 90) {
    echo "Peringkat Anda A\n";
} else if ($nilai > 80) {
    echo "Peringkat Anda B\n";
}

echo "\n";  

#else : kondisi terakhir ketika semua tidak terpenuhi
$nilai = 0;

if ($nilai > 90) {
    echo "Peringkat Anda A\n";
} else if ($nilai > 80) {
    echo "Peringkat Anda B\n";
} else {
    echo "Peringkat Anda C\n";
}

?>
