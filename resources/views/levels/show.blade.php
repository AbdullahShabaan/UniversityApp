@extends('layouts.master')
@section('css')
@section('title')
    {{trans('showLevel.level list')}} 
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('showLevel.level list')}}  </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>checkbox select all bootstrap
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

          

                    <div>
                        <a class="modal-effect btn btn-primary" data-effect="effect-sign" data-toggle="modal" href="#exampleModal">{{trans('showLevel.Add level')}}</a>
                        <a class="btn btn-outline-danger" data-effect="effect-sign" data-toggle="modal" id="btn_delete_all" >{{trans('showLevel.delete all')}}</a>
                    </div>
                         <div class="form-group m-2">
                            <form action="{{route ('Filter_Classes')}}" method="POST">
                                @csrf
                            <select class="form-control form-control-lg" name="filter" 
                               onchange="this.form.submit()" >
                                  <option selected disabled>Search by section</option>
                                  @foreach($section as $sec)
                                    <option value="{{$sec->id}}">{{$sec->name}}</option>
                                  @endforeach
                                                                                   
                            </select>
                            </form>
                      </div>

                    <ul>
                        @error('name')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                        @error('section_id')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                          @error('list.name')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                            @error('list.section_id')
                            <li class="alert alert-danger">{{ $message }}</li>
                        @enderror
                    </ul>





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
                       <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                      <th>#</th>
                      <th>{{trans('showLevel.level')}}</th>
                      <th>{{trans('showLevel.section')}}</th>
                      <th>{{trans('ShowSections.control')}}</th>
                  </tr>
              </thead>
              <tbody>

      

                
           @foreach ($level as $lv )


                  <tr>
                      <td>
                        <div class="form-check">
                          <input class="box1" type="checkbox" value="{{$lv->id}}" >                       
                        </div>
                      </td>
                      <td> {{$loop->iteration}}</td>
                      <td>
                          @if ($lv->name == 1 )
                          {{trans('showLevel.level one')}}
                          @elseif($lv->name == 2 )
                          {{trans('showLevel.level two')}}
                          @elseif($lv->name == 3 )
                          {{trans('showLevel.level three')}}
                          @elseif($lv->name == 4 )
                          {{trans('showLevel.level four')}}
                          @elseif($lv->name == 5 )
                          {{trans('showLevel.level five')}}
                          @endif
                      </td>
                      <td>{{$lv->Section->name}}</td>
                      <td>                     
                        <a data-effect="effect-sign" data-toggle="modal" href='#editmodel{{$lv->id}}' class='btn btn-primary'>edit</a>
                        <a data-effect="effect-sign" data-toggle="modal" href='#delete{{$lv->id}}' class='btn btn-danger'>delete</a>

                      </td>
                  </tr>


<div class="modal fade" id="editmodel{{$lv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{trans('showLevel.edit level')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('levels.update' , $lv->id)}}">
            @csrf
            @method("PUT")
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">{{trans('showLevel.Select Level')}}</label>
            <select class="form-control form-control-lg" aria-label="Default select example" name="name">                           
                <option 
                  @if( $lv->name == 1 )
                  selected 
                  @endif
                  value="1">{{trans('showLevel.level one')}}</option>
                <option 
                   @if($lv->name == 2 )
                  selected 
                  @endif
                  value="2">{{trans('showLevel.level two')}}</option>
                <option 
                   @if($lv->name == 3 )
                  selected 
                  @endif
                  value="3">{{trans('showLevel.level three')}}</option>
                <option 
                   @if($lv->name == 4 )
                  selected 
                  @endif
                  value="4">{{trans('showLevel.level four')}}</option>
                <option 
                   @if($lv->name == 5 )
                  selected 
                  @endif
                  value="5">{{trans('showLevel.level five')}}</option>
                                                
             </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">{{trans('showLevel.Select Section')}}</label>
            <select class="form-control form-control-lg" name="section_id">
                @foreach($section as $sec)
                    <option 
                    @if($sec->id == $lv->section_id)
                    selected
                    @endif
                    value="{{$sec->id}}">{{$sec->name}}</option>
                @endforeach                                                   
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('showLevel.cancel')}}</button>
        <input type="submit" value="{{trans('showLevel.save')}}" class="btn btn-primary">
      </div>
        </form>
    </div>
  </div>
</div>



<!-- delete effect -->
        <div class="modal" id="delete{{$lv->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('ShowSections.delete message')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="{{ route('levels.destroy' , $lv->id )}}" >
                    @csrf 
                    @method('DELETE')                                                            <h6>
                      {{$lv->Section->name}} 
                      /
                      @if($lv->name == 1 )
                      {{trans('showLevel.level one')}} 
                      @elseif($lv->name == 2 )
                      {{trans('showLevel.level two')}}
                      @elseif($lv->name == 3 )
                      {{trans('showLevel.level three')}}
                      @elseif($lv->name == 4 )
                      {{trans('showLevel.level four')}}
                      @elseif($lv->name == 5 )
                      {{trans('showLevel.level five')}}
                      @endif
                    </h6>
                       
                    </div>
                    <div class="modal-footer">
                        <input  class="btn ripple btn-outline-danger" type="submit" value="{{trans('ShowSections.yes')}}">
                        <button class="btn ripple btn-block" data-dismiss="modal" type="submit">{{trans('ShowSections.no')}}</button>
                </form>
                    </div>
                </div>
            </div>
        </div>

<!-- end delete effect -->

<!-- delete effect -->
        <div class="modal" id="delete_all">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('showLevel.are you sure')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                <form method="post" action="{{ url('levelsDestroyAll')}}" >
                    @csrf 
                   <h6>            
                    </h6>
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>
                    <div class="modal-footer">
                        <input  class="btn btn-danger" type="submit" value="{{trans('ShowSections.yes')}}">
                        <button class="btn ripple btn-block" data-dismiss="modal" type="submit">{{trans('ShowSections.no')}}</button>
                </form>
                    </div>
                </div>
            </div>
        </div>

<!-- end delete effect -->


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

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('showLevel.Add level') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{route('levels.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="list">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">
                                                {{trans('showLevel.select level')}}
                                                </label>

                                            <div class="box">
                                                <select class="fancyselect" name="name">
                                                  
                                                        <option value="1">{{trans('showLevel.level one')}}</option>
                                                        <option value="2">{{trans('showLevel.level two')}}</option>
                                                        <option value="3">{{trans('showLevel.level three')}}</option>
                                                        <option value="4">{{trans('showLevel.level four')}}</option>
                                                         <option value="5">{{trans('showLevel.level five')}}</option>
                                                 
                                                 
                                                </select>
                                            </div>

                                        </div>


                                        <div class="col">
                                            <label for="section_id"
                                                class="mr-sm-2">
                                                {{trans('showLevel.Select Section')}}
                                                </label>

                                            <div class="box">
                                                <select class="fancyselect" name="section_id">
                                                   @foreach($section as $sec)
                                                        <option value="{{$sec->id}}">{{$sec->name}}</option>
                                                   @endforeach
                                                 
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{trans('showLevel.delete')}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{trans('showLevel.Add another level')}}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('showLevel.cancel')}}</button>
                                <button type="submit"
                                    class="btn btn-success" >{{trans('showLevel.save')}}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
<!-- end add -->
<!-- row closed -->
@endsection
@section('js')
<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>

<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>
@endsection
