@extends('layouts.userlayout')

@section('content')
<?php
/*****GET VALUE FORM OTHER WEBSITE************/
$people = isset($_GET['people']) ? $_GET['people'] : '';
$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
$lastname = isset($_GET['lastname']) ? $_GET['lastname'] : '';
$zipcode = isset($_GET['zipcode']) ? $_GET['zipcode'] : '';
$emailaddress = isset($_GET['emailaddress']) ? $_GET['emailaddress'] : '';
?>
<section class="wrapper">


    <div class="mrg-head"></div>



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


    <section class="clt-set-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{ URL::asset('userassets/img/cal-icon.png') }}"class="img-responsive" style="margin: 0 auto;">
                </div>
                <form class="xxx" name="indexform" id="mform" method="post" action=" {{route('usercalculator') }} " onsubmit="return validateForm()">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                @if(Session::has('flash_message'))
                                <div class="alert alert-info">
                                    {{ Session::get('flash_message') }}
                                </div>
                                @endif

                                <p>How many people need dental cares?</p>
                            </div>

                            <div class="col-md-12 dtl-fm-add">

                                <ul class="abc">
                                    <li>1</li>
                                    <li>2</li>
                                    <li class="active">3+</li>
                                </ul>

                            </div>
                        </div>

                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <input type="hidden"  id="people" name="people" value="3+" >
                        <div class="row control-group">
                            <div class="form-group col-md-6 controls">
                                <input type="text" class="form-control" placeholder="First Name" id="firstname" name="firstname"  value="">
                                <label id="firstname_" style="display: none; color: red"></label>
                            </div>

                            <div class="form-group col-md-6 controls">
                                <input type="text" class="form-control" placeholder="Last Name" id="lastname" name="lastname" value="<?php echo $lastname;?>">
                                <label id="lastname_" style="display: none; color: red"></label>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-md-6 controls">
                                <input type="text" class="form-control" maxlength="5"  placeholder="Zip Code" id="zipcode" name="zipcode" value="<?php echo $zipcode;?>">
                                <label id="zipcode_" style="display: none; color: red" ></label>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <input type="email" class="form-control" placeholder="Email Address" id="emailaddress" name="emailaddress" value="<?php echo $emailaddress;?>">
                                <label id="email_" style="display: none; color: red"></label>
                            </div>
                        </div>


                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember" checked> Send me a FREE personalized dental savings kit
                            </label>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <button type="submit" class="btn btn-startsaving ">CALCULATE MY SAVINGS</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </section>

</section>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script>
    function validateForm() {
        var firstname = document.forms["indexform"]["firstname"].value;
        if (firstname == "") {
            $('#firstname_').css('display', 'block');
            $('#firstname_').text('Firstname must be filled out..!');
            return false;
        } else {
            $('#firstname_').css('display', 'none');
        }
        var lname = document.forms["indexform"]["lastname"].value;
        if (lname == "") {
            $('#lastname_').css('display', 'block');
            $('#lastname_').text('Lastname must be filled out..!');
            return false;
        } else {
            $('#lastname_').css('display', 'none');
        }



        if (firstname.length < 3) {
            $('#firstname_').css('display', 'block');
            $('#firstname_').text('Firstname must be atleast of 3 digit..!');
            //alert("Firstname must be atleast of 3 digit");
            return false;
        } else {
            $('#firstname_').css('display', 'none');
        }


        if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(firstname))
        {
            $('#firstname_').css('display', 'block');
            $('#firstname_').text('Special characters is not allowed in firstname..!');
            // alert("Special characters is not allowed in firstname")
            return false;
        } else {
            $('#firstname_').css('display', 'none');
        }


        var lastname = document.forms["indexform"]["lastname"].value;
        if (/[{0-9}!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(lastname))
        {
            $('#lastname_').css('display', 'block');
            $('#lastname_').text('Special characters is not allowed in lastname..!');
            // alert("Special characters is not allowed in lastname")
            return false;
        } else {
            $('#lastname_').css('display', 'none');
        }


        var userZipcode = document.forms["indexform"]["zipcode"].value;
        if (!(/^\d{5}$/.test(userZipcode)))
        {
            $('#zipcode_').css('display', 'block');
            $('#zipcode_').text('Please enter five digit numeric zipcode..!');
            // alert("Please enter six digit numeric zipcode ")
            return false;
        } else {
            $('#zipcode_').css('display', 'none');
        }


        var userEmail = document.forms["indexform"]["emailaddress"].value;
        if (userEmail == "") {
            $('#email_').css('display', 'block');
            $('#email_').text('Please enter email address..!');
            // alert("Email must be filled out");
            return false;
        } else {
            $('#email_').css('display', 'none');
        }

        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(userEmail)))
        {
            $('#email_').css('display', 'block');
            $('#email_').text('You have to entered an invalid email address..!');
            //  alert("You have entered an invalid email address!")
            return false;
        } else {
            $('#email_').css('display', 'none');
        }
    }

    $(function () {
        $('ul.abc li').on('click', function () {
            $(this).parent().find('li.active').removeClass('active');
            $(this).addClass('active');
            document.getElementById("people").value = $(this).text();
        });

    });
$(document).ready(function () {
   $(".xxx input#firstname").keyup(function(){
    var value = $(this).val();
   $.cookie('mycookiefirstname', value, {
            expires: 365
        });
    });
   $(".xxx input#lastname").keyup(function(){
    var value = $(this).val();
   $.cookie('mycookielastname', value, {
            expires: 365
        });
    });
   $(".xxx input#zipcode").keyup(function(){
    var value = $(this).val();
   $.cookie('mycookiezipcode', value, {
            expires: 365
        });
    });
   $(".xxx input#emailaddress").keyup(function(){
    var value = $(this).val();
   $.cookie('mycookieemailaddress', value, {
            expires: 365
        });
    });
    $(".xxx input#firstname").val( $.cookie('mycookiefirstname'));
    $(".xxx input#lastname").val( $.cookie('mycookielastname'));
    $(".xxx input#zipcode").val( $.cookie('mycookiezipcode'));
    $(".xxx input#emailaddress").val( $.cookie('mycookieemailaddress'));
    <?php if($zipcode !=''){?>
		document.getElementById("mform").submit();
	<?php } ?>

});
</script>
@endsection
