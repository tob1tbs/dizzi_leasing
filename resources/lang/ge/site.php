<?php

use App\Models\Parameters\TranslateParameter;

$TranslateParameter = new TranslateParameter();
$TranslateParameterList = TranslateParameter::where('deleted_at_int', '!=', 0)->get()->toArray();

foreach ($TranslateParameterList as $Item) {
    $ItemJson = json_decode($Item['value'], true);
    $ReturnArray[$Item['key']] = $ItemJson['ge'];
}

return $ReturnArray;


