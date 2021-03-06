<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Models\Parameters\BasicParameter;
use App\Models\Leasing\LeasingParameter;
use App\Models\Parameters\ParameterSection;
use App\Models\Parameters\OtherPhoto;

class ComposerServiceProvider extends ServiceProvider

{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        View::composer('*', function($view) {
            $BasicParameter = new BasicParameter();
            $BasicParameter = $BasicParameter::where('deleted_at_int', '!=', 0)->get();

            $ParameterArray = [];

            foreach($BasicParameter as $ParameterItem) {
                $ParameterArray[$ParameterItem->key][] = $ParameterItem->value;
            }

            $LeasingParameter = new LeasingParameter();
            $LeasingParameter = $LeasingParameter::where('deleted_at_int', '!=', 0)->get();

            $LeasingArray = [];

            foreach($LeasingParameter as $LeasingParameterItem) {
                $LeasingArray[$LeasingParameterItem->key][] = $LeasingParameterItem->value;
            }

            $ParameterSection = new ParameterSection();
            $ParameterSection = $ParameterSection::where('deleted_at_int', '!=', 0)->get();

            $SectionArray = [];

            foreach($ParameterSection as $ParameterSectionItem) {
                $SectionArray[$ParameterSectionItem->key][] = $ParameterSectionItem->status;
            }

            $OtherPhoto = new OtherPhoto();
            $OtherPhotoList = $OtherPhoto::where('deleted_at_int', '!=', 0)->get();

            $OtherPhotosArray = [];

            foreach($OtherPhotoList as $OtherPhotoItem) {
                $OtherPhotosArray[$OtherPhotoItem->id][] = $OtherPhotoItem->photo;
            }

            $view->with('otherPhotos', $OtherPhotosArray);
            $view->with('sectionStatus', $SectionArray);
            $view->with('parameterItems', $ParameterArray);
            $view->with('parameterLeasing', $LeasingArray);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
