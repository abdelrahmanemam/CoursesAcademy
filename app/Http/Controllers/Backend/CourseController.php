<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCreate;
use App\Models\Category;
use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\Image;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = DB::table('courses')
                ->leftJoin('category_course', 'courses.id', '=', 'category_course.course_id')
                ->leftJoin('categories', 'categories.id', '=', 'category_course.category_id')
                ->join('levels', 'levels.id', '=', 'courses.level_id')
                ->join('images', 'images.id', '=', 'courses.image_id')
                ->select(['courses.*', 'categories.name AS category', 'levels.name AS level', 'images.path AS image'])
                ->whereNull('courses.deleted_at');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $edit_link = "courses/"."$row->id"."/edit";

                    if ($row->status == 1)
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="deactivate" class="btn alert-dark btn-sm DeactiveCourse">Deactive</a>';
                    else
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="activate" class="btn success btn-sm ActiveCourse">Active</a>';

                    $btn = $btn.'<a  href="'.$edit_link.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCourse">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCourse">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.course.index');
    }


    public function create()
    {
        return view('backend.course.create',[
            'categories' => Category::all(),
            'levels' => Level::all()
            ]
        );
    }

    public function store(CourseCreate $request)
    {
        if ($request->image) {

            /**
             * Set Image Uniq Name
             * Upload to Path
             */
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/course'), $imageName);
            /**
             * Set Request Image Name
             */
            $imageUrl = url('images/course') . '/' . $imageName;

            $image = Image::create(['path'=>$imageUrl]);

            $request->offsetSet('image_id',$image->id);
        }
        $course = Course::create($request->except('image'));

        if ($course){

            CategoryCourse::create([
                'category_id' => $request->category_id,
                'course_id'   => $course->id
            ]);

            return redirect()->route('backend.courses.index');
        }else{

            return redirect()->refresh();
        }
    }


    public function edit($id)
    {
        return view('backend.course.edit' , [
            'course' => Course::with('categories')
                ->with('level')
                ->findOrFail($id),
            'categories' => Category::all(),
            'levels' => Level::all()
        ]);
    }


    public function update(CourseCreate $request , $id)
    {
        $course = Course::findOrFail($id);

        if (isset($request->image)) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images/course'), $imageName);

            $request->offsetSet('image', url('images/course') . '/' . $imageName);

            $oldImage = $course->image;

            if (isset($oldImage)) {

                $imageUrl = public_path() . '/images/course/' . basename($oldImage);

                if (file_exists($imageUrl)) {
                    unlink($imageUrl);
                }
            }
        }
        if ($course->update($request->all())) {

            return redirect()->route('backend.courses.index');
        }else{

            return redirect()->refresh();
        }

    }


    public function destroy($id)
    {
        $record = Course::findOrFail($id);

        if($record->delete()){

            redirect()->refresh();
        } else {
            return response(['item not exist']);
        }
    }


    public function active($id)
    {
        $record = Course::find($id);
        if($record) {

            $record->update(['status' => 1]);

        }else{

            return response(['item not exist']);
        }
    }

    public function deactive($id)
    {
        $record = Course::find($id);
        if($record) {

            $record->update(['status' => 0]);

        }else{

            return response(['item not exist']);
        }
    }
}
