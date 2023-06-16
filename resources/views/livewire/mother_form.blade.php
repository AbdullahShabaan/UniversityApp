<div class="needs-validation" novalidate>
  <br>
  <h4>{{trans("parent.Mother's data")}}</h4>
  <br>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label >{{trans('parent.name')}}</label>
      <input type="text" class="form-control" wire:model="mother_name" placeholder="{{trans('parent.name')}}"  required>
    
    </div>

      <div class="col-md-4 mb-3">
      <label >{{trans('parent.national id')}}</label>
      <input type="text" wire:model="mother_nationalID" class="form-control"  placeholder="..." required>
      
    </div>

      <div class="col-md-4 mb-3">
      <label >{{trans('parent.address')}}</label>
      <input type="text" wire:model="mother_address" class="form-control"  placeholder="..." required>
      
    </div>


  <div class="form-row m-3">

    <label>{{trans('parent.nationality')}}</label>
   <select class="custom-select" wire:model="mother_nationality" >
        <option selected disabled>{{trans('parent.nationality')}}</option>
        @foreach($nationality as $na)
            <option value="{{$na->id}}">{{$na->name}}</option>
        @endforeach
  </select>

  </div>

  <div class="form-row m-3">

    <label>{{trans('parent.religion')}}</label>

   <select class="custom-select" wire:model="mother_religion" >
        <option selected disabled>{{trans('parent.religion')}} </option>
          @foreach($religion as $re)
            <option value="{{$re->id}}">{{$re->name}}</option>
          @endforeach
  </select>

  </div>

    <div class="form-row m-3">
    <label>{{trans('parent.blood type')}}</label>
   <select class="custom-select"  wire:model="mother_blood">
        <option selected disabled>{{trans('parent.blood type')}}</option>
         @foreach($blood as $bl)
            <option value="{{$bl->id}}">{{$bl->name}}</option>
         @endforeach
  </select>

  </div>


  
  </div>



  <br>
  <button class="btn btn-primary" wire:click="thirdStep" >{{trans('parent.next')}}</button>
  <button class="btn btn-danger" wire:click="back" >{{trans('parent.back')}}</button>
</div>