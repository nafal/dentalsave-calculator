 


@extends('layouts.master')
@section('title', 'Create Post Code')
@section('content')
<style>
.alert {
width: 47%;
    margin-top: 14px;
    margin-left:26px;
}
</style> 
 <section class="wrapper">
          	<h3> Add Post Codes</h3>
         <!--  	
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif -->
          	
          
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  
                      <form class="form-inline" role="form" method="post" action="{{ route('savePin') }}">
                          <div class="form-group">
                              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                              <label class="" for="pin">Post Code :</label>
                              <input style="width:160%" type="text" name="pin_code" class="form-control" id="pin" placeholder="Post code">
                              
                          </div> @if ($errors->has('pin_code'))
                          <div class="alert alert-danger">{{ $errors->first('pin_code') }}</div>
                          @endif <br/><br/>
                          <!-- <div class="form-group">
                          
                          <label class="" for="network_id">Select Dental Network::</label><br/><br/>
                          <select style="width:320%" name="network_id" id="network_id" class="form-control" style="width:350px">
                          </select>
                          @if ($errors->has('network_id'))
                          <div class="alert alert-danger">{{ $errors->first('network_id') }}</div>
                          @endif
                          </div> -->

                          <div class="form-group">
                           <label class="" for="network_id">Select Dental Network::</label><br/><br/>
                          {!! Form::select('network_id', ['' => 'Select'] +$networks->toArray(),'',array('style'=>'width:320%','class'=>'form-control','id'=>'network_id','style'=>'width:350px;'));!!}
                           
                          </div>@if ($errors->has('network_id'))
                          <div class="alert alert-danger">{{ $errors->first('network_id') }}</div>
                          @endif
                          <br/><br/>
                           
                          
                          <button type="submit" class="btn btn-theme">Save</button>
                      </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
          	
          	
          	
		</section>
    @endsection