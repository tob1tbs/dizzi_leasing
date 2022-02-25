<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Parameters\BasicParameter;

use Carbon\Carbon;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        
    }

    public function localeList() {
        $locale_list = ['ge', 'en'];
        return $locale_list;
    }

    public function getMonthList() {
        $month_list = [
            '1' => 'იანვარი',
            '2' => 'თებერვალი',
            '3' => 'მარტი',
            '4' => 'აპრილი',
            '5' => 'მაისი',
            '6' => 'ივნისი',
            '7' => 'ივლისი',
            '8' => 'აგვისტო',
            '9' => 'სექტემბერი',
            '10' => 'ოქტომბერი',
            '11' => 'ნოემბერი',
            '12' => 'დეკემბერი',
        ];
        return $month_list;
    }

    public function getYearList() {
        $year_list = [
            '2020',
            '2021',
            '2022',
        ];
        return $year_list;
    }

    public function getPhoneIndex() {
        $index_list = [
            '599','595','591','551','598','596','577','514','555','557','558','568','571','574','592','597','593', '579', '511',
        ];
        return $index_list;
    }

    public function getGetSteringWheel() {
        $stering_wheel = [
            'left' => ['ge' => 'მარცხენა', 'en' => 'Left'],
            'right' => ['ge' => 'მარჯვენა', 'en' => 'Right'],
        ];
        return $stering_wheel;
    }

    public function getGetFuel() {
        $fuel = [
            'petrol' => ['ge' => 'ბენზინი', 'en' => 'Petrol'],
            'diesel' => ['ge' => 'დიზელი', 'en' => 'Diesel'],
            'hybrid' => ['ge' => 'ჰიბრიდი', 'en' => 'Hybrid'],
            'electric' => ['ge' => 'ელექტრო', 'en' => 'Electric'],
            'cng' => ['ge' => 'გაზი', 'en' => 'CNG'],
        ];
        return $fuel;
    }

    public function getGetCarBody() {
        $car_body = [
            'sedan' => ['ge' => 'სედანი', 'en' => 'Sedan'],
            'hatchback' => ['ge' => 'ჰეჩბექი', 'en' => 'Hatchback'],
            'suv' => ['ge' => 'ჯიპი', 'en' => 'Suv'],
            'vagon' => ['ge' => 'უნივერსალი', 'en' => 'Vagon'],
            'coupe' => ['ge' => 'კუპე', 'en' => 'Coupe'],
            'van' => ['ge' => ' მინივენი', 'en' => 'Van'],
            'pickup' => ['ge' => 'პიკაპი', 'en' => 'Pickup'],
            'limousine' => ['ge' => 'ლიმუზინი', 'en' => 'Limousine'],
            'convertible' => ['ge' => 'კაბრიოლეტი', 'en' => 'Convertible'],
        ];

        return $car_body;
    }

    public function getGetGearBox() {
        $gear_box = [
            'manual' => ['ge' => 'მექანიკური', 'en' => 'Manual'],
            'automatic' => ['ge' => 'ავტომატიკა', 'en' => 'Automatic'],
            'semi-automatic' => ['ge' => 'ტიპტრონიკი', 'en' => 'Semi-automatic'],
            'variator' => ['ge' => 'ვარიატორი', 'en' => 'Variator'],
            'robot' => ['ge' => 'რობოტი', 'en' => 'Robot'],
        ];

        return $gear_box;
    }

    public function getYear() {
        $years = range(Carbon::now()->format('Y'), 1990);
        return $years;
    }

    public function getEngineVolume() {
        $volume = ['0.05','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9','1.0','1.1','1.2','1.3','1.4','1.5','1.6','1.7','1.8','1.9','2.0','2.1','2.2','2.3','2.4','2.5','2.6','2.7','2.8','2.9','3.0','3.1','3.2','3.3','3.4','3.5','3.6','3.7','3.8','3.9','4.0','4.1','4.2','4.3','4.4','4.5','4.6','4.7','4.8','4.9','5.0','5.1','5.2','5.3','5.4','5.5','5.6','5.7','5.8','5.9','6.0','6.1','6.2','6.3','6.4','6.5','6.6','6.7','6.8','6.9','7.0','7.1','7.2','7.3','7.4','7.5','7.6','7.7','7.8','7.9','8.0','8.1','8.2','8.3','8.4','8.5','8.6','8.7','8.8','8.9','9.0','9.1','9.2','9.3','9.4','9.5','9.6','9.7','9.8','9.9','10.0'];
        return $volume;
    }
}
