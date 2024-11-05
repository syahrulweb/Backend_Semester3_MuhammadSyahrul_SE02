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
# mendapatkan detail resource student
# membuat method show
public function show($id) {
    # cari id student yang ingin didapatkan
    $student = Student::find($id);

    if ($student) {
        $data = [
            'message' => 'Get detail student',
            'data' => $student,
        ];

        # mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Student not found',
        ];

        # mengembalikan data (json) dan kode 404
        return response()->json($data, 404);
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        # cari id student yang ingin diupdate
        $student = Student::find($id);
    
        if ($student) {
            # menangkap data request
            $input = [
                'name' => $request->name ?? $student->name,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'majority' => $request->majority ?? $student->majority
            ];
    
            # melakukan update data
            $student->update($input);
    
            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];
    
            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
    
            return response()->json($data, 404);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        # cari id student yang ingin dihapus
        $student = Student::find($id);
    
        if ($student) {
            # hapus student tersebut
            $student->delete();
    
            $data = [
                'message' => 'Student is deleted'
            ];
    
            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
    
            return response()->json($data, 404);
        }
    }
    
    
}
