<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class TutorQuizController extends Controller
{
    public function index()
    {
        $tutorId = auth()->guard('tutor')->id();
        
        // Ambil semua course milik tutor ini
        // $courses = Course::where('tutor_id', $tutorId)->get();
        // $coba = Course::all();
        $courses = Course::where('tutor_id', $tutorId)->get();
        return view('tutor.content.quiz', compact('courses', 'tutorId'));
    }

    public function create($courseId, $week)
    {
        $course = Course::findOrFail($courseId);
        $existingQuiz = Quiz::where('course_id', $courseId)
                            ->where('week', $week)
                            ->first();

        if ($existingQuiz) {
            return redirect()->route('tutor.quizzes.show', [$courseId, $week])
                            ->with('error', 'Quiz untuk minggu ini sudah dibuat.');
        }

        return view('tutor.quiz.create', compact('course', 'week'));
    }
    public function store(Request $request, $courseId, $week)
    {
        $validated = $request->validate([
            'questions' => 'required|array',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.option_a' => 'required|string|max:255',
            'questions.*.option_b' => 'required|string|max:255',
            'questions.*.option_c' => 'required|string|max:255',
            'questions.*.option_d' => 'required|string|max:255',
            'questions.*.correct_answer' => 'required|in:a,b,c,d',
        ]);

        foreach ($request->questions as $questionData) {
                Quiz::create([
                    'course_id' => $courseId,
                    'week' => $week,
                    'question' => $questionData['question'],
                    'option_a' => $questionData['option_a'],
                    'option_b' => $questionData['option_b'],
                    'option_c' => $questionData['option_c'],
                    'option_d' => $questionData['option_d'],
                    'correct_answer' => $questionData['correct_answer'],
                ]);
            }

        return redirect()->route('tutor.quizzes.index')->with('success', 'Quiz berhasil disimpan.');
    }

    public function show($courseId, $week)
    {
        $tutorId = auth()->guard('tutor')->id();
        $quiz = Quiz::where('course_id', $courseId)
                   ->where('week', $week)
                   ->get();

        if (!$quiz) {
            return redirect()->back()->with('error', 'Quiz belum tersedia.');
        }
        $course = Course::where('id', $courseId)
                    ->where('tutor_id', $tutorId)
                    ->firstOrFail();

            return view('tutor.quiz.show', [
            'quizzes' => $quiz,
            'course' => $course,
            'week' => $week,
        ]);
    }
    public function destroy($courseId, $week)
    {
        $tutorId = auth()->guard('tutor')->id();

        // Hapus semua quiz untuk minggu ini dalam satu course
        Quiz::where('course_id', $courseId)
            ->where('week', $week)
            ->whereHas('course', function ($query) use ($tutorId) {
                $query->where('tutor_id', $tutorId);
            })->delete();

        return redirect()->route('tutor.quizzes.index')->with('success', 'Quiz minggu tersebut berhasil dihapus.');
    }

}
