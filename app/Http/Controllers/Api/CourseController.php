<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;
#use App\Models\Course; // Commented because we are using the repository pattern And the repository pattern is responsible for accessing the model
use App\Repositories\CourseRepository;


class CourseController extends Controller
{

    protected $repository;

    public function __construct(CourseRepository $repository) // Injecting the repository
    {
        $this->repository = $repository;
    }

    public function index()
    {

        
        $courses = $this->repository->getAllCourses(); // Using the repository to access the model
        
        return CourseResource::collection($courses);
    }

    // public function index()
    // {
    //     $courses = Course::get();

    //     return CourseResource::collection($courses);
    // } // Commented because we are using the repository pattern And the repository pattern is responsible for accessing the model

    // public function show($id)
    // {
    //     $course = Course::findorFail($id);
    //     //$course = Course::find($id);

    //     return new CourseResource($course);
    // }

    public function show($id)
    {
        $course = $this->repository->getCourse($id); // Using the repository to access the model
        return new CourseResource($course); // Returning the resource/transformer to filter the data
    }
}
