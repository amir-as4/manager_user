<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->paginate(20);
        return  view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories=Category::where('parent_id',0)->get();
        $attributes=Attribute::all();
        return view('admin.categories.create',compact('attributes','parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'parent_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'exists:attributes,id',
            'attribute_is_filter_ids' => 'required',
            'attribute_is_filter_ids.*' => 'exists:attributes,id',
            'variation_id' => 'required|exists:attributes,id',
        ]);
        try {
            DB:: beginTransaction();
            $category=Category::create([
                'name'=>$request->name,
                'slug'=>str_replace(' ','-',$request->slug),
                'parent_id'=>$request->parent_id,
                'icon'=>$request->icon,
                'description'=>$request->description,
                'is_active'=>$request->is_active
            ]);
            foreach ($request->attribute_ids as $attributeId){
                $attribute=Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id,[
                    'is_filter'=>in_array($attributeId,$request->attribute_is_filter_ids) ?1:0,
                    'is_variation'=>$attributeId==$request->variation_id ?1:0
                ]);
            }
            DB::commit();
        }catch (\Exeption $ex){
            DB::rollBack();
            alert()->error('???????? ???? ?????????? ???????? ????????', $ex->getMessage())->persistent('??????');
            return redirect()->back();
        }
        alert()->success('???????? ???????? ???????? ???? ???????????? ?????????? ????','???? ????????');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parentCategories=Category::where('parent_id',0)->get();
        $attributes=Attribute::all();
        return view('admin.categories.edit',compact('category','parentCategories','attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id,
            'parent_id' => 'required',
            'attribute_ids' => 'required',
            'attribute_ids.*' => 'exists:attributes,id',
            'attribute_is_filter_ids' => 'required',
            'attribute_is_filter_ids.*' => 'exists:attributes,id',
            'variation_id' => 'required|exists:attributes,id',
        ]);
        try {
            DB:: beginTransaction();
            $category->update([
                'name'=>$request->name,
                'slug'=>str_replace(' ','-',$request->slug),
                'parent_id'=>$request->parent_id,
                'icon'=>$request->icon,
                'description'=>$request->description,
                'is_active'=>$request->is_active
            ]);
            $category->attributes()->detach();
            foreach ($request->attribute_ids as $attributeId){
                $attribute=Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id,[
                    'is_filter'=>in_array($attributeId,$request->attribute_is_filter_ids) ?1:0,
                    'is_variation'=>$attributeId==$request->variation_id ?1:0
                ]);
            }
            DB::commit();
        }catch (\Exeption $ex){
            DB::rollBack();
            alert()->error('???????? ???? ???????????? ???????? ????????', $ex->getMessage())->persistent('??????');
            return redirect()->back();
        }
        alert()->success('???????? ????????  ???? ???????????? ???????????? ????','???? ????????');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCategoryAttribute(Category $category)
    {
        $attributes=$category->attributes()->where('is_variation',0)->get();
        $variation=$category->attributes()->where('is_variation',1)->first();
        return ['attributes'=>$attributes,'variation'=>$variation];
    }
}
