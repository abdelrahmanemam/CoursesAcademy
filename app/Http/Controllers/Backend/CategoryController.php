<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreate;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Category::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $edit_link = "categories/"."$row->id"."/edit";

                    if ($row->status == 1)
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="deactivate" class="btn alert-dark btn-sm DeactiveCategory">Deactive</a>';
                    else
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="activate" class="btn success btn-sm ActiveCategory">Active</a>';

                    $btn = $btn.'<a  href="'.$edit_link.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCategory">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategory">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.category.index');
    }


    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryCreate $request)
    {
        $category = Category::create($request->only('name' , 'status'));

        if ($category){

            return redirect()->route('backend.categories.index');
        }else{

            return redirect()->refresh();
        }
    }


    public function edit($id)
    {
        return view('backend.category.edit' , [
            'category' => Category::findOrFail($id)
        ]);
    }


    public function update(CategoryCreate $request , $id)
    {
        $category = Category::findOrFail($id);

        if ($category->update($request->only('name' , 'status'))) {

            return redirect()->route('backend.categories.index');
        }else{

            return redirect()->refresh();
        }

    }


    public function destroy($id)
    {
        $record = Category::findOrFail($id);

        if($record->delete()){

            return redirect()->route('backend.categories.index');
        } else {
            return response(['item not exist']);
        }
    }


    public function active($id)
    {
        $record = Category::find($id);
        if($record) {

            $record->update(['status' => 1]);

        }else{

            return response(['item not exist']);
        }
    }

    public function deactive($id)
    {
        $record = Category::find($id);
        if($record) {

            $record->update(['status' => 0]);

        }else{

            return response(['item not exist']);
        }
    }
}
