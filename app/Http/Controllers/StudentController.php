<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        
        $response = [
            'message' => 'Success Showing All Students Data',
            'data' => $students
        ];

        return response()->json($response, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = [
        'name' => $request->name,
        'nim' => $request->nim,
        'email' => $request->email,
        'majority' => $request->majority
       ];

       $students = Student::create($input);
                    
       $response = [
        'message' => 'Successfully create new student',
        'data' => $students
       ];
       
       return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirim
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:students,nim,' . $id,
            'email' => 'required|email|unique:students,email,' . $id,
            'majority' => 'required|string|max:255',
        ]);
    
        // Cari student berdasarkan ID
        $student = Student::find($id);
    
        // Jika data student tidak ditemukan
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    
        // Update data student
        $student->name = $request->name;
        $student->nim = $request->nim;
        $student->email = $request->email;
        $student->majority = $request->majority;
        $student->save();
    
        // Response setelah data berhasil diperbarui
        $response = [
            'message' => 'Successfully updated student',
            'data' => $student
        ];
    
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari student berdasarkan ID
        $student = Student::find($id);
    
        // Jika data student tidak ditemukan
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
    
        // Hapus data student
        $student->delete();
    
        // Response setelah data berhasil dihapusw7tf
        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
    }
    
}
