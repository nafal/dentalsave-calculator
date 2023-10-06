
@extends('layouts.master')
@section('content')

<div class="row mt">

    <div class="col-lg-12">
        <div class="form-panel">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h4 class="mb"> Create Dental Procedure </h4>
            <form class="form-horizontal style-form" method="post" action=" {{route('storeCourse') }} ">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">

                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-4"> 
                        <select  name="procedure_id" class="form-control">

                            @foreach($proceds as $proced)
                            <option  value="{{$proced->id}}">{{$proced->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-sm-6"> </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2  control-label">CDT Code</label>
                    <div class="col-sm-4">
                        <input  type="text" name="code"  placeholder="D0120" class="form-control">
                    </div>
                    <div class="col-sm-6"> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Procedure Name</label>
                    <div class="col-sm-4">
                        <input  type="text" placeholder="periodic oral evaluation established patient" name="course_name" class="form-control">
                    </div>
                    <div class="col-sm-6"> </div>
                </div>
                <!-- <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" for="title">Select PIN:</label>
              <input class="form-control autocomplete_txt" type='text' data-type="countryname" style='width:350px;' id='pincode_id' name='pincode_id'/>                         <input style="width:434px;margin-left:18%" type="select" style="width:350px;" class="form-control" name="pin" id="pin" data-action="{{ route('autocomplete') }}">
            
               <input type="hidden"  name="pincode_id" id="pincode_id"  >
                @if ($errors->has('pin'))
              <div class="alert alert-danger">{{ $errors->first('pin') }}</div>
              @endif
              </div> 

               <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="title">Select Network:</label>
              {!! Form::select('network_id', ['' => 'Select'] +$networks->toArray(),'',array('class'=>'form-control','id'=>'network_id','style'=>'width:435px;margin-left:18%'));!!}
               </div> -->


                <div > 
                  
                    @foreach($networks->toArray()  as $k=> $dat)                      
                    <input type="hidden" name="hidden[]" value="{{$k}}">


                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>{{ $dat }} :</b></label>
                        <div class="col-sm-4">
                            <input  type="text" placeholder="Usual Fees" name="fees[{{$k}}]" class="form-control">
                        </div>                         

                        <div class="col-sm-4">
                            <input  type="text" placeholder="Dental Fees" name="dental_fees[{{$k}}]" class="form-control">
                        </div>
                        <div class="col-sm-2"> </div>
                    </div>

                    @endforeach

                </div>


                <button type="submit" class="btn btn-theme">Save</button>

            </form>
        </div>
    </div><!-- col-lg-12-->       
</div><!-- /row -->    
<script type="text/javascript">
    $('#pin').change(function () {


        var pin_id = $(this).val();


        if (procedureID) {
            $.ajax({
                type: "GET",
                url: "{{url('api/get-state-list')}}?procedure_id=" + procedureID,
                success: function (res) {
                    if (res) {
                        $("#state").empty();
                        $("#state").append('<option>Select</option>');
                        $.each(res, function (key, value) {
                            $("#state").append('<option value="' + key + '">' + value + '</option>');
                        });

                    } else {
                        $("#state").empty();
                    }
                }
            });
        } else {
            $("#state").empty();

        }
    });

    $('#pin').each(function () {
        var $this = $(this);
        var src = $this.data('action');

        $this.autocomplete({
            source: src,
            minLength: 1,
            select: function (event, ui) {
                $this.val(ui.item.value);
                $('#pincode_id').val(ui.item.id);
            }
        });
    });
</script>
</script> 
@endsection