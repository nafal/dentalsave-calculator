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



            <h4 class="mb"> View Dental Procedure </h4>
            <div class="form-horizontal style-form">

                <div class="form-group">

                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-4"> 
                        <label  style="padding: 6px 12px;font-size: 14px;color: #555;" >{{$data->procedure->name}}</label>


                    </div>
                    <div class="col-sm-6"> </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-2  control-label">CDT Code</label>
                    <div class="col-sm-4">
                        <label   style="padding: 6px 12px;font-size: 14px;color: #555;" >{{$data->code}}</label>
                    </div>
                    <div class="col-sm-6"> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Procedure Name</label>
                    <div class="col-sm-4">
                        <label style="padding: 6px 12px;font-size: 14px;color: #555;" >{{$data->course_name}}</label>
                    </div>
                    <div class="col-sm-6"> </div>
                </div>
           

					<div class="form-group">
                        <label class="col-sm-2 control-label"><b>DS networks</b></label>
                        <div class="col-sm-4">
                            
                            <label  style="padding: 6px 12px;font-size: 14px;color: #555;">Usual Fee</label>
                        </div>                         

                        <div class="col-sm-4">
                            <label style="padding: 6px 12px;font-size: 14px;color: #555;">Dental Fee</label>
                            
                        </div>
                        <div class="col-sm-2"> </div>
                    </div>
            

                    @foreach($networks->toArray()  as $k=> $dat)                      
                    <input type="hidden" name="hidden[]" value="{{$k}}">


                    <div class="form-group">
                        <label class="col-sm-2 control-label"><b>{{ $dat }} :</b></label>
                        <div class="col-sm-4">
                            
                            <label  style="padding: 6px 12px;font-size: 14px;color: #555;"><?php echo DentalCalculator\UsualFee::getFees($k, $data->id, $data->procedure->id)  ?></label>
                        </div>                         

                        <div class="col-sm-4">
                            <label style="padding: 6px 12px;font-size: 14px;color: #555;"><?php echo DentalCalculator\UsualFee::getFees($k, $data->id, $data->procedure->id,1)  ?></label>
                            
                        </div>
                        <div class="col-sm-2"> </div>
                    </div>

                    @endforeach

                </div>



         








            </div>
        </div><!-- col-lg-12-->       
    </div><!-- /row -->    
    @endsection