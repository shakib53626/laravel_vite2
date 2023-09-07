<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StudentResource::collection(student::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = student::create($request->validated());
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, student $student)
    {
        $student->update($request->validated());
        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
        return response()->json(['message' => 'Data Deleted Successfully'],200);
    }
}
