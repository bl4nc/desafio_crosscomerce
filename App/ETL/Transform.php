<?php

namespace App\ETL;

use App\ETL\Extract;

final class Transform

{

    function order(array $values): array
    {
        $orderned_values = [];
        for ($i = 0; $i != count($values); $i++) {
            $final_value = 0;
            $list_values = $values;
            foreach ($list_values as $index=>$value) {
                if ($value > $final_value && !in_array($value, $orderned_values))  $final_value = $value;
            }
            array_push($orderned_values, $final_value);
            for($c = 0; $c != count($list_values); $c++){
                if($list_values[$c] == $final_value)unset($final_value[$c]);
            }
        }
        return $orderned_values;
    }


    public function transform(): array
    {
        $values = (new Extract)->extract();
        $orderned_values = $this->order($values);
        return $orderned_values;
    }
}
