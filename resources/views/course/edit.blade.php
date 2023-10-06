 


@extends('layouts.master')

@section('content')

<?php
//$ususal = $data['ususal'];
//$data = $data['data'];
//$networks = $data['networks'];
//
//echo '<pre>'; print_r($networks); die; 
?>
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


            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">

                        <form class="form-horizontal style-form" role="form" method="post" action="{{ route('updateCourse',$data->id) }}">
                            <div class="form-group">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                            </div>


                            <div class="form-group">

                                <label class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-4"> 
                                    <input value="{{$data->procedure->name}}" name="name" class="form-control" ></input>


                                </div>
                                <div class="col-sm-6"> </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-2  control-label">CDT Code</label>
                                <div class="col-sm-4">
                                    <input  value="{{$data->code}}" class="form-control" ></input>
                                </div>
                                <div class="col-sm-6"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Procedure Name</label>
                                <div class="col-sm-4">
                                    <input  value="{{$data->course_name}}" class="form-control"  ></input>
                                </div>
                                <div class="col-sm-6"> </div>
                            </div>


                            <?php //if(!empty($networks)){?>
                            @foreach($networks->toArray()  as $k=> $dat)                      
                            <input type="hidden" name="hidden[]" value="{{$k}}">


                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b>{{ $dat }} :</b></label>
                                <div class="col-sm-4">

                                    <?php //echo '<pre>'; print_r(DentalCalculator\UsualFee::getFees($k, $data->id, $data->procedure->id)); die;?>
                                    <input  type="text" value="<?php echo DentalCalculator\UsualFee::getFees($k, $data->id, $data->procedure->id) ?>" placeholder="Usual Fees"  name="fees[{{$k}}]" class="form-control">
                                </div>                         

                                <div class="col-sm-4">
                                    <input  type="text" value="<?php echo DentalCalculator\UsualFee::getFees($k, $data->id, $data->procedure->id, 1) ?>" placeholder="Dental Fees" name="dental_fees[{{$k}}]"   class="form-control">
                                </div>
                                <div class="col-sm-2"> </div>
                            </div>

                            @endforeach
                            <?php //} ?>

                    </div>

                    <button type="submit" class="btn btn-theme">Update</button>
                    </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div><!-- /row -->


    </div>

</section>
@endsection