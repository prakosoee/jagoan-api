<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseDetailResource;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(
        private CourseService $courseService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = $this->courseService->getAllCourse();
        return ApiResponse::responseWithData(CourseResource::collection($course), 'Course berhasil ditampilkan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $courseRequest = $request->validated();
        $course = $this->courseService->createCourse($courseRequest);
        return ApiResponse::responseWithData(new CourseResource($course), 'Course berhasil dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = $this->courseService->findCourse($id);
        return ApiResponse::responseWithData(new CourseDetailResource($course), "Course ".$course->name." Berhasil ditampilkan" );
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
    public function update(UpdateCourseRequest $request, $id)
    {
        $courseRequest = $request->validated();
        $course = $this->courseService->updateCourse($courseRequest, $id);
        return ApiResponse::responseWithData(new CourseResource($course), 'Course berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->courseService->deleteCourse($id);
        return ApiResponse::response('Course berhasil dihapus');
    }
}
