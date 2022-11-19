<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;
use App\Models\Course;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();

        return CourseResource::collection($courses);
    }
}
