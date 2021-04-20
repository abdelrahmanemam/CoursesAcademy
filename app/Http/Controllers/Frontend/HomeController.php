<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(){

//        dd(Course::with('level')
//                ->with('image')
//                ->where('status', 1)
//                ->where(function ($query) use($request) {
//                    $query->where('courses.name', 'LIKE', '%' . $request->search . "%")
//                        ->orWhereHas('categories', function ($q) use ($request) {
//                            $q->where('categories.name', 'LIKE', '%' . $request->search . "%");
//                    });
//                })
//                ->withTrashed()
//                ->toSql()
//        );

            $categories = Category::all();
            $levels     = Level::all();
            $courses    = Course::where('status', 1)
                            ->with('categories')
                            ->with('level')
                            ->with('image')
                            ->paginate(5);

            return view('frontend.welcome', [
                'categories' => $categories,
                'levels'     => $levels,
                'courses'    => $courses
            ]);

    }

    public function indexPaginate(Request $request){
        if ($request->ajax()) {

            return view('frontend.data_section', [
                'categories' => Category::all(),
                'levels'     => Level::all(),
                'courses'    => Course::where('status', 1)
                                    ->with('categories')
                                    ->with('level')
                                    ->with('image')
                                    ->paginate(5)

            ])->render();
        }
    }

    public function login()
    {
        return view('frontend.cashier.login');
    }

    public function loginCheck(Request $request)
    {
        if(auth('cashier')->attempt($request->only('username', 'password'))){

            return redirect()->route('home');
        }
        return back()->withErrors(['Username Or Password Was Incorrect!']);
    }

    public function logout(){

        auth('cashier')->logout();
        return redirect()->route('login');
    }


    public function filter(Request $request)
    {
        if ($request->ajax()) {

            if ($request->by == 'search') {

                $courses = Course::with('level')
                    ->with('image')
                    ->where('status', 1)
                    ->where(function ($query) use($request) {
                        $query->where('courses.name', 'LIKE', '%'.$request->search.'%')
                            ->orWhereHas('categories', function ($q) use ($request) {
                                $q->where('categories.name', 'LIKE', '%'.$request->search.'%');
                            });
                    })
                    ->withTrashed()
                    ->paginate(5);

            }elseif($request->by == 'filter') {

                $data = [];

                $st_data = explode('&' , $request->data);

                foreach ($st_data as $st){

                    $exp = explode('=' , $st);

                    $data [$exp[0]] = $exp[1];
                }

                $courses = Course::with('level')
                    ->with('image')
                    ->where('status', 1)
                    ->where(
                        function ($query) use ($data) {
                            if ($data['category_id'] > 0) {
                                $query->orWhereHas('categories', function ($q) use ($data) {
                                    $q->where('categories.id', '=', $data['category_id']);
                                });
                            }
                            if ($data['level_id']> 0){
                                $query->where('level_id', '=', $data['level_id']);
                            }
                            if ($data['rating'] > 0) {
                                $query->where('rating', '=', $data['rating']);
                            }
                        }
                    )
                    ->paginate(5);
            }
            return view('frontend.data_section', ['courses'=>$courses])->render();
        }
    }

}
