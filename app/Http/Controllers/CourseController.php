<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil kata kunci pencarian
        $search = trim((string) $request->query('q'));

        // Mengambil filter status
        $status = trim((string) $request->query('status'));

        // Status yang diperbolehkan
        $allowedStatuses = ['open', 'closed', 'draft'];

        // Mengambil data kursus
        $courses = Course::query()

            // Fitur pencarian berdasarkan kode dan nama kursus
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            })

            // Fitur filter berdasarkan status
            ->when(
                in_array($status, $allowedStatuses, true),
                function ($query) use ($status) {
                    $query->where('status', $status);
                }
            )

            // Mengurutkan berdasarkan nama kursus
            ->orderBy('name')

            // Pagination 10 data setiap halaman
            ->paginate(10)

            // Mempertahankan pencarian dan filter saat pindah halaman
            ->withQueryString();

        // Jika permintaan AJAX, tampilkan partial view saja
        if ($request->boolean('partial')) {
            return view('courses._results', compact('courses'));
        }

        // Jika bukan AJAX, tampilkan halaman utama
        return view('courses.index', compact(
            'courses',
            'search',
            'status'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource.
     */
    public function update(
        UpdateCourseRequest $request,
        Course $course
    ) {
        $course->update($request->validated());

        return to_route('courses.show', $course)
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}
