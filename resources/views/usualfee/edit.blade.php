@extends('layouts.master')
@section('title', 'Edit-Fees')
@section('content')

<style>
.alert {
width: 47%;
margin-top: 14px;
margin-left:26px;
}
</style>


<div class="row mt">
                      
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"></i>Edit Fees</h4>
                      <form class="form-horizontal style-form" method="post" action=" {{route('usualfeestore',$data->id ) }} ">
                        {{ method_field('PUT') }}
                            {{ csrf_field() }}

      
                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Select Procedures:</label>
                          {!! Form::select('procedure_id', ['' => 'Select'] +$procedures->toArray(),$data->procedure_id,array('class'=>'form-control','id'=>'country','style'=>'width:350px;'));!!}
                           @if ($errors->has('procedure_id'))
                          <div class="alert alert-danger">{{ $errors->first('procedure_id') }}</div>
                          @endif
                          </div>

                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Select Dental Course:</label>
                        
                           {!! Form::select('course_id', ['' => 'Select'] +$courses->toArray(),$data->course_id,array('class'=>'form-control','id'=>'state','style'=>'width:350px;'));!!}
                          @if ($errors->has('course_id'))
                          <div class="alert alert-danger">{{ $errors->first('course_id') }}</div>
                          @endif
                          </div>
                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Select DS Network:</label>
                          {!! Form::select('network_id', ['' => 'Select'] +$ds_networks->toArray(),$data->network_id,array('class'=>'form-control','id'=>'ds_network','style'=>'width:350px;'));!!}
                          @if ($errors->has('network_id'))
                          <div class="alert alert-danger">{{ $errors->first('network_id') }}</div>
                          @endif
                          </div>
                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Select Index (PIN):</label>
                          {!! Form::select('pincode_id', ['' => 'Select'] +$pin->toArray(),$data->pincode_id,array('class'=>'form-control','id'=>'pincode_id','style'=>'width:350px;'));!!}
                          @if ($errors->has('pincode_id'))
                          <div class="alert alert-danger">{{ $errors->first('pincode_id') }}</div>
                          @endif
                          </div>
                           <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Usual Fees:</label>
                          {!! Form::text('fees',$data->fees,array('class'=>'form-control','id'=>'fees','placeholder'=>'Enter fees','style'=>'width:350px;'));!!}
                          @if ($errors->has('fees'))
                          <div class="alert alert-danger">{{ $errors->first('fees') }}</div>
                          @endif
                          </div>
                       <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Dental Fees:</label>
                          {!! Form::text('dental_fees',$data->dental_fees,array('class'=>'form-control','id'=>'dental_fees','placeholder'=>'Enter fees','style'=>'width:350px;'));!!}
                          @if ($errors->has('dental_fees'))
                          <div class="alert alert-danger">{{ $errors->first('dental_fees') }}</div>
                          @endif
                          </div> 
                         

             <button type="submit" class="btn btn-theme">Update</button>
                          
                      </form>
         
            
      </div>
    </div>
</div>


<script type="text/javascript">
    $('#country').change(function(){

    var procedureID = $(this).val();

    if(procedureID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-state-list')}}?procedure_id="+procedureID,
           success:function(res){               
            if(res){

                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        
    }      
   });
  </script>
@endsection



