// Import express dan controller
const express = require("express");
const StudentController = require("../controllers/StudentController");

// Membuat router
const router = express.Router();

// Define routes
router.get("/students", StudentController.index); // GET semua students
router.get("/students/:id", StudentController.show); // GET satu student
router.post("/students", StudentController.store); // POST student baru
router.put("/students/:id", StudentController.update); // PUT update student
router.delete("/students/:id", StudentController.destroy); // DELETE student

module.exports = router;

