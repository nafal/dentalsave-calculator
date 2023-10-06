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
                      <h4 class="mb"></i>Prefix Mapping with Network</h4>
                      <form class="form-horizontal style-form" method="post" action=" {{route('storePrefixNetwork') }} ">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                           
                          <div class="form-group">

                               <label class="col-sm-2 col-sm-2 control-label">Select Ds Network</label>
                              <div class="col-sm-5"> 
                            <select name="network_id" class="form-control">

                            @foreach($networks as $network)
                            <option  value="{{$network->id}}">{{$network->network_code}}</option>
                            @endforeach
                            </select>

                            </div>

                          </div> 

                          <div class="form-group">

                               <label class="col-sm-2 col-sm-2 control-label">Select Prefix</label>
                              <div class="col-sm-5"> 
                            <select name="pincode_id" class="form-control">

                            @foreach($pincodes as $pincode)
                            <option  value="{{$pincode->id}}">{{$pincode->pin_code}}</option>
                            @endforeach
                            </select>

                            </div>

                          </div> 
                         

                          <button type="submit" class="btn btn-theme">Save</button>
                          
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->     
             @endsection