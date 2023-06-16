<div class="needs-validation" novalidate>
  <br>
  <h4>{{trans("parent.Father's data")}}</h4>
  <br>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label >{{trans('parent.name')}}</label>
      <input type="text" class="form-control" wire:model="father_name" placeholder="{{trans('parent.name')}}"  required>
    
    </div>

    <div class="col-md-4 mb-3">
      <label >{{trans('parent.email')}}</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" >@</span>
        </div>
        <input type="text" class="form-control" wire:model="email" placeholder="{{trans('parent.email')}}" required>
      
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">{{trans('parent.password')}}</label>
      <input type="password" wire:model="password" class="form-control"  placeholder="******" required>
      
    </div>

      <div class="col-md-4 mb-3">
      <label >{{trans('parent.national id')}}</label>
      <input type="text" wire:model="nationalID" class="form-control"  placeholder="..." required>
      
    </div>

      <div class="col-md-6 mb-3">
      <label >{{trans('parent.address')}}</label>
      <input type="text" wire:model="father_address" class="form-control"  placeholder="..." required>
      
    </div>

      <div class="col-md-4 mb-3">
      <label >{{trans('parent.job')}}</label>
      <input type="text" wire:model="father_job" class="form-control"  placeholder="..." required>
      
    </div>





  <div class="form-row m-3">
    <label>{{trans('parent.nationality')}}</label>
   <select class="custom-select" wire:model="father_nationality" >
        <option selected disabled>{{trans('parent.nationality')}}</option>
        @foreach($nationality as $na)
            <option value="{{$na->id}}">{{$na->name}}</option>
        @endforeach
  </select>

  </div>

  <div class="form-row m-3">

<label>{{trans('parent.religion')}} </label>
   <select class="custom-select" wire:model="father_religion" >
        <option selected disabled>{{trans('parent.religion')}} </option>
          @foreach($religion as $re)
            <option value="{{$re->id}}">{{$re->name}}</option>
          @endforeach
  </select>

  </div>

    <div class="form-row m-3">

<label>{{trans('parent.blood type')}} </label>
   <select class="custom-select"  wire:model="father_blood">
        <option selected disabled>{{trans('parent.blood type')}}</option>
         @foreach($blood as $bl)
            <option value="{{$bl->id}}">{{$bl->name}}</option>
         @endforeach
  </select>

  </div>
  
  </div>



  <br>
  <button class="btn btn-primary" wire:click="secondStep" >{{trans('parent.next')}}</button>
</div>