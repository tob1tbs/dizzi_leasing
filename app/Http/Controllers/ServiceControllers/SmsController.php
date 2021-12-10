<?php

namespace App\Http\Controllers\ServiceController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    //

    protected $url;
    protected $apikey;
    protected $smsno;

    public function __construct() {
        $this->url = 'https://sender.ge/api/send.php';
        $this->apikey = ;
        $this->smsno = 2;
    }

    public function serviceSmsSend($phone, $text) {
        $fields = array(
           'apikey' => $this->apikey,
           'smsno' => $this->smsno,
           'destination' => $phone,
           'content' => $text
        );
        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $output;
    }

    public function serviceSaveLog($log_data) {

    }
}
