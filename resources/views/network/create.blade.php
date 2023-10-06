 


 @extends('layouts.master')
@section('title', 'Create Ds Network')

@section('content')
 <section class="wrapper">
          	<h3> Add DS Network</h3>
          	
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
                  
                      <form class="form-inline" role="form" method="post" action="{{ route('storeNetwork') }}">
                          <div class="form-group">
                              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                              <label class="" for="pin">Ds Network  :</label>
                              <input style="width:202%" type="text" name="network_code" class="form-control" id="pin" placeholder="Ds Network">
                          </div><br/><br/> 
                          

                          
                          <br/><br/>  
                          
                           
                          
                          <button type="submit" class="btn btn-theme">Save</button>
                      </form>
          			</div>
          		</div>
          	</div>
          	
          	
          	
          	
		</section>
    @endsection