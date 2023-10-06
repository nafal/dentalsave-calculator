 

<?php //echo '<pre>'; print_r($data); die; 
$networks = $data['networks'];
$data = $data['data'];
?>
@extends('layouts.master')

@section('content')
<section class="wrapper">
    <h3></i> Edit Pin Code</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">

                <form class="form-inline" role="form" method="post" action="{{ route('updatePin',$data->id) }}">
                    <div class="form-group">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <label class="" for="pin">Post Code :</label>&nbsp;&nbsp;
                        <input type="text"  name="pin_code" class="form-control" id="pin" value="{{ $data->pin_code}}" placeholder="Enter Post code">
                    </div> &nbsp;&nbsp;
                      <br/><br/>
                           <div class="form-group">
                           <label class="" for="network_id">Select Dental Network::</label><br/><br/>
                          {!! Form::select('network_id', ['' => 'Select'] +$networks->toArray(),$data->network_id,array('style'=>'width:320%','class'=>'form-control','id'=>'network_id','style'=>'width:350px;'));!!}
                           
                          </div>@if ($errors->has('network_id'))
                          <div class="alert alert-danger">{{ $errors->first('network_id') }}</div>
                          @endif
                          <br/><br/>
                           



                    <button type="submit" class="btn btn-theme">Update</button>
                </form>
            </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
    </div><!-- /row -->




</section>
@endsection