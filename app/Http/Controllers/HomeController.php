<?php

namespace DentalCalculator\Http\Controllers;

//use niklasravnsborg\LaravelPdf\Facades\Pdf;
//use niklasravnsborg\LaravelPdf\Pdf;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct() {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
	//echo 'hi';die;
        return view('home');
    }

    public function pdf() {
        
        $data = $_POST;
      //  echo '<pre>'; print_r($_POST); die;
       
        $pdf = Pdf::loadView('pdf', compact('data')); //Pdf::loadHTML($data['pdf_outer']);
         $filename = base_path() . '/public/app/upload/DentalSave.pdf';
       
        $pdf->save($filename);

        $message = 'Hello,';
        $data1 = Session::get('userdetails');

        $count = count($data1) - 1;
        //  $data['email'] = $data1['']
        $data = array('name' => "DentalSave", 'file' => $filename, 'email' => $data1[$count]['emailaddress']);

        Mail::send('mail', $data, function($message) use ($data) {
            $message->to($data['email'], 'Dental Save')->subject('DentalSave ');
            $message->attach(base_path() . '/public/app/upload/DentalSave.pdf');
            $message->from('notifications@dentalsave.com', 'DentalSave Team');
        });
        echo '1';
        exit;
//        Session::flash('flash_message', "Please check your email..");
//        return redirect('/');
    }

}
