<?php

use App\Models\Parameters\TranslateParameter;
use App\Models\Parameters\BasicParameter;

$TranslateParameter = new TranslateParameter();
$TranslateParameterList = TranslateParameter::where('deleted_at_int', '!=', 0)->get()->toArray();

$BasicParameter = new BasicParameter();
$BasicParameterLocale = $BasicParameter::where('key', 'locale')->first();

foreach ($TranslateParameterList as $Item) {
    $ItemJson = json_decode($Item['value'], true);
    $ReturnArray[$Item['key']] = $ItemJson[$BasicParameterLocale->value];
}

return $ReturnArray;


