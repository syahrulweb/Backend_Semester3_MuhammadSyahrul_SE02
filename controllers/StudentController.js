const Student = require("../models/student");

class StudentController {
  async index(req, res) {
    const students = await Student.all();
    if (students.length > 0) {
      res.json({
        message: "Menampilkan semua students",
        data: students,
      });
    } else {
      res.status(404).json({ message: "Tidak ada data students." });
    }
  }

  async show(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);
    if (student) {
      res.json({
        message: `Menampilkan student dengan id ${id}`,
        data: student,
      });
    } else {
      res.status(404).json({ message: `Student dengan id ${id} tidak ditemukan.` });
    }
  }

  async store(req, res) {
    const { nama, nim, email, jurusan } = req.body;

    if (!nama || !nim || !email || !jurusan) {
      return res.status(400).json({
        message: "Semua field (nama, nim, email, jurusan) wajib diisi.",
      });
    }

    if (isNaN(nim)) {
      return res.status(400).json({ message: "NIM harus berupa angka." });
    }

    const student = await Student.create(req.body);
    res.status(201).json({
      message: "Student berhasil ditambahkan.",
      data: student,
    });
  }

  async update(req, res) {
    const { id } = req.params;
    const { nama, nim, email, jurusan } = req.body;

    if (!nama || !nim || !email || !jurusan) {
      return res.status(400).json({
        message: "Semua field (nama, nim, email, jurusan) wajib diisi.",
      });
    }

    if (isNaN(nim)) {
      return res.status(400).json({ message: "NIM harus berupa angka." });
    }

    const student = await Student.update(id, req.body);
    res.json({
      message: `Student dengan id ${id} berhasil diperbarui.`,
      data: student,
    });
  }

  async destroy(req, res) {
    const { id } = req.params;
    const result = await Student.delete(id);
    res.json({
      message: result.message,
    });
  }
}

module.exports = new StudentController();
