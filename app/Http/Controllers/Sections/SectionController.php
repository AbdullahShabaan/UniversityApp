<?php 

namespace App\Http\Controllers\Sections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section ;

class SectionController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $sections = Section::all();
    return view('sections.show' , compact('sections')) ;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  // public function create()
  // {
    
  // }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    if (Section::where('name->ar' , $request->ArabicName)->orWhere('name->en' , $request->EnglishName)->exists()) {
      toastr()->error(trans('validation.unique_trans'));
      return redirect()->back() ;
    }

    try {

    $request->validate([
      'ArabicName' => 'required' ,
      'EnglishName' => 'required' ,
      'notes' => 'max:200' ,
    ],[

      'ArabicName.required' => trans('validation.required arabic') ,
      'EnglishName.required' => trans('validation.required english') ,

      'notes.max' => "notes must be less than 200char",
    ]);
    
    $sections = new Section () ;
    $sections->name = [ 'en' => $request->EnglishName, 'ar' => $request->ArabicName ] ;
    $sections->notes = $request->notes ;
    $sections->save() ;


       
          toastr()->success( trans('message.success') );
          return redirect('/sections');
        

    }

    catch (\Exception $e) {
      
        toastr()->error($e->getMessage());

        return back();

    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  // public function show($id)
  // {
    
  // }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $section = Section::where( 'id' , $id)->first() ;
    return view ('sections.edit' , compact('section'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(request $request , $id)
  {

    try {
    $request->validate([
      'ArabicName'  => 'unique:sections,name->ar,'.$id ,  
      'EnglishName' => 'unique:sections,name->en,'.$id ,  
      'notes'       => 'max:200'
    ],[

      'ArabicName.unique'  => trans('validation.unique_trans') ,
      'EnglishName.unique'  => trans('validation.unique_trans') ,
    ]);

    $sections = Section::where('id' , $id)->update([
      'name' => ['en' => $request->EnglishName , 'ar' => $request->ArabicName ] ,
      'notes'  => $request->notes ,
    ]);

  
      toastr()->success( trans('message.success') );
      return redirect()->back();

    }

    catch(\Exception $e) {
   
      toastr()->error($e->getMessage());

      return back();

    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy ($id)
  {
    try {

    $sections = Section::where('id' , $id)->delete() ;


          toastr()->success( trans('ShowSections.delete response') );
          return redirect('/sections');
   }


     catch (\Exception $e) {
      
        toastr()->warning(trans('showLevel.destnict'));

        return back();

    }

  }


  
}

?>