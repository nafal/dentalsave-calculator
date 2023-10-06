@extends('layouts.master')

@section('content')

<section class="wrapper">
    <h3> All Courses</h3>
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif


    <div class="row mt">

        <div class="col-md-12">
            <div class="content-panel">
                <div class="col-md-12">
                    <form name="submitform" method="post" id="dgdsfgdsgfsgd" action="{{ route('bulkdeleteCourse') }}">
                        <label><b>Delete the followings:</b></label>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <select name="checkboxes" class="form-control">
                            <option value="1">Selected</option>
                            <option value="2">All</option>
                        </select>
                        <input type="hidden" name="item_val" value="" id="itemval" >
                        <input type="hidden" name="form_name" value="Course" id="" >

                        <button  id="delete_btn" type="submit" class="btn btn-primary"> Delete </button>
                    </form>
                </div>
                <table class="table table-striped table-advance table-hover">
                    <hr>
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="main_check" id="main_check" onclick="checkall($(this))"/> </th>
                            <th><i class=""></i> Id</th>
                            <th class="hidden-phone"><i class=""></i> Procedure</th>
                            <th><i class=""></i>CDT Code</th>
                            <th><i class=""></i> Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dat)
                        <tr>

                            <td> <input type="checkbox"  value="{{ $dat->id }}" name="others[]" id="others_{{ $dat->id }}" /></td>
                            <td>{{ $dat->id }}</td>

                            <td>{{ $dat->procedure->name }}</td>
                            <td>{{ $dat->code }}</td>
                            <td>{{ $dat->course_name }}</td>
                            <td>

                                <a href="{{ route('view', $dat->id) }}"> <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button></a>

                                <a href="{{ route('editcourse', $dat->id) }}"> <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>



                                <a href="{{ route('delete', $dat->id) }}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
    <script>
        function checkall(obj) {
            $('[id^=others_]').each(function () {
                if ($(obj).is(':checked')) {
                    $(this).prop('checked', 'checked');
                } else {
                    $(this).prop('checked', false);
                }
            });
        }
        $(document).ready(function () {
            $("#delete_btn").click(function (e) {
                e.preventDefault();
                var fruits = [];
                $('[id^=others_]').each(function () {
                    if ($(this).is(':checked')) {
                        fruits.push($(this).val());
                    }
                });
                $("#itemval").val(fruits);
                $("#dgdsfgdsgfsgd").submit();
            });
        });
    </script>
</section>

{!!$data->render()!!}
@endsection 
