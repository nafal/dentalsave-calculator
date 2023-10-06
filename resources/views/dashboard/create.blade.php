@extends('layouts.master')
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
                      <h4 class="mb"></i> Check fees</h4>
                      <form class="form-horizontal style-form" method="post" action=" {{route('getmyfee') }} ">
                         <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                         <div class="form-group">
                               <label class="col-sm-2 col-sm-2 control-label" for="title">Select Procedures:</label>
                          {!! Form::select('procedure_id', ['' => 'Select'] +$procedures->toArray(),'',array('class'=>'form-control','id'=>'country','style'=>'width:350px;'));!!}
                           @if ($errors->has('procedure_id'))
                                <div class="alert alert-danger">{{ $errors->first('procedure_id') }}</div>
                                @endif
                          </div>

                          <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Select Dental Course:</label>
                          <select name="course_id" id="state" class="form-control" style="width:350px">
                          </select>
                          @if ($errors->has('course_id'))
                          <div class="alert alert-danger">{{ $errors->first('course_id') }}</div>
                          @endif
                          </div>
                          
                           <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label" for="title">pin:</label>
                          {!! Form::text('pin','',array('class'=>'form-control','id'=>'fees','placeholder'=>'Enter Pin','style'=>'width:350px;'));!!}
                          @if ($errors->has('pin'))
                          <div class="alert alert-danger">{{ $errors->first('pin') }}</div>
                          @endif
                          </div>
                          <button type="submit" class="btn btn-theme">Save</button>
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



