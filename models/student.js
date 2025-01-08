const db = require("../config/database");

class Student {
  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students";
      db.query(sql, (err, results) => {
        if (err) reject(err);
        resolve(results);
      });
    });
  }

  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students WHERE id = ?";
      db.query(sql, [id], (err, results) => {
        if (err) reject(err);
        resolve(results[0]);
      });
    });
  }

  static create(data) {
    return new Promise((resolve, reject) => {
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data, (err, results) => {
        if (err) reject(err);
        this.find(results.insertId)
          .then((student) => resolve(student))
          .catch((err) => reject(err));
      });
    });
  }

  static update(id, data) {
    return new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ? WHERE id = ?";
      db.query(sql, [data, id], (err, results) => {
        if (err) reject(err);
        resolve({ id, ...data });
      });
    });
  }

  static delete(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM students WHERE id = ?";
      db.query(sql, [id], (err, results) => {
        if (err) reject(err);
        resolve({ message: `Student dengan id ${id} berhaisl dihapus` });
      });
    });
  }
}

module.exports = Student;
