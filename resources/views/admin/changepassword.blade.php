@extends('layouts.master')
@section('content')



          <div class="row mt">

              <div class="col-lg-12">
                  <div class="form-panel">

 @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                                          <h4 class="mb">Change Password </h4>
                      <form class="form-horizontal style-form" method="post" action=" {{route('storePassword') }} ">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10">
                                  <input style="width:50%" type="text" placeholder="Password" name="password" class="form-control">
                              </div>
                          </div> 
                          <button type="submit" class="btn btn-theme">Save</button>
                          </form>

                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row --> 
            @endsection