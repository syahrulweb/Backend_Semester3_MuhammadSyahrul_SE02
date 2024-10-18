<?php

class Animal {
    private $animals;

    // Constructor - mengisi data awal
    public function __construct($data) {
        $this->animals = $data;
    }

    // Method index - menampilkan data animals
    public function index() {
        foreach ($this->animals as $animal) {
            echo "- " . $animal . "\n";
        }
    }

    // Method store - menambahkan hewan baru
    public function store($data) {
        $this->animals[] = $data;
        echo "$data telah ditambahkan.\n";
    }

    // Method update - memperbarui data
    public function update($index, $data) {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            echo "Hewan pada index $index telah diperbarui menjadi $data.\n";
        } else {
            echo "Index tidak valid.\n";
        }
    }

    // Method destroy - menghapus hewan
    public function destroy($index) {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            echo "Hewan pada index $index telah dihapus.\n";
        } else {
            echo "Index tidak valid.\n";
        }
    }
}

// Membuat object dengan nama yang berbeda, misalnya $animalCollection
$animalCollection = new Animal(["Ayam", "Ikan"]);

echo "Index - Menampilkan seluruh hewan\n";
$animalCollection->index();
echo "\n";

echo "Store - Menambahkan hewan baru (burung)\n";
$animalCollection->store("burung");
$animalCollection->index();
echo "\n";

echo "Update - Mengupdate hewan\n";
$animalCollection->update(0, "Kucing Anggora");
$animalCollection->index();
echo "\n";

echo "Destroy - Menghapus hewan\n";
$animalCollection->destroy(1);
$animalCollection->index();
echo "\n";

?>
