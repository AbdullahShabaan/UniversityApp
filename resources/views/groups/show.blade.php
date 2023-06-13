@extends('layouts.master')
@section('css')

@section('title')
{{trans('groups.groups list')}}@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
              <div class="col-sm-12 col-md-8 col-xl-6 mg-t-20">

                        <a class="modal-effect btn btn-success btn-block" data-effect="effect-sign" data-toggle="modal" href="#exampleModal">{{trans('groups.Add new group')}}</a>

    </div>
                    <ul>

                        @error('ArabicName')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror

                        @error('EnglishName')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror

                        @error('section_id')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                         @error('level_id')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                    </ul>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('groups.Add new group')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form method="post" action="{{route('groups.store')}}" >
                    @csrf
                    
                        <div class="form-group">
                            <label id="name" >{{trans('groups.Arabic Name')}}</label>
                            <input id="name" value="{{old('name')}}" name="ArabicName" 
                            placeholder=".." type="text" class="form-control" >
                   
                            <label id="name" >{{trans('groups.English Name')}}</label>
                            <input id="name" value="{{old('name')}}" name="EnglishName" placeholder=".." type="text" class="form-control" >
                        </div>

                        <div class="form-group">
                              <label for="message-text" class="col-form-label">{{trans('groups.select section')}}</label>
                            <select class="form-control form-control-lg" name="section_id" onchange="console.log($(this).val())">
                                        <option selected disabled value="">...</option>
                                    @foreach($all_sections as $sec)
                                        <option value="{{$sec->id}}">{{$sec->name}}</option>
                                    @endforeach                                                   
                            </select>
                        </div>

                        <div class="form-group">
                              <label for="message-text" class="col-form-label">{{trans('groups.select level')}}</label>
                            <select class="form-control form-control-lg" name="level_id" >  
                                 <option selected disabled value="">...</option>
                            </select>
                        </div>
    
                        
                    </div>
                    <div class="modal-footer">
                        <input  class="btn ripple btn-success" type="submit" value="{{trans('ShowSections.Add')}}">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
      </div>

    </div>
  </div>
</div>
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
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                   <div class="col-xl-12 mb-30">     
                        <div class="card card-statistics h-100"> 
                          <div class="card-body">   
                           <h5 class="card-title">{{trans('groups.groups list')}}</h5>
                           <div class="accordion plus-icon shadow">

                            @foreach($section as $sec) 
                              <div class="acd-group">
                                  <a href="#" class="acd-heading">{{ $sec->name }}</a>
                                  <div class="acd-des">
                                      <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">{{trans('groups.name')}}</th>
                                              <th scope="col">{{trans('groups.level')}}</th>
                                              <th scope="col">{{trans('groups.status')}}</th>
                                              <th scope="col">{{trans('groups.control')}}</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                @foreach($sec->groups as $g)
                                            <tr>
                                              <th scope="row">{{$loop->iteration}}</th>
                                              <td>{{ $g->name }}</td>
                                              <td>{{ $g->level->name}}</td>
                                              <td>
                                                @if ($g->status == 1)
                                                <p class="badge badge-success">{{trans('groups.active')}}</p>
                                                @else
                                                <p class="badge badge-danger">{{trans('groups.pending')}}</p>
                                                @endif
                                              </td>
                                              <td>

                                                <button  data-target="#delete{{$g->id}}" data-toggle="modal" class='btn btn-danger'>{{trans('ShowSections.Delete')}}</button>
                                                <a href='#editmodal/{{$g->id}}' data-toggle="modal" class='btn btn-primary'>{{trans('ShowSections.Edit')}}</a>

                                              </td>
                                            </tr> 

<div class="modal fade" id="editmodal/{{$g->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('ShowSections.Edit')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('groups.update' , $g->id)}}" method="post">
            @csrf
            @method('PUT')
               <div class="form-group">
                            <label id="name" >{{trans('groups.Arabic Name')}}</label>
                            <input id="name" value="{{$g->getTranslation('name' , 'ar')}}" name="ArabicName" 
                            type="text" class="form-control" >
                   
                            <label id="name" >{{trans('groups.English Name')}}</label>
                            <input id="name" value="{{$g->getTranslation('name' , 'en')}}" name="EnglishName" placeholder=".." type="text" class="form-control" >
                        </div>

                        <div class="form-group">
                              <label for="message-text" class="col-form-label">{{trans('groups.select section')}}</label>
                            <select class="form-control form-control-lg" name="section_id" onchange="console.log($(this).val())">
                                    @foreach($all_sections as $sec)                                  
                                        <option 
                                        @if($g->sectionID == $sec->id)
                                        selected
                                        @endif
                                        value="{{$sec->id}}">{{$sec->name}}</option>
                                    @endforeach                                                   
                            </select>
                        </div>

                        <div class="form-group">
                              <label for="message-text" class="col-form-label">{{trans('groups.select level')}}</label>
                            <select class="form-control form-control-lg" name="level_id" >  
                                 <option selected  value="{{$g->level->id}}">{{$g->level->name}}</option>
                            </select>
                        </div>

                         <div class="form-group">
                              <label for="message-text" class="col-form-label">{{trans('groups.status')}}</label>
                            <select class="form-control form-control-lg" name="status" >  
                                 <option   
                                 @if($g->status == 0)
                                 selected
                                 @endif
                                   value="0">{{trans('groups.pending')}}</option>
                                 <option 
                                 @if($g->status == 1)
                                 selected
                                 @endif
                                   value="1">{{trans('groups.active')}}</option>
                            </select>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">{{trans('ShowSections.Add')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>

        <div class="modal" id="delete{{$g->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('ShowSections.delete message')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="{{route('groups.destroy' , $g->id)}}" >
                    @csrf 
                    @method('DELETE')                                                               <h5> {{$g->name}}</h5>
                    </div>
                    <div class="modal-footer">
                        <input  class="btn btn-danger" type="submit" value="{{trans('ShowSections.yes')}}">
                        <button class="btn btn-secondary " data-dismiss="modal" type="submit">{{trans('ShowSections.no')}}</button>
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
                            @endforeach
                      
                          </div>
                          </div>
                        </div>   
                 </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
            <script>
                $(document).ready(function () {
                    $('select[name="section_id"]').on('change', function () {
                        var section_id = $(this).val();
                        if (section_id) {
                            $.ajax({
                                url: "{{ URL::to('getLevel') }}/" + section_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="level_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="level_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });

            </script>
@endsection










        