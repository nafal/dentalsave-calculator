<!DOCTYTPE html>
<html>
    <head>
        <title></title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="{{ asset('css/assets/css/bootstrap.css') }}" rel="stylesheet">
        <!--external css-->
        <link href="{{ asset('css/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/assets/css/zabuto_calendar.css') }}">
        <link href="{{ asset('css/assets/css/lineicons/style.css') }}" rel="stylesheet">   

        <!-- Custom styles for this template -->

        <link href="{{ asset('css/assets/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <?php $fileth = base_path() . '/public/app/upload/'; ?>
        <table style="width: 100%;">
            <tr>
                <th style="padding-left: 190px;"><img style="height: 18%;width:45%;" src="<?php echo $fileth ?>/logo-orig.png" > </th>
            </tr>
            <tr>
                
                <td align="center"><h2 class="title">Your Discount Plan Savings</h2></td>
                
            </tr>
        </table> 
        <hr>
        <table  style="width: 100%;">
            <tr style="background: #69C8F1;">
                <th class="head">Procedure Name
                    (ADA Code)</th>
                <th class="head">Area</th>
                <th class="head">Quantity</th>
                <th class="head">Average Price WITHOUT
                    DentalSave</th> 
                <th class="head">Dentalsave
                    Member Price</th>
                <th class="head">Saving</th>
            </tr>
            <?php
            if ($data && !empty($data ['pro_name'])) {
                foreach ($data ['pro_name'] as $k => $data1) {
                    ?>
                    <tr>
                        <td><?php echo $data1 ?></td>
                        <td><?php echo $data['area'][$k] ?></td>
                        <td><?php echo $data['qty_'][$k] ?></td>
                        <td><?php echo $data['a_p_w_ds_'][$k] ?></td>
                        <td><?php echo $data['d_s_m_p_'][$k] ?></td>
                        <td><?php echo $data['a_m_save'][$k] ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr >

                <td colspan="3" style="font-size:12px;"><b>Total Procedure Price</b></td>
                <td style="color:red;font-size:16px;"><?php echo $data['total_apwds'] ?></td>
                <td style="font-size:16px"><b><?php echo $data['total_dmp'] ?></b></td>
                <td style="color:green;font-size:16px;"><?php echo $data['total_amd'] ?></td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td  colspan="6" style="font-size:16px;text-align: center;">
                    <?php echo 'Fees listed above are based on <b>' . $data["network"] . ' </b> Fee Schedule for a General Dentist located in Postal Code. <b>' . $data['zipcode'] . '</b>'; ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td  colspan="6" style="font-size:12px;color:#98a2a5;text-align: center;">
                    <?php echo '*Based on average prices published by NDAS. Check with your dentist to confirm proper ADA codes for your care plan.'; ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <table style="width: 100%;">
                        <tr>
                            <td colspan="2" style="font-size:13px;color:#69C8F1;text-align: center;"><b>A DentalSave Plan Could Save You:</b> </td>                            
                        </tr>
                        <tr><td colspan="3">&nbsp;</td></tr>
                        <tr>
                            <td style="font-size:14px;color:green;text-align: center;"><h4><?php echo $data['total_amd']; ?></h4> <br>Dollars </td>
                            <td style="font-size:14px;color:#69C8F1;text-align: center;"><h4><?php echo $data['total_per']; ?></h4><br> Of your Dental bill</td>
                        </tr>
                    </table> 
                </td>
                <td colspan="1">&nbsp;</td>
                <td colspan="2">
                    <table style="width: 100%;">
                        <tr>                            
                            <td colspan="2" style="font-size:12px;text-align: center;"><b>Cost of procedures WITHOUT DentalSave</b></td>
                        </tr>
                        <tr>
                            <td style="width: 100%; background: red; text-align: right;"><?php echo $data['total_per']; ?></td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td colspan="2" style="font-size:12px;text-align: center;"><b>Cost of procedures WITH DentalSave</b></td>
                        </tr>
                        <tr>
                            <td style="background: green; text-align: right" ><span style="width: <?php echo $data['total_per']; ?> ; background: green;"  ><?php echo $data['total_amd']; ?></span></td>
                        </tr>
                    </table>    
                </td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6" style="color:#69C8F1; text-align: center;"><h2>Recommended plan</h2></td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr style="background-color: #dfdfe1">
                <td colspan="3">
                    <table style="width:100%;">
                        <tr>
                            <td align="center"><img  src="<?php echo $fileth ?>/group-3.png" ></td>
                        </tr>
                        <tr>
                            <td class="center" style="color:#69C8F1;"><h4><b>Family Plan</b></h4></td>
                        </tr>
                        <tr>
                            <td class="center" ><h5>Save 15% when you pay annually</h5></td>
                        </tr>
                        <tr>
                            <td class="center ">
                                <a style="width: 100%;background-color:#69C8F1;color:white;border-color:#69C8F1;" href="https://dentalsave.com/?utm_source=calculator_pdf" class="btn btn-success">
                                    <h5> Annual Plan -$199</h5>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="center">
                                <a  style="width: 100%;background-color:lightgrey;color:white;border-color:lightgrey;"  href="https://dentalsave.com/?utm_source=calculator_pdf"  class="btn btn-success">
                                    <h5><b>   Monthly Plan -$17.95</b></h5>
                                </a>
                            </td>
                        </tr>
                    </table> 
                </td>
                <td colspan="1">&nbsp;</td>
                <td colspan="2">
                    <table style="width:100%;text-align: center;">
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td style="color:#69C8F1;"><br><h4>Plans Include:</h4></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td><h7>Access for 3+ people</h7></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td><h7>20-50% Off Every Dental Visit with a Participating Location</h7></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                            </td>
                        <tr>
                            <td><h7>Access to over 10,000 DentalSave dental locations</h7></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                            </td>
                        <tr>
                            <td><h7>Access to over 40,000 Careington dental Locations</h7></td>
                        </tr>
                        <tr>
                            <td><h7>Visiion Savings with EyeMed</h7></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                            </td>
                        <tr>
                            <td><h7>Hearing Savings with Amplifon</h7></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                            </td>
                        <tr>  
                            <td><h7>Prescription Drug Savings with MedImpact</h7>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="6" Style="text-align:center;"><h4><b>Visit <a style="color:#69C8F1;" href="https://dentalsave.com/?utm_source=calculator_pdf">DentalSave.com</a> or call <span style="color:#69C8F1;">1.800.500.1530</span> to join today!</b></h4></td>
            </tr>
        </table>    


    </body>
    <style>
        .right
        {
            text-align: right;
        }
        .left{
            text-align: left;                 
        } 
        .title
        {
            color:#69C8F1;
            text-align: center;
        }
        .center
        {
            text-align: center;                     
        }
        .tabletext{
            font-size: 10px;
            color: #98a2a5;
        }      
        .head{
            color:white;
            font-size: 11px;
        }    
        .leftpad   {
            padding-left: 500px;                        
        }
    </style>
</html>







