/**
 * TODO 3:
 * - Import fruits dari data/fruits.js
 * - Refactor variabel ke ES6 variable
 */

const fruits = require('../data/fruits');


/**
 * TODO 4: Buat method index
 * TODO 5: Buat method store
 * TODO 6: Buat method update
 * TODO 7: Buat method destroy
 */

/**
 * Method untuk menampilkan semua buah
 */
const index = () => {
    console.log("Method index - Menampilkan Buah");
    fruits.forEach((fruit) => console.log(fruit));
  };
  
  /**
   * Method untuk menambahkan buah baru
   * @param {string} name - Nama buah baru
   */
  const store = (name) => {
    fruits.push(name);
    console.log(`Method store - Menambahkan buah ${name}`);
    console.log(fruits.join("\n"));
  };
  
  /**
   * Method untuk memperbarui buah pada posisi tertentu
   * @param {number} position - Posisi buah yang ingin diupdate
   * @param {string} name - Nama baru buah
   */
  const update = (position, name) => {
    if (position >= 0 && position < fruits.length) {
      fruits[position] = name;
      console.log(`Method update - Update data ${position} menjadi ${name}`);
      console.log(fruits.join("\n"));
    } else {
      console.log("Invalid position");
    }
  };
  
  /**
   * Method untuk menghapus buah pada posisi tertentu
   * @param {number} position - Posisi buah yang ingin dihapus
   */
  const destroy = (position) => {
    if (position >= 0 && position < fruits.length) {
      fruits.splice(position, 1);
      console.log(`Method destroy - Menghapus data ${position}`);
      console.log(fruits.join("\n"));
    } else {
      console.log("Invalid position");
    }
  };
  
  // Export semua method
  module.exports = { index, store, update, destroy };