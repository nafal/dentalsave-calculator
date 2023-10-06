@extends('layouts.master')
@section('content')
 <section class="wrapper">

<div class="row mt">

    <div class="col-lg-12">
        <div class="form-panel">
            
  @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif



 @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
        

            <h4 class="mb">File Upload </h4>
<?php
 echo Form::open(array('url' => '/uploaddsfile','class'=>'form-horizontal style-form','files'=>'true'));
         echo 'Select the file to upload.';
         ?>
            <br>
            <br>
            <?php
         echo Form::file('filename',['class'=>'form-control ']);?>
         <br>
         
         <?php
         echo Form::submit('Upload File', ['class' => 'btn btn-theme']);
         echo Form::close();
      ?>
        </div>
    </div>
</div>
 </section>
   @endsection




