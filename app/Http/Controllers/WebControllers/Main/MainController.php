<?php

namespace App\Http\Controllers\WebControllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parameters\BasicParameter;
use App\Models\Cars\CarData;
use App\Models\Blogs\Blog;
use App\Models\Reviews\Review;
use App\Models\TextPage\TextPage;
use App\Models\Parameters\StepPhoto;
use App\Models\Main\Faq;
use App\Models\Leasing\LeasingParameter;

use Session;

class MainController extends Controller
{
    //
    public function __construct() {
        
    }

    public function actionWebMain(Request $Request) {
        if (view()->exists('web.sections.main.main')) {

            $CarData = new CarData();
            $CarList = $CarData::where('deleted_at_int', '!=', 0)
                                                                ->where('status', 1)
                                                                ->limit(4)
                                                                ->get()
                                                                ->load('carMake')
                                                                ->load('carModel')
                                                                ->load('carParameter')
                                                                ->toArray();

            $CarArray = [];

            foreach($CarList as $CarItem) {
                $CarArray[$CarItem['id']] = [
                    'car_id' => $CarItem['id'],
                    'car_make' => $CarItem['car_make']['name'],
                    'car_model' => $CarItem['car_model']['name'],
                    'car_photo' => $CarItem['photo'],
                    'car_price' => $CarItem['price'],
                ];

                foreach($CarItem['car_parameter'] as $CarPrice) {
                    if($CarPrice['key'] == 'price') {
                        $CarArray[$CarItem['id']]['car_price'] = $CarPrice['value'];
                    }
                }
            }

            $Faq = new Faq();
            $FaqList = $Faq::where('status', 1)->where('deleted_at_int', '!=', 0)->limit(8)->get()->toArray();

            $Blog = new Blog();
            $BlogList = $Blog::where('deleted_at_int', '!=', 0)->where('status', 1)->get()->toArray();

            $Review = new Review();
            $ReviewList = $Review::where('deleted_at_int', '!=', 0)->where('approve', '!=', 0)->get()->toArray();


            $TextPage = new TextPage();
            $TextPageList = $TextPage::where('deleted_at_int', '!=', 0)->get()->toArray();

            $BasicParameter = new BasicParameter();
            $BasicParameterLocale = $BasicParameter::where('key', 'locale')->first();

            $TextPageArray = [];

            foreach($TextPageList as $TextKey => $TextValue) {
                $TextPageArray[$TextValue['slug']] = $TextValue['value'];
            }

            $StepArray = [];

            $StepPhoto = new StepPhoto();
            $StepPhotoList = $StepPhoto::where('deleted_at_int', '!=', 0)->get()->toArray();

            foreach($StepPhotoList as $StepKey => $StepValue) {
                $StepArray[$StepValue['step']] = $StepValue['photo'];
            }

            $SeoData = [
                'title_ge' => json_decode($TextPageList[1]['title'])->{$BasicParameterLocale->value},
                'description_ge' => json_decode($TextPageList[1]['description'])->{$BasicParameterLocale->value},
                'keywords_ge' => json_decode($TextPageList[1]['keywords'])->{$BasicParameterLocale->value},
            ];

            $data = [
                'car_list' => $CarArray,
                'faq_list' => $FaqList,
                'blog_list' => $BlogList,
                'review_list' => $ReviewList,
                'text_list' => $TextPageArray,
                'step_list' => $StepArray,
                'seo_data' => $SeoData,
            ];
            return view('web.sections.main.main', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebRequsites(Request $Request) {
        if (view()->exists('web.sections.main.requsites')) {

            $BasicParameter = new BasicParameter();
            $RequsitesList = $BasicParameter::where('key', 'company_code')
            ->orWhere('key', 'tbc_account_number')
            ->orWhere('key', 'bog_account_number')
            ->orWhere('key', 'company_name_ge')
            ->where('deleted_at_int', '!=', 0)->orderBy('sortable', 'ASC')->get();

            $SeoData = [
                'title_ge' => 'რეკვიზიტები',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'ავტოლიზინგი, ლიზინგი, ავტომობილი, სესხი, დიზი, dizi',
            ];

            $data = [
                'requsites' => $RequsitesList,
                'seo_data' => $SeoData,
            ];
            return view('web.sections.main.requsites', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebAboutUs(Request $Request) {
        if (view()->exists('web.sections.main.about')) {
            
            $TextPage = new TextPage();
            $TextPageData = $TextPage::where('slug', 'about-us')->firstOrFail();

            $SeoData = [
                'title_ge' => 'ჩვენ შესახებ',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'ავტოლიზინგი, ლიზინგი, ავტომობილი, სესხი, დიზი, dizi',
            ];

            $data = [
                'page_data' => $TextPageData,
                'seo_data' => $SeoData,
            ];
            return view('web.sections.main.about', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebFaq(Request $Request) {
        if (view()->exists('web.sections.main.faq')) {

            $Faq = new Faq();
            $FaqList = $Faq::where('status', 1)->where('deleted_at_int', '!=', 0)->get()->toArray();

            $SeoData = [
                'title_ge' => 'ხშირად დასმული კითხვები',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'ავტოლიზინგი, ლიზინგი, ავტომობილი, სესხი, დიზი, dizi',
            ];

            $data = [
                'faq_list' => $FaqList,
                'seo_data' => $SeoData,
            ];
            return view('web.sections.main.faq', $data);
        } else {
            abort('404');
        }
    }

    public function actionWebContact() {
        if (view()->exists('web.sections.main.contact')) {

            $SeoData = [
                'title_ge' => 'კონტაქტი',
                'description_ge' => 'სწრაფი და მარტივი ავტო ლიზინგი',
                'keywords_ge' => 'ავტოლიზინგი, ლიზინგი, ავტომობილი, სესხი, დიზი, dizi',
            ];

            $data = [
                'seo_data' => $SeoData,
            ];
            return view('web.sections.main.contact', $data);
        } else {
            abort('404');
        }
    }
}
