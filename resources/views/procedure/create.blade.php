 


 @extends('layouts.master')

@section('content')
 <section class="wrapper">
          	<h3> Create Category</h3>
          	
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
                  
                      <form class="" role="form" method="post" action="{{ route('storeProcedure') }}">
                          <div class="form-group">
                              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                              <label class="col-sm-2" for="name">Category  :</label>
                              <div class="col-sm-4">
                              <input type="text" name="name" class="form-control" id="exampleInputEmail2" placeholder=" Procedure Category">
                              </div>
                              <div class="col-sm-6">
                              </div>
                              </div>
                          
                        <!--   <div class="form-group">
                          <div class="col-sm-12 text-center">
                                  <label class="" for="status">Status :</label>
                                  <input type="checkbox" name="status" checked="" data-toggle="switch" />
                              </div>
                            </div> --> <br/><br/>  
                          
                          <button type="submit" class="btn btn-theme">Save</button>
                      </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	
          	
          	
          	
		</section>
    @endsection