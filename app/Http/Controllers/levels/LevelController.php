<?php

namespace App\Http\Controllers\levels;

use App\Models\Level;
use App\Models\Section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $level = Level::all() ;
        $section = Section::all() ;

        return view ('levels.show' , compact ('level' , 'section')) ; 


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
            $data = $request->list ;

        try {

       $request->validate([
            'list.*.name' => 'required',
            'list.*.section_id' => 'required',
        ]); 


        if (empty($data)) {
           toastr()->error('required');
            return back();
        }     


            foreach($data as $level) {
                $level = Level::create([
                    'name' => $level['name'] , 
                    'section_id' => $level['section_id'] , 
                ]);

            }

             toastr()->success(trans('showLevel.added successfully'));
            return back();

        }


        catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
        }

   
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|unique:levels,name,'.$id,
        // ]);

        $level = Level::findOrFail($id)->update([
            'name' => $request->name ,
            'section_id' => $request->section_id,
        ]);

        toastr()->success("Done");
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , $id)
    {
        try {
        $level = Level::findOrFail($id)->delete() ;
        toastr()->success(trans('showLevel.deleted successfully'));
        return redirect()->back();

        }

        catch (\Exception $e) {

            toastr()->error($e->getMessage());
            return back();

        }
    }

    public function destroyAll (request $request) {
        try {
        $delete = explode ( ',' , $request->delete_all_id) ;

        $delete_all = Level::whereIn('id' , $delete)->delete() ;
        toastr()->success(trans('showLevel.deleted successfully'));
        return redirect()->back();
       }

       catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back();
       }
    }

    public function levelsFilter (request $request) {

        $level = Level::where('section_id' , $request->filter)->get() ; 
        $section = Section::all() ;

        return view ('levels.show' , compact ( 'section' , 'level')) ;

    }
}
