<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif


    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a wire:click="firstStep" type="button"
                   class="btn btn-circle {{ $current != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{trans('parent.step one')}}</p>
            </div>
            <div class="stepwizard-step">
                <a wire:click="secondStep" type="button"
                   class="btn btn-circle {{ $current != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{trans('parent.step two')}}</p>
            </div>
            <div class="stepwizard-step">
                <a wire:click="thirdStep" type="button"
                   class="btn btn-circle {{ $current != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{trans('parent.step three')}}</p>
            </div>
        </div>
    </div>

@if($current == 1 )
@include('livewire.father_form')
@elseif($current == 2)
@include('livewire.mother_form')
@elseif($current == 3)
<br>
<br>
<div class="col-xs-12">
    <div class="col-md-12">
        <h3 style="font-family: 'Cairo', sans-serif;">{{ trans('parent.store') }}</h3><br>
            <button class="btn btn-danger m-1" type="button" wire:click="back">{{ trans('parent.back') }}</button>
            <button class="btn btn-success  m-1" type="button">{{ trans('parent.submit') }}</button>
    </div>
</div>

@endif