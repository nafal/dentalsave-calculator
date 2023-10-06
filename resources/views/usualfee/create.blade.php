@extends('layouts.master')
@section('title', 'Create-Fees')
@section('content')
 
 
<style>
.alert {
width: 47%;
    margin-top: 14px;
    margin-left:26px;
}
</style> 

                @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
<div class="row mt">
                       
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"></i> Create Usual-Dental Fees</h4>
                          <form class="form-horizontal style-form" method="post" action=" {{route('storeUsualFee') }} ">
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
                          <label class="col-sm-2 col-sm-2 control-label" for="title">Select DS Network:</label>
                          {!! Form::select('network_id', ['' => 'Select'] +$ds_networks->toArray(),'',array('class'=>'form-control','id'=>'ds_network','style'=>'width:350px;'));!!}
                          @if ($errors->has('network_id'))
                          <div class="alert alert-danger">{{ $errors->first('network_id') }}</div>
                          @endif
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" for="title">Select PIN:</label>
                          <!-- <input class="form-control autocomplete_txt" type='text' data-type="countryname" style='width:350px;' id='pincode_id' name='pincode_id'/> -->
                          <input type="select" style="width:350px;" class="form-control" name="pin" id="pin" data-action="{{ route('autocomplete') }}">
                        
                           <input type="hidden"  name="pincode_id" id="pincode_id" >
                            @if ($errors->has('pin'))
                          <div class="alert alert-danger">{{ $errors->first('pin') }}</div>
                          @endif
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" for="title">Usual Fees:</label>
                          <input class="form-control" type='text' style='width:350px;' id='fees' name='fees'/>
                            @if ($errors->has('fees'))
                          <div class="alert alert-danger">{{ $errors->first('fees') }}</div>
                          @endif
                          </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" for="title">Dental Fees:</label>
                          <input class="form-control" type='text' style='width:350px;' id='dental_fees' name='dental_fees'/>
                            @if ($errors->has('dental_fees'))
                          <div class="alert alert-danger">{{ $errors->first('dental_fees') }}</div>
                          @endif
                          </div>
                          <button type="submit" class="btn btn-theme">Save</button>
                          
                         </form>
  
                 </div>
           </div>
</div>
<script type="text/javascript">
          

//autocomplete script
// $(document).on('focus','.autocomplete_txt',function(){
//   type = $(this).data('type');
  
//   if(type =='countryname' )autoType='name'; 
//   if(type =='country_code' )autoType='sortname'; 
  
//    $(this).autocomplete({
//        minLength: 0,
//        source: function( request, response ) {
//             $.ajax({
//                 url: "{{ route('searchajax') }}",
//                 dataType: "json",
//                 data: {
//                     term : request.term,
//                     type : type,
//                 },
//                 success: function(data) {
//                     var array = $.map(data, function (item) {
//                        return {
//                            label: item[autoType],
//                            value: item[autoType],
//                            data : item
//                        }
//                    });
//                     response(array)
//                 }
//             });
//        },
//        select: function( event, ui ) {
//            var data = ui.item.data;     
                 
//            id_arr = $(this).attr('id');
//            id = id_arr.split("_");
//            elementId = id[id.length-1];
//            $('#countryname_'+elementId).val(data.name);
          
//        }
//    });
   
   
// });
</script>
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
    $('#pin').each(function() {
        var $this = $(this);
        var src = $this.data('action');

        $this.autocomplete({
            source: src,
            minLength: 1,
            select: function(event, ui) {
                $this.val(ui.item.value);
                $('#pincode_id').val(ui.item.id);
            }
        });
    });
  </script>
  @endsection 