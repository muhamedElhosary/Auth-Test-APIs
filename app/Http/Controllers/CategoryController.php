<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Traits\HandleResponseTrait;
class CategoryController extends Controller
{
    //using trait to handle response
    use HandleResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::get();
        return $this->successWithData('here all categories',$category);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $category=Category::find($id);
       if(Gate::allows('update-category',$category))
       {
       $category->name=$request->name;
       $category->update();
       return $this->success('category updated successfully');
       }
       else 
       {
        return $this->error('forbidden');
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $category=Category::find($id);
        if(Gate::allows('update-category',$category)||($request->user()->tokenCan('admin')))
        {
        $category->delete();
        return $this->success('category deleted successfully',200);
        }
        else 
        {
            return $this->error('forbidden');
        }
    }
}
