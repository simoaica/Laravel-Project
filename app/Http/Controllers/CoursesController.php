<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Permission;
use App\User;
use App\Role;
use App\Course;
use App\Lesson;

class CoursesController extends Controller
{
  public function base()
  {
    return redirect()->route('courses.dashboard');
  }

  public function dashboard() {
    if (Auth::user()->hasRole(['superadministrator', 'administrator'], false)) {
      $courses = Course::orderBy('id', 'desc')->with('user')->with('lessons')->paginate(10);
    } else {
      $courses = Course::where('author_id', Auth::user()->id)->orderBy('id', 'desc')->with('user')->with('lessons')->paginate(10);
    }
  return view('courses.dashboard')->withCourses($courses);
  }

  public function index()
  {
    return redirect()->route('courses.dashboard');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $courses = Course::with('user')->with('lessons')->get();
    return view('courses.create')->withCourses($courses);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request);
    $this->validate($request, [
      'course_title' => 'required|max:191',
      'course_description' => 'required|max:191'
    ]);

    // Store Course

    $course = new Course;
    $course->title = $request->course_title;
    $course->description = $request->course_description;
    $course->author_id = Auth::id();
    if ($request->course_published) {
      $course->published = true;
    }
    $course->save();
    $course_id = $course->id;

    // Store Lessons from course

    $lessons = json_decode($request->lessons);
    foreach ($lessons as $key => $lesson) {
      $lesson_title = strip_tags($lesson[0]);
      $lesson_description = strip_tags($lesson[1]);
      $lesson_video_id = strip_tags($lesson[2]);
      $lesson_position = (int)strip_tags($lesson[3]);

      $lesson_to_store = new Lesson();
      $lesson_to_store->title =  $lesson_title;
      $lesson_to_store->description = $lesson_description;
      $lesson_to_store->video_id = $lesson_video_id;
      $lesson_to_store->position = $lesson_position;
      $lesson_to_store->course_id = $course_id;

      $lesson_to_store->save();
    }

    Session::flash('success', __('messages.course_created', ['name' => $request->course_title]));
    return redirect()->route('manage.show', $course_id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $course = Course::where('id', $id)->with('lessons')->with('user')->first();
    return view('courses.show')->withCourse($course);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $course = Course::where('id', $id)->with('lessons')->with('user')->first();
    // dd($course);
    return view('courses.edit')->withCourse($course);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // dd($request);
    $this->validate($request, [
      'course_title' => 'required|max:191',
      'course_description' => 'required|max:191'
    ]);

    // Update Course

    $course = Course::where('id', $id)->with('lessons')->with('user')->first();
    $course->title = $request->course_title;
    $course->description = $request->course_description;
    // $course->author_id = Auth::id();
    if ($request->course_published) {
      $course->published = true;
    }else {
      $course->published = false;
    }
    $course->save();

    // Delete Old Lessons from course
    $old_lessons = Lesson::where('course_id', $id)->get(['id']);
    Lesson::destroy($old_lessons->toArray());

    // Store New Lessons for course

    $lessons = json_decode($request->lessons);
    // dd($lessons);
    foreach ($lessons as $key => $lesson) {
      $lesson_title = strip_tags($lesson[0]);
      $lesson_description = strip_tags($lesson[1]);
      $lesson_video_id = strip_tags($lesson[2]);
      $lesson_position = (int)strip_tags($lesson[3]);

      $lesson_to_store = new Lesson();
      $lesson_to_store->title =  $lesson_title;
      $lesson_to_store->description = $lesson_description;
      $lesson_to_store->video_id = $lesson_video_id;
      $lesson_to_store->position = $lesson_position;
      $lesson_to_store->course_id = $id;

      $lesson_to_store->save();
    }

    Session::flash('success', __('messages.course_updated', ['name' => $request->course_title]));
    return redirect()->route('manage.show', $id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $course = Course::findOrFail($id);
      $course_title = $course->title;
      $course->delete();

      $courses = Course::where('author_id', Auth::user()->id)->orderBy('id', 'desc')->with('user')->with('lessons')->paginate(10);
      Session::flash('success', __('messages.course_deleted', ['name' => $course_title]));
      return redirect()->route('courses.dashboard');

  }
}
