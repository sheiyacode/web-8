<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCourseController extends Controller
{
    // Tampilkan daftar semua kursus
    public function course()
    {
        $courses = Course::with('tutor')->get();
        return view('admin.content.course', compact('courses'));
    }

    public function create()
    {
        $tutors = Tutor::all(); // Untuk dropdown pilihan tutor
        return view('admin.content.course_create', compact('tutors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tutor_id' => 'required|exists:tutors,id',
            'duration' => 'required|string|max:50',
            
        ]);
        

        $filename = null;
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('courses', 'public');
        }

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
            'tutor_id' => $request->tutor_id,
            'duration' => $request->duration,
        ]);

        return redirect()->route('admin.course')->with('success', 'Kursus berhasil ditambahkan.');
    }


        // Form edit kursus
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $tutors = Tutor::all();

        return view('admin.content.course_edit', compact('course', 'tutors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tutor_id' => 'required|exists:tutors,id',
            'duration' => 'required|string|max:50',
        ]);

        $course = Course::findOrFail($id);

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('courses', 'public');
            $course->image = $filename;
        }

        $course->title = $request->title;
        $course->description = $request->description;
        $course->tutor_id = $request->tutor_id;
        $course->class = $request->class;
        $course->duration = $request->duration;
        $course->save();

        return redirect()->route('admin.course')->with('success', 'Kursus berhasil diperbarui.');
    }
        public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // Hapus gambar jika ada
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('admin.course')->with('success', 'Kursus berhasil dihapus.');
    }


}
