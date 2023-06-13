<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Level ;
use Illuminate\Support\Facades\DB;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $section = Section::with('groups')->get() ;
        // foreach($section as $g) {

        //     foreach($g->groups as $gi) {
        //         return $gi->name ;
        //     }

        // }
        // return $section ; die ;
        $all_sections = Section::all();
         return view('groups.show' , compact('section' , 'all_sections')) ;
    }

    /**
     * Show the form for creating a new resource.
     */

    // ajax function
    public function getLevel($id) 
    {
        $level = DB::table('levels')->where('section_id' , $id)->pluck('name' , 'id') ;

        return json_encode($level);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ArabicName'  => 'required|max:20|unique:groups,name->ar',
            'EnglishName' => 'required|max:20|unique:groups,name->en',
            'section_id'  => 'required',
            'level_id'    => 'required',
        ]);

        try {

        $group = Group::create([
            'name'      => ['en' => $request->EnglishName , 'ar' => $request->ArabicName ] ,
            'sectionID' => $request->section_id , 
            'levelID'   => $request->level_id ,
        ]);

          toastr()->success( trans('message.success') );
          return redirect('/groups');
      }

      catch (\Exception $e) {

          toastr()->error( $e->getMessage() );
          return redirect('/groups');
      }

    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $request->validate([
            'ArabicName'  => 'required|max:20|unique:groups,name->ar,'.$id,
            'EnglishName' => 'required|max:20|unique:groups,name->en,'.$id,
            'section_id'  => 'required',
            'level_id'    => 'required',
        ]);

        try {

        $group = Group::findOrFail($id)->update([
            'name'      => ['en' => $request->EnglishName , 'ar' => $request->ArabicName ] ,
            'sectionID' => $request->section_id , 
            'status'    => $request->status ,
            'levelID'   => $request->level_id ,
        ]);

          toastr()->success( trans('message.success') );
          return redirect('/groups');
      }

      catch (\Exception $e) {

          toastr()->error( $e->getMessage() );
          return redirect('/groups');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , $id)
    {
        try {

            $group = Group::findOrFail($id)->delete() ;
            toastr()->success( trans('message.delete') );
            return redirect('/groups');

        }

        catch (\Exception $e) {
          toastr()->error( $e->getMessage() );
          return redirect('/groups');
        }
    }
}
