<?php

namespace DentalCalculator\Http\Controllers;

use DentalCalculator\Pincode;
use DentalCalculator\Network;
use Illuminate\Http\Request;
use Session;

class UploadController extends Controller {

    public function index() {
        return view('uploadfile');
    }

    public function showUploadFile(Request $request) {

        $file = $request->file('filename');



        if ($file == null) {
            return redirect()->back()->with("error", 'Please choose file to upload!');
            return redirect('/uploadfile');
        }

        $name = time() . '_uploaded';
        $destinationPath = 'app/upload';
        $filename = base_path() . '/public/app/upload/' . $name . '.csv';
        $file->move($destinationPath, $filename);
        $csv = $this->readCsvContents($filename);

        $pids = array();

        foreach ($csv as $k => $c) {
            if ($k)
                $pids[$c[1]][] = $c[0];
        }
// echo '<pre>'; print_r($pids);  die;
        foreach ($pids as $key => $pid) {
            //  echo $key; die;
            $network = new Network;
            if ($key == 'DS 1') {
                $key = 'DS 1.00';
            } elseif ($key == 'DS 0.9') {
                $key = 'DS 0.90';
            } elseif ($key== 'DS 1.1') {
               $key = 'DS 1.10';
            } elseif ($key == 'DS 1.2') {
                $key = 'DS 1.20';
            } elseif ($key == 'DS 1.3') {
                $key = 'DS 1.30';
            }
            $network->network_code = $key;
            $network->save();
            if (is_array($pid)) {
                foreach ($pid as $pid) {
                    $pin = new Pincode;
                    $pin->pin_code = $pid;
                    $pin->network_id = $network->id;
                    $pin->save();
                }
            }
        }
        return redirect()->back()->with("success", 'File uploaded successfully');
        return redirect('/uploadfile');
    }

    public function readCsvContents($filename) {
        //   base_path().'/app/upload/'; die;

        if (file_exists($filename)) {

            $point = ',';

            $fp = fopen($filename, 'r');
            if ($fp) {
                $line = fgetcsv($fp, 1000, ",");
                $first_time = true;
                do {
                    $csv[] = $line;
                } while (($line = fgetcsv($fp, 1000, "$point")) != FALSE);
            }

            return $csv;
        } else {
            echo 'file not found..!';
        }
    }

    public function uploadds() {
        return view('uploaddsfile');
    }

    public function showUploadDsFile(Request $request) {
        $file = $request->file('filename');
        if ($file == null) {
            return redirect()->back()->with("error", 'Please choose file to upload!');
            return redirect('/uploaddsfile');
        }
        $name = time() . '_uploaded';
        $destinationPath = 'app/upload';
        $filename = base_path() . '/public/app/upload/' . $name . '.csv';
        $file->move($destinationPath, $filename);
        $csv = $this->readCsvContents($filename);

        //
        $this->saveCsv($csv);
        return redirect()->back()->with("success", 'File uploaded successfully');
        return redirect('/uploaddsfile');
    }

    public function saveCsv($csv) {
        $key = array(0, 2, 13);
        $course = '';
        $pr_id = '';
        $a = array();
//echo '<pre>'; print_r($csv); die;
        foreach ($csv as $k => $cs) {
            if (!$cs[0] && !$cs[1] && $cs[2] && $cs[3]) {
                $arr = $cs;
                for ($s = 2; $s < 13; $s++) {
                    if ($cs[$s] == 'DS 1') {
                        $cs[$s] = 'DS 1.00';
                    } elseif ($cs[$s] == 'DS 0.9') {
                        $cs[$s] = 'DS 0.90';
                    } elseif ($cs[$s] == 'DS 1.1') {
                        $cs[$s] = 'DS 1.10';
                    } elseif ($cs[$s] == 'DS 1.2') {
                        $cs[$s] = 'DS 1.20';
                    } elseif ($cs[$s] == 'DS 1.3') {
                        $cs[$s] = 'DS 1.30';
                    }

                    $network = Network::where('network_code', "$cs[$s]")->get();
                    $network = $network->toArray();
                    if (empty($network)) {
                        $network = new Network;
                        $network->network_code = $cs[$s];
                        $network->save();
                        $network = $network->toArray();
                        $net_id = $network['id'];
                    }
                }
            }
            if ($cs[0] && !$cs[1] && !$cs[2] && !$cs[3]) {
                $procedure = new \DentalCalculator\Procedure;
                $procedure->name = $cs[0];
                $procedure->status = 1;
                $procedure->save();
                $procedure = $procedure->toArray();
                $pr_id = $procedure['id'];
            }

            if ($cs[0] && $cs[1] && $cs[2] && $cs[3]) {
                $course = new \DentalCalculator\Course;
                $course->procedure_id = $pr_id;
                $course->code = $cs[0];
                $course->course_name = $cs[1];
                $course->save();
                $course_id = $course['id'];
                $k = 13;
                $networks = Network::all();
                $networks = $networks->toArray();
//                echo '<pre>';
//                print_r($networks);
//                die;

                foreach ($networks as $networ) {
                    $a[$networ['network_code']] = $networ['id'];
                }

                for ($i = 2; $i < 13; $i++) {
                    $usual = new \DentalCalculator\UsualFee;
                    $usual->fees = $cs[$i];
                    $usual->dental_fees = $cs[$k];
                    $usual->procedure_id = $pr_id;
                    $usual->course_id = $course_id;
                    $usual->network_id = $a["$arr[$i]"];
                    $usual->status = 1;
                    $k++;
                    $usual->save();
                }
                //   }
            }
        }

        return true;
    }

}

/*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    
