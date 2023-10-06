 


 @extends('layouts.master')

@section('content')
 <section class="wrapper">
          	<h3></i> Edit Dental DS Network</h3>
          	
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
                  
                      <form class="form-inline" role="form" method="post" action="{{ route('dsNetworkUpdate',$data->id) }}">
                          <div class="form-group">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                              <label class="" for="pin">Network Code :</label>&nbsp;&nbsp;
                              <input type="text" name="network_code" class="form-control" id="pin" value="{{ $data->network_code}}" placeholder="Enter Dental Ds network">
                          </div> &nbsp;&nbsp;
                          
                           
                          
                          <button type="submit" class="btn btn-theme">Update</button>
                      </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
          	
          	
          	
		</section>
    @endsection