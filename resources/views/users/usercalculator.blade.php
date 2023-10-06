@extends('layouts.userlayout')

@section('content')
<section class="wrapper">
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif
    <div class="mrg-head"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

    <section class="cltr-head">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>DentalSave Calculator</h1>
                    <h4>How much could a dental discount plan save you?</h4>

                </div>
            </div>
        </div>
    </section>
    <form id="pdf_form" name="pdf_form" method="post" action=" {{route('pdf') }} ">
        <input type="hidden" name="pdf_outer" id="pdf_outer_input" />
        <input type="hidden" name="zipcode" value="<?php echo $dd['zipcode'] ?>">
        <input type="hidden" name="network" value="<?php echo $netw; ?>">

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <input type="hidden" id="total_apwds" name="total_apwds" value="">
        <input type="hidden" id="total_dmp" name="total_dmp" value="">
        <input type="hidden" id="total_amd" name="total_amd" value="">
        <input type="hidden" id="total_per" name="total_per" value="">


        <div id="dfgsdgfsdfg">

        </div>

    </form>
    <div id="pdf_outer">
        <section class="data-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <h5>We've included a basic program of common procedures. You can add/remove procedures to see exactly how much you will save with a DentalSave plan:</h5>
                    </div>			
                </div>
            </div>


            <div class="container table-set">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="">
                                <thead >
                                    <tr style="background: #69c8f1; color: #fff;">
                                        <th style="background: #69c8f1; color: #fff;" scope="col">Procedure Name<br><span>(ADA Code)</span></th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Average Price WITHOUT<br><span>DentalSave</span></th>
                                        <th scope="col">Dentalsave<br><span>Member Price</span></th>
                                        <th scope="col" >Saving</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_item">
                                    <tr>
                                        <td colspan="7">
                                            <div class="form-group">                
                                                {!! Form::text('search_text', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!}
                                            </div>
                                        </td>       
                                    </tr> 
                                    <tr>
                                        <td><b>Total Procedure Price</b></td>
										<td></td>
										<td></td>
                                        <td class="average-price"><span id="avg_price">$0.00</span> </td>
                                        <td class="member-price"><span id="member_price">$0.00</span></td>
                                        <td class="saving"><span id="saving_price">$0.00</span></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>			
                </div>
            </div>
        </section>


        <section class="start">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Fees listed above are based on <b><?php echo $netw; ?></b> Fee Schedule for a General Dentist located in Postal Code <b><?php echo $dd['zipcode'] ?></b> .</h3>
                        <p>*Based on average prices published by NDAS. Check with your dentist to confirm proper ADA codes for your care plan.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-md-offset-3">
                        <a target="_blank" href="https://dentalsave.com/pricing/" class="btn btn-startover btn-block">Start over</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#" class="btn btn-startsaving btn-block">Start Saving</a>
                    </div>
                </div>
            </div>
        </section>



        <section class="cost-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h3 class="text-center">Cost of Procedures WITHOUT DentalSave</h3>
                        <div class="cost-without" style="display:none;"><strong id="without">$0.00</strong></div>
                        <div class="cost-without-default"><strong>$0.00</strong></div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h3 class="text-center">Cost of Procedures with DentalSave</h3>
                        <div class="cost-with">
                            <span class="fill-cost" style="display:none;">&nbsp;</span>
                            <span class="cost-velue" style="width:100%;">$0.00</span>

                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="saving-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h3 class="text-center">A DentalSave Plan Could Save you:</h3>
                    </div>
                </div>


                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="plan-velue">$0.00</div>
                        <div class="plan-dollars">Dollars</div>
                    </div>
                </div>


                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="plan-save-velue">0.00%</div>
                        <div class="plan-save-txt">Off Your Dental Bill</div>
                    </div>
                </div>


                <div class="row text-center">
                    <div class="col-md-6 col-md-offset-3 view-dntl-btn">
                        <a href="https://dentalsave.com/pricing/" class="btn btn-view-all ">View All Dental Plans</a>
                    </div>
                </div>

            </div>
        </section>

    </div>

    <section class="fmly-pln">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Recommended DentalSave Plan</h3>
                </div>


                <div class="col-md-2 col-md-offset-5 text-center">
                    <img src="{{ URL::asset('userassets/img/user-icon.png')}}" class="img-responsive" style="margin: 0 auto;">
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center fmly-plan-lft">
                    <h4>Plan includes:</h4>
                    <p>Access for 3+ people</p>
                    <p>20-50% Off Every Dental Visit with a Participating Location</p>
                    <p>Access to over 10,000 DentalSave dental locations</p>
                    <p>Access to over 40,000 Careington dental Locations</p>
                    <p>Vision Savings with EyeMed</p>
                    <p>Hearing Savings with Amplifon</p>
                    <p>Prescription Drug Savings with MedImpact</p>
                </div>	

                <div class="col-md-6 text-center fmly-plan-rht">
                    <h4>Learn more about this plan</h4>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <ul>
                                <li class="aaaa"><a target="_blank"  href="https://dentalsave.com/dental-plans/dental-saving-plan/">Overview</a></li>
                                <li class="aaaa"><a target="_blank" href="https://dentalsave.com/dentist-search/">Find a Dentist</a></li>
                                <li class="aaaa"><a target="_blank" href="https://dentalsave.com/vision-savings-discount-card-eyemed/">Vision</a></li>
                                <li class="aaaa"><a target="_blank" href="https://dentalsave.com/our-prescription-drugs-program-medimpact/">Pharmacy</a></li>
                                <li class="aaaa"><a  target="_blank" href="https://dentalsave.com/our-prescription-drugs-program-medimpact/">Hearing</a></li>
                                <li class="aaaa"><a  target="_blank" href="https://dentalsave.com/reviews/">Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>				
            </div>

            <div class="row fmly-btn-mrg">
                <div class="col-md-3 col-sm-6 col-md-offset-3 ">

                    <a href="#" id="email_pdf" class="btn btn-block btn-email-rslt ">EMAIL RESULTS</a>


                </div>

                <div class="col-md-3 col-sm-6">

                    <a href="#" class="btn btn-block btn-startsaving">SIGN UP</a>

                </div>
            </div>
        </div>

    </section>


</section>
<style>
    .container-fluid {
        margin-left: 20px;
        margin-right: 20px;
    }

    /* Input field with increment/decrement */
    .inputWrapper {
        position: relative;
        width: 90px;
        height: 37px;
        border-radius: 3px;
        overflow: hidden;
    }
    .inputWrapper .txtInput {
        display: block;
        width: 80%;
        height: 100%;
        position: absolute;
        left: 0;
        padding-left: 5px;
    }
    .aaaa:hover{
        background: #66ccff;
    }
    .cusWrap {
        position: absolute;
        width: 20%;
        height: 100%;
        right: 0;
    }
    .cusWrap .cusBTN {
        display: block;
        width: 100%;
        height: 50%;
        padding: 0;
        line-height: 4px;
        border: 1px solid #ccc;
    }

    /*    table input[type="text"] {
            width: 65px;
            height: 36px;
        }*/
    .fBTN {
        float: right;
    }
    .ratebox {
        width: 170px;
    }
    .ratebox p {
        margin: 0;
    }
    .ratebox span {
        display: inline-block;
        font-size: 0.8em;
    }
    .ratebox .tag {
        width: 100px;
        font-weight: bold;
    }
    table th, table td {
        font-size: 0.8em;
    }
    .table-set .quantity input {
        width: 100%;
    }
</style>

<script type="text/javascript">
var data = '<?php echo json_encode($data); ?>';
data = JSON.parse(data);
var productNames = new Array();
var productIds = new Object();

//console.log(productNames);
$('#search_text').typeahead({
    source: data,
    displayText: function (item) {
        return item.label
    },
    afterSelect: function (item) {
        this.$element[0].value = item.value;
        var url = "<?php echo route('getgrid', 1) ?>";
        $.ajax({
            url: url + '?b=' + item.id + '&net_id=' + item.net_id,
            type: 'GET',
            success: function (res) {
                $('#tbody_item').prepend(res);
            },
            complete: function (res) {
                $("#search_text").val('');
                globalCalculation();
            }
        });

    }
});
function globalCalculation() {
    // return;
    var apt = 0;
    var mpt = 0;
    var spt = 0;
    var ppt = 0;
    if ($("#tblNames tr.ajax_tr").length == 0) {
        resetCalculation();
    }
    $("#tbody_item > tr.ajax_tr").each(function (i, k) {

        var vid = $(this).attr('id');
        var ap = $(this).find('td.average-price_' + vid).html();
        ap = ap.trim().substr(1);
        ap = ap.replace(/\,/g, '');
        apt = +(parseFloat(apt) + (parseFloat(ap))).toFixed(2)
        $("#avg_price").html('$' + apt);

        var mp = $(this).find('td.member-price_' + vid).html();
        mp = mp.trim().substr(1);
        mp = mp.replace(/\,/g, '');
        mpt = +(parseFloat(mpt) + (parseFloat(mp))).toFixed(2)
        $("#member_price").html('$' + mpt);

        $('.fill-cost').css('display', 'block');
        $('.cost-without-default').css('display', 'none');
        $('.cost-without').css('display', 'block');

        var sp = $(this).find('td.saving_' + vid).html();
        sp = sp.trim().substr(1);
        sp = sp.replace(/\,/g, '');
        spt = +(parseFloat(spt) + (parseFloat(sp))).toFixed(2)
        $("#saving_price").html('$' + spt);
        $("#without").html($('#avg_price').html());
        $('.plan-velue').html($('#saving_price').html());
        $('.cost-velue').html($('#member_price').html());

        ppt = ((spt * 100) / apt);
        ppt = ppt.toFixed(2);
        $('.fill-cost').css('width', ppt + '%');
        $('.cost-velue').css('width', (100 - +ppt) + '%');
        $('.plan-save-velue').html(ppt + '%')


        var proname = $(".pro_name_" + vid).val();
        var area = $(".area_" + vid).val();
        var qty = $("#qw_" + vid).val();
        var av_p_w_ds = $(".average-price_" + vid).html();
        var ds_m_p = $(".member-price_" + vid).html();
        var a_m_save = $(".saving_" + vid).html();


        $("#dfgsdgfsdfg").prepend('<input class="pro_name_' + vid + '" name="pro_name[' + vid + ']" value="' + proname + '" type="hidden"><input class="area_' + vid + '" name="area[' + vid + ']" value="' + area + '" type="hidden"><input class="qty_' + vid + '" name="qty_[' + vid + ']" value="' + qty + '" type="hidden"><input class="a_p_w_ds_' + vid + '" name="a_p_w_ds_[' + vid + ']" value="' + av_p_w_ds + '" type="hidden"><input class="d_s_m_p_' + vid + '" name="d_s_m_p_[' + vid + ']" value="' + ds_m_p + '" type="hidden"><input class="a_m_save_' + vid + '" name="a_m_save[' + vid + ']" value="' + a_m_save + '" type="hidden">');


    });
    $('#total_apwds').val($('#avg_price').html());
    $('#total_dmp').val($("#member_price").html());
    $('#total_amd').val($("#saving_price").html());
    $('#total_per').val($('.plan-save-velue').html());

}
function calculate(id, type) {
    var plusminus = $("#qw_" + id).val();
    if (type == '1') {
        $("#qw_" + id).val(+$("#qw_" + id).val() + 1);
    } else {
        if (plusminus <= 1)
            return false;
        $("#qw_" + id).val(+$("#qw_" + id).val() - 1);
    }
    var plusminus1 = $("#qw_" + id).val();

    var oap = $("#uf_" + id).val();
    oap = oap.trim().substr(1);
    oap = oap.replace(/\,/g, '');


    var omp = $("#udf_" + id).val();
    omp = omp.trim().substr(1);
    omp = omp.replace(/\,/g, '');

    var osp = $("#uf_udf_" + id).val();
    osp = osp.trim().substr(1);
    osp = osp.replace(/\,/g, '');

    $(".average-price_" + id).html('$' + (oap * plusminus1).toFixed(2));
    $(".member-price_" + id).html('$' + (omp * plusminus1).toFixed(2));
    $(".saving_" + id).html('$' + (osp * plusminus1).toFixed(2));
    globalCalculation();

}
function resetCalculation() {
    restprice = '0.00';
    $("#avg_price").html('$' + restprice);
    $("#member_price").html('$' + restprice);
    $("#saving_price").html('$' + restprice);
    $("#without").html('$' + restprice);
    $('.fill-cost').css('width', restprice + '%');
    $('.cost-velue').css('width', (100 - +restprice) + '%');
    $('.fill-cost').css('display', 'none');
    $('.cost-without-default').css('display', 'block');
    $('.cost-without').css('display', 'none');
    $('.cost-velue').html('$' + restprice);
    $('.plan-save-velue').html(restprice + '%')
    $(".plan-velue").html('$' + restprice);

}
$(document).on("click", ".removetr", function () {
    var vvid = $(this).attr("vvid");
    $("#" + vvid).remove();
    globalCalculation();
});
$(document).on("click", ".btn-startover", function (e) {
    e.preventDefault();
    $(".removetr").click();
    resetCalculation();
});

$(window).load(function () {
    var nw_id = '<?php echo $network; ?>';
    var url = "<?php echo route('getgrid', 1) ?>";
    url = url + '?b=xxx&net_id=' + nw_id;
    $.ajax({
        url: url,
        type: 'GET',
        success: function (res) {
            $('#tbody_item').prepend(res);
            globalCalculation();
        }
    });

});
globalCalculation();


$("#email_pdf").click(function (e) {
    e.preventDefault();
    var data = $("#pdf_form").serialize();
    var url = $("#pdf_form").attr("action");
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (res) {
            $("#myModalmail").modal();
        }
    });
    return false;
    // $("#pdf_form").submit();
});

</script>



@endsection
<div id="myModalmail" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Mail Successfully sent.</h4>
            </div>
            <div class="modal-body">
                <p>We have sent a PDF with calculations, please check your inbox and find the attachment. If you haven't received email, don't forget to check spam once.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>