 @extends('layouts.master')

@section('content')
 
          <section class="wrapper">
          	<h3> Index-DS network Mapping </h3>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
              <div class="row mt">

                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	 
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class=""></i> Id</th>
                                  <th class="hidden-phone"><i class=""></i>Pin Code</th>
                                  <th><i class=""></i> Ds Network</th>
                                
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($data as $dat)
                              <tr>
                                
                                  <td>{{ $dat->id }}</td>
                                  <td>{!! Helper:: getPin($dat->pincode_id) !!}</td>
                                  <td>{!! Helper:: getNetwork($dat->network_id) !!}</td>
                               
                              
                                  <td>
                                   
                                      <a href="{{ route('pinedit', $dat->id) }}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                   
                                     
                                       <a href="{{ route('delete', $dat->id) }}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                                   
                              </tr>
                             @endforeach
                              </tbody>

                          </table>
                         
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
 
		</section>
   
 {!!$data->render()!!}
        @endsection 