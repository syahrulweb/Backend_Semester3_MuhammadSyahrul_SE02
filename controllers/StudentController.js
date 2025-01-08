// Import model Student
const Student = require("../models/student");

class StudentController {
  // Menampilkan semua data students
  async index(req, res) {
    try {
      const students = await Student.all(); // Ambil data siswa dari model
      res.json({
        message: "Menampilkan semua students",
        data: students,
      });
    } catch (err) {
      res.status(500).json({
        message: "Terjadi kesalahan saat mengambil data siswa",
        error: err.message,
      });
    }
  }

  // Menambahkan data student baru
  async store(req, res) {
    try {
      const student = await Student.create(req.body); // Menambahkan siswa baru
      res.status(201).json({
        message: "Menambahkan data student",
        data: student,
      });
    } catch (err) {
      res.status(500).json({
        message: "Terjadi kesalahan saat menambahkan data siswa",
        error: err.message,
      });
    }
  }
}

module.exports = new StudentController();
