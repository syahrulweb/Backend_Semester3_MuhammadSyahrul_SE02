<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller {
    // Properti animals (array)
    protected $animals = ['kucing', 'ayam', 'ikan'];

    // Method untuk menampilkan seluruh data animals
    public function index() {
        // Menampilkan data animals
        echo "Menampilkan data animals:<br>";
        foreach ($this->animals as $animal) {
            echo "- " . $animal . "<br>";
        }
    }

    // Method untuk menambahkan hewan baru
    public function store(Request $request) {
        // Menambahkan hewan baru ke dalam array animals
        $newAnimal = $request->input('animal');
        $this->animals[] = $newAnimal;

        // Menampilkan pesan dan data animals setelah penambahan
        echo "Menambahkan hewan baru<br>";
        $this->index(); // Panggil method index untuk menampilkan semua data animals
    }

    // Method untuk memperbarui data hewan
    public function update(Request $request, $id) {
        // Memperbarui data hewan berdasarkan id
        $updatedAnimal = $request->input('animal');
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $updatedAnimal;
        }

        // Menampilkan pesan dan data animals setelah pembaruan
        echo "Mengupdate data hewan id $id<br>";
        $this->index(); // Panggil method index untuk menampilkan semua data animals
    }

    // Method untuk menghapus data hewan
    public function destroy($id) {
        // Menghapus data hewan berdasarkan id
        if (isset($this->animals[$id])) {
            unset($this->animals[$id]);
        }

        // Menampilkan pesan dan data animals setelah penghapusan
        echo "Menghapus data hewan id $id<br>";
        $this->index(); // Panggil method index untuk menampilkan semua data animals
    }
}
