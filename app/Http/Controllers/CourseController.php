<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $courses = Course::latest()->get();

    return view('courses.index', compact('courses'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('courses.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'code' => ['required', 'max:20', 'unique:courses,code'],
        'name' => ['required', 'max:120'],
        'description' => ['nullable', 'string'],
        'fee' => ['required', 'integer', 'min:0'],
        'quota' => ['required', 'integer', 'min:1', 'max:500'],
        'start_date' => ['required', 'date'],
        'status' => ['required', 'in:draft,open,closed'],
    ]);

    Course::create($data);

    return to_route('courses.index')
        ->with('success', 'Kursus berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
