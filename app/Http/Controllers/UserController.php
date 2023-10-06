<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\Course;
use DentalCalculator\UsualFee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
//use Illuminate\Http\Request;
use App\Post;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('guest', array('except' => array('userhome')));
    }

    public function index() {
        return view('users.login');
    }

    public function userCalculatorForm(Request $request) {
//echo '<pre>'; print_r($_POST); die;

        $firstname = trim($_POST['firstname']);
        $firstname = strip_tags($firstname);
        $firstname = htmlspecialchars($firstname);

        $email = trim($_POST['emailaddress']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $userZipcode = trim($_POST['zipcode']);

        $userZipcode = strip_tags($userZipcode);
        $userZipcode = htmlspecialchars($userZipcode);

        //Firstname validation

        if (empty($firstname)) {
            $error = true;
            $nameError = "Please enter your firstname.";
        } else if (strlen($firstname) < 3) {
            $error = true;
            $nameError = "Firstname must have atleat 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        }

        if (isset($nameError)) {
            Session::flash('flash_message', $nameError);
            return redirect('/');
        }

//Zipcode validation
        if (empty($userZipcode)) {
            $error = true;
            $zipError = "Please enter zipcode.";
        } else if (!preg_match("/^\d{5}$/", $userZipcode)) {
            $error = true;
            $zipError = "Zipcode must be five digit long.";
        }
        if (isset($zipError)) {
            Session::flash('flash_message', $zipError);
            return redirect('/');
        }
        //Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please enter valid email address.";
        }

        if (isset($emailError)) {
            Session::flash('flash_message', $emailError);
            return redirect('/');
        }

        $userdetails = Request::all();

        Session::push('userdetails', $userdetails);
        $data1 = Session::get('userdetails');
        
        $dd = $_POST;

        /*         * ****************************
          Lead send code
         * **************************** */

        $post = $_POST;
//           echo '<pre>';
//        print_r($post);
//        die;
        if ($post['people'] == '1') {
            $post['people'] = 'Individual';
        } elseif ($post['people'] == '2') {
            $post['people'] = 'Dual';
        } else {
            $post['people'] = 'Family';
        }
        $xmldata = '<Leads>
            <row no="1">
            <FL val="First Name">' . $post["firstname"] . '</FL>
            <FL val="Last Name">' . $post["lastname"] . '</FL>
            <FL val="Email">' . $post["emailaddress"] . '</FL>
            <FL val="Zip Code">' . $post["zipcode"] . '</FL>
            <FL val="Lead Source"> Savings Calculator</FL>
            <FL val="Country"></FL>
            <FL val="Lead Status">Sent</FL>
            <FL val="Description">' . $post['people'] . '</FL>
            </row>
            </Leads>';
        $url = "https://crm.zoho.com/crm/private/xml/Leads/insertRecords";
        //$params = "newFormat=1&authtoken=e3a6beb8f6154642d32632f9635621a9&scope=crmapi&wfTrigger=true&xmlData=" . $xmldata;
        //$params = "newFormat=1&authtoken=a071b5206a73aee158859b6058f618e6&scope=crmapi&wfTrigger=true&xmlData=" . $xmldata;
        $params = "newFormat=1&authtoken=6fb1c28bc16539ee595cdf7d58b587c9&scope=crmapi&wfTrigger=true&xmlData=" . $xmldata;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($ch);
        curl_close($ch);
//        echo '<pre>';
//        print_r($result);
//        die; 

        /*         * ****************************
         * Lead code end
         * ****************************** */

        //   $this->sendLead();
        $userZipcod = substr($userZipcode, 0, 3);
        $pincodes = \DB::table('pincodes');
        $pincodes->where('pin_code', '=', "$userZipcod");
        $pincodes = $pincodes->get();
        $pincodes = $pincodes->toArray();
        if (!empty($pincodes)) {
            $network = $pincodes[0]->network_id;
        } else {
            $network = '';
        }
        $net = \DB::table('networks');
        $net->where('id', '=', "$network");
        $net = $net->get();
        $net = $net->toArray();
        if (!empty($net)) {
            $netw = $net[0]->network_code;
        } else {
            $netw = '';
        }

        if (!$network) {
            $zip = "Invalid post code";
            Session::flash('flash_message', $zip);
            return redirect('/');
        }

        $usual = \DB::table('usual_fees');
        $usual->where('network_id', '=', "$network");
        $usual = $usual->get();
        $usual = $usual->toArray();
        $courses = array();
        foreach ($usual as $f => $ntw) {
            $courses[] = $ntw->course_id;
        }
        $course = \DB::table('courses');
        $course->whereIn('id', $courses);
        $data2 = $course->get();
        $data2 = $data2->toArray();
        $data = array();
        foreach ($data2 as $k => $data2) {
            $data[$k]["id"] = $data2->id;
            $data[$k]["label"] = $data2->course_name;
            $data[$k]["value"] = $data2->course_name;
            $data[$k]["net_id"] = $network;
        }
        //  print_r($dd); die;
        return view('users.usercalculator', compact('data', 'data1', 'dd', 'netw', 'network'));
    }

    public function searchResponse(Request $request) {
        $query = $request->get('term', '');
        echo $query;
        die;
        $courses = \DB::table('courses');
        if ($request->type == 'textbox') {
            $courses->where('course_name', 'LIKE', '%' . $query . '%');
        }
        $courses = $courses->get();
        $data = array();
        foreach ($courses as $course) {
            $data[] = array('textbox' => $course->course_name);
        }
        if (count($data))
            return $data;
        else
            return ['textbox' => ''];
    }

    public function index1() {

        return view('users.usercalculator');
    }

    public function getgrid($id, $b = null) {
        $usual = array();
        $aaaa = array('3', '4', '12', '25');
        if ($_GET['b']) {
            $b = $_GET['b'];
            $net_id = $_GET['net_id'];
            $usual = \DB::table('usual_fees');
            if ($b != "xxx") {
                $usual->where('course_id', '=', "$b");
            } else {
                $usual->orWhereIn('course_id', $aaaa);
            }
            $usual->where('network_id', '=', "$net_id");

            $usual = $usual->get();
            $usual = $usual->toArray();
        }
        $html = '';
        if (!empty($usual)) {
            foreach ($usual as $usual) {

                $html .= '<tr class="ajax_tr" id="' . $usual->id . '"><td>' . UsualFee::getCourse($usual->course_id) . '</td>';
                $html .= '<td> ' . UsualFee::getProcedure($usual->procedure_id) . '</td >';
                $html .= '<input type="hidden" id="uf_' . $usual->id . '" value="' . $usual->fees . '" /><input type="hidden" id="udf_' . $usual->id . '" value="' . $usual->dental_fees . '" /><input type="hidden" id="uf_udf_' . $usual->id . '" value="$' . (str_replace(",", "", str_replace('$', '', $usual->fees)) - str_replace(",", "", str_replace('$', '', $usual->dental_fees))) . '" />';
                $html .= '<td class="quantity"><div class="inputWrapper">
                <input id="qw_' . $usual->id . '" max="" min="1" class="txtInput form-control" value="1" type="text">
                <div class="cusWrap">
                  <button class="cusBTN" onclick="calculate(' . $usual->id . ', 1)" type="button">+</button>
                  <button class="cusBTN" onclick="calculate(' . $usual->id . ', 0)"  type="button">-</button>
                </div>';
                $html .= '<input class="pro_name_' . $usual->id . '" type="hidden" name="pro_name[' . $usual->id . '][]" value="' . UsualFee::getCourse($usual->course_id) . '" />';
                $html .= '<input class="area_' . $usual->id . '" type="hidden" name="area[' . $usual->id . '][]" value="' . UsualFee::getProcedure($usual->procedure_id) . '" />';
//                $html .= '<input class="qty_' . $usual->id . '" type="hidden" name="qty_[' . $usual->id . '][]" value="1" />';
//                $html .= '<input class="apvd_' . $usual->id . '" type="hidden" name="apvd[' . $usual->id . '][]" value="' . $usual->fees . '" />';
//                $html .= '<input class="dsmp_' . $usual->id . '" type="hidden" name="dsmp[' . $usual->id . '][]" value="' . $usual->dental_fees . '" />';
//                $html .= '<input class="amd_' . $usual->id . '" type="hidden" name="amd[' . $usual->id . '][]" value="$' . (str_replace(",", "", str_replace('$', '', $usual->fees)) - str_replace(",", "", str_replace('$', '', $usual->dental_fees))) . '" />';

                $html .= '</td>';
                $html .= '<td class="average-price_' . $usual->id . '">  ' . $usual->fees . '</td>';
                $html .= '<td class="member-price_' . $usual->id . '">' . $usual->dental_fees . '</td>';
                $html .= '<td class="saving_' . $usual->id . '">$' . (str_replace(",", "", str_replace('$', '', $usual->fees)) - str_replace(",", "", str_replace('$', '', $usual->dental_fees))) . '</td>';
                $html .= '<td><i style="cursor:pointer" vvid="' . $usual->id . '" class="fa fa-remove removetr"></i></td></tr>';
            }
        } else {
            $html .= '<tr><td colspan="6">No record(s) found for this course..!</td><tr>';
        }
        echo $html;
        die;
    }

//    public function getGrid() {
//
//        $html = '<tr><td>&nbsp;<span>&nbsp;</span></td>';
//        $html .= '<td>&nbsp;        </td >';
//        $html .= '<td class="quantity"><input type="number" value="1"></td>';
//        $html .= '<td class="average-price">$41</td>';
//        $html .= '<td class="member-price">$18.50</td>';
//        $html .= '<td class="saving">$23.10</td></tr>';
//        echo $html;
//        exit();
//    }
//e3a6beb8f6154642d32632f9635621a9
    public function sendLead() {

        return true;
    }

}
