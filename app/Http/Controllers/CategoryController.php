<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $cats = Category::orderBy('id', 'desc')->get();
        return view('Category.index', compact('cats'));
    }

    public function fetchAll(Request $request) {
        $cats = Category::all();
        $output = '';
        if($cats->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Catgegory Name</th>
                        <th>Category Status</th>
                        <th>Action</th>
                    </tr>
                </thead> 
                <tbody>';
            foreach($cats as $cat) {
                $output .='<tr>
                    <td>'.$cat->id.'</td>
                    <td>'.$cat->cat_name.'</td>
                    <td>
                        
                    </td>
                    <td>
                        <a href="#" id="' . $cat->id . '" class="text-success mx-1 editIcon" 
                        data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                            <i class="bi-pencil-square h4"></i>
                        </a>
                        <a href="" id="'.$cat->id.'" class="text-danger mx-1 deleteIcon">
                            <i class="bi-trash h4"></i>
                        </a>
                    </td>
                </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">Không có dữ liệu</h1>';
        }
    }

    public function store(Request $request) {
        $catData = [
            'cat_name' => $request->cat_name,
            'cat_status' => $request->cat_status
        ];
        Category::create($catData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function edit(Request $request) {
        $id = $request->id;
        $cat = Category::find($id);
        // dd($cat);
        return response()->json($cat);
    }

    public function update(Request $request) {
        $cat = Category::find($request->id);
        $catData = [
            'cat_name' => $request->cat_name,
            'id' => $request->id,
        ];
        $cat->update($catData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        Category::destroy($id);
    }

    public function active(Request $request) {
        $id = $request->id;
        $cat = Category::find($id);
        // dd($cat);
        return response()->json($cat);
    }

    public function performActive(Request $request) {
        Category::where('id', $request->id)->update([
            'cat_status' => $request->cat_status
        ]);
        return response()->json([
            'status' => 200
        ]);
    }
}
