@extends('layouts.master')
@section('css')
@section('title')
    {{trans('main-sidebar.Departments')}} 
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('main-sidebar.Departments')}} </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

          

    <div class="col-sm-12 col-md-8 col-xl-6 mg-t-20">

                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">{{trans('ShowSections.Add New Department')}}</a>

                    <ul>

                        @error('ArabicName')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror

                        @error('EnglishName')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror

                        @error('notes')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                    </ul>
    </div>
                <!-- Modal effects -->

    <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('ShowSections.Add New Department')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="{{route('sections.store')}}" >
                    @csrf
                    
                        <div class="mb-3">
                            <label id="name" >{{trans('ShowSections.Arabic Department Name')}}</label>
                            <input id="name" value="{{old('name')}}" name="ArabicName" 
                            placeholder=".." type="text" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label id="name" >{{trans('ShowSections.English Department Name')}}</label>
                            <input id="name" value="{{old('name')}}" name="EnglishName" placeholder=".." type="text" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label id="desc" >{{trans('ShowSections.Department Description')}}</label>
                            <input id="desc" value="{{old('description')}}" name ="notes" placeholder=".." type="text" class="form-control" >
                        </div>
    
                        
                    </div>
                    <div class="modal-footer">
                        <input  class="btn ripple btn-primary" type="submit" value="{{trans('ShowSections.Add')}}">
                </form>
                        <button class="btn ripple btn-block" data-dismiss="modal" type="button">{{trans('ShowSections.Close')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal effects-->
   <br>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>{{trans('ShowSections.name')}}</th>
                      <th>{{trans('ShowSections.notes')}}</th>
                      <th>{{trans('ShowSections.control')}}</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($sections as $sections)
                  <tr>
                      <td> {{$loop->iteration}} </td>
                      <td>{{$sections->name}}</td>
                      <td>{{$sections->notes}}</td>
                      <td>
                        <button  data-target="#delete{{$sections->id}}" data-toggle="modal" class='btn btn-danger'>{{trans('ShowSections.Delete')}}</button>
                        <a href='{{route("sections.edit" , $sections->id)}}' class='btn btn-primary'>{{trans('ShowSections.Edit')}}</a>

                      </td>
                  </tr>



                    <div class="modal" id="delete{{$sections->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('ShowSections.delete message')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="{{route('sections.destroy' , $sections->id)}}" >
                    @csrf 
                    @method('DELETE')                                                               <h5> {{$sections->name}} </h5>
                    </div>
                    <div class="modal-footer">
                        <input  class="btn ripple btn-outline-danger" type="submit" value="{{trans('ShowSections.yes')}}">
                        <button class="btn ripple btn-block" data-dismiss="modal" type="submit">{{trans('ShowSections.no')}}</button>
                </form>
                    </div>
                </div>
            </div>
        </div>

                @endforeach
        
              </tbody>
         
              
           </table>
          </div>
          </div>
        </div>   
      </div>
  </div> 

 <!--=================================
 wrapper -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
