// Import express dan controller
const express = require("express");
const StudentController = require("../controllers/StudentController");

// Membuat router
const router = express.Router();

// Define routes
router.get("/students", StudentController.index); // GET semua students
router.post("/students", StudentController.store); // POST student baru

module.exports = router;
