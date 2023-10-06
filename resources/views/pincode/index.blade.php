@extends('layouts.master')

@section('content')

<section class="wrapper">
    <h3>All Post codes </h3>
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif
    <div class="row mt">

        <div class="col-md-12">
            <div class="content-panel">
                <div class="col-md-12">
                    <label><b>Delete the followings:</b></label>
                    <select name="checkboxes" class="form-control">
                        <option value="1">Selected</option>
                        <option value="2">All</option>
                    </select>
                    <button type="button" class="btn btn-primary"> Delete </button>
                </div>
                <table class="table table-striped table-advance table-hover">

                    <hr>
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="main_check" id="main_check" onclick="checkall($(this))"/> </th>
                            <th><i class=""></i> Id</th>
                            <th class="hidden-phone"><i class=""></i>Post Code</th>
                            <th class="hidden-phone"><i class=""></i>DS Network</th>
                            <th><i class=""></i> Created</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dat)



                        <tr>
                            <td> <input type="checkbox"  value="{{ $dat->id }}" name="others[]" id="others_{{ $dat->id }}" /></td>
                            <td>{{ $dat->id }}</td>
                            <td>{{ $dat->pin_code }}</td>
                            <td>
                                @if ($dat->network)
                                {{ $dat->network->network_code}}
                                @endif
                            </td>
                            <td>{{ $dat->created_at }}</td>




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
    </script>
</section>

{!!$data->render()!!}
@endsection 