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
            <h4 class="mb-0">{{trans('ShowSections.Edit Section')}} </h4>
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

   <br>
    <!-- main body --> 
    <div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">
                <!-- row -->
                <div class="row">
                                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                        <div class="card  box-shadow-0">
                            <div class="card-header">
                                <h4 class="card-title mb-1"></h4>
                            </div>
                            <div class="card-body pt-0">
                                <form class="form-horizontal" method='post' action='{{route("sections.update" , $section->id)}}'
                            >
                                @csrf
                                @method('PUT')
<br>
                                    <label>{{trans('ShowSections.Arabic Department Name')}} </label>
                                    <div class="form-group">
                                        <input type="text" name="ArabicName" class="form-control" value="{{$section->getTranslation('name' , 'ar')}}" placeholder="...">
                                    </div>
<br>
                                    <label>{{trans('ShowSections.English Department Name')}} </label>
                                    <div class="form-group">
                                        <input type="text" name="EnglishName" class="form-control"
                                        value="{{$section->getTranslation('name' , 'en')}}"  placeholder="...">
                                    </div>
                                    <br>
                                    <label>{{trans('ShowSections.notes')}} </label>
                                    <div class="form-group">
                                        <input type="text" name="notes" value="{{$section->notes}}" class="form-control"  placeholder="...">
                                    </div>
                                
                    <ul>
                        @error('name')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror

                        @error('description')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                    </ul>
                                    <div class="form-group mb-0 mt-3 justify-content-end">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href='{{url()->previous()}}' class="btn btn-secondary">Back</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- row closed -->                
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
