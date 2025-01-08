// Import database
const db = require("../config/database");

class Student {
  // Method untuk mengambil semua data students
  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students";
      db.query(sql, (err, results) => {
        if (err) reject(err); // Jika ada error, reject promise
        resolve(results); // Jika tidak ada error, resolve dengan data
      });
    });
  }

  // Method untuk menambahkan data student
  static create(data) {
    return new Promise((resolve, reject) => {
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data, (err, results) => {
        if (err) reject(err); // Jika ada error, reject promise
        resolve({ id: results.insertId, ...data }); // Resolve dengan data yang baru dimasukkan
      });
    });
  }
}

module.exports = Student;
