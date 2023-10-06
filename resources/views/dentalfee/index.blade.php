 @extends('layouts.master')

@section('content')
 
          <section class="wrapper">
          	<h3>All Dental Fees</h3>
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
                                  <th>Id</th>
                                  <th>Category</th>
                                  <th>Procedure</th>
                                  <th>Network</th>
                                  <th>Pincode</th>
                                <!--   <th>Usual Fee</th> -->
                                  <th>Dental Fee</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach($data as $dat)
                              <tr>
                                
                                  <td>{{ $dat->id }}</td>
                                  <td>{!! Helper:: getProcedure($dat->procedure_id) !!}</td>
                                  <td>{!! Helper:: getCourse($dat->course_id) !!}</td>
                                  <td>{!! Helper:: getNetwork($dat->network_id) !!}</td>
                                  <td>{!! Helper:: getPin($dat->pincode_id) !!}</td>
                                <!--    <td>{!! Helper:: getDentalFee($dat->network_id,$dat->course_id) !!}</td> -->
                                  <td>{{ $dat->dental_fees }}$</td>
                                
                                  <td>
                                   
                                      <a href="{{ route('usualfeeedit', $dat->id) }}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                   
                                     
                                       <a href="{{ route('deleteUsualFee', $dat->id) }}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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