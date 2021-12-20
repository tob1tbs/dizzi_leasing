<?php

namespace App\Http\Controllers\ServiceControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Logs\CrmLog;

class CrmController extends Controller
{
    //
    public function __construct() {

    }

    public function serviceCrmSend($data) {
        // dd(http_build_query($data));
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ingeni.app/31/sites/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($data)
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function serviceCrmSaveLog($log_data, $method, $response) {
        $CrmLog = new CrmLog();
        $CrmLog->method = $method;
        $CrmLog->response = json_encode($response);
        $CrmLog->value = json_encode($log_data, JSON_UNESCAPED_UNICODE);
        $CrmLog->save();
    }
}
