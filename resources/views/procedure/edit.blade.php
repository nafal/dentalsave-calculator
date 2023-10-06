 


@extends('layouts.master')

@section('content')
<!-- <section class="wrapper">
                <h3> Edit Dental Category</h3>
                
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif-->
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

                        <form class="form-horizontal style-form" role="form" method="post" action="{{ route('updateProcedure',$data->id) }}">
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
                           


                    </div>

                    <button type="submit" class="btn btn-theme">Update</button>
                    </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div><!-- /row -->


    </div>

</section>
@endsection