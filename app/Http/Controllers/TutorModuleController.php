<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TutorModuleController extends Controller
{
    public function index($courseId)
    {
        $tutor = Auth::guard('tutor')->user();

        $course = Course::with(['modules', 'users'])
            ->where('tutor_id', $tutor->id)
            ->findOrFail( $courseId );
            
        return view('tutor.content.courses', compact('course'));
    }

    public function create(Course $course, $week)
    {
        return view('tutor.modules.create', compact('course', 'week'));
    }

    public function store(Request $request, Course $course, $week)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240'
        ]);

        $filePath = $request->file('file')->store('modules', 'public');

        Module::create([
            'course_id' => $course->id,
            'week' => $week,
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $filePath
        ]);

        return redirect()->route('tutor.courses.modules', $course->id)->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit(Course $course, $week)
    {
        $module = $course->modules()->where('week', $week)->firstOrFail();
        return view('tutor.modules.edit', compact('course', 'module', 'week'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // max 10 MB misal
        ]);

        $module->title = $request->title;
        $module->content = $request->content;

        if ($request->hasFile('file')) {
            // hapus file lama kalau ada
            if ($module->file_path && Storage::exists($module->file_path)) {
                Storage::delete($module->file_path);
            }
            $module->file_path = $request->file('file')->store('modules');
        }

        $module->save();

        return redirect()->route('tutor.courses.modules', $module->course_id)
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Module $module)
    {
        // hapus file dulu jika ada
        if ($module->file_path && Storage::exists($module->file_path)) {
            Storage::delete($module->file_path);
        }
        $module->delete();

        return redirect()->route('tutor.courses.modules', $module->course_id)
            ->with('success', 'Materi berhasil dihapus.');
    }


}
