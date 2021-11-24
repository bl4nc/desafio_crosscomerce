<?php

namespace App\ETL;

use App\ETL\Extract;

final class Transform

{

    function order(array $values): array
    {
        $orderned_values = [];
        $qnt = count($values);
        for ($i = 0; $i != $qnt; $i++) {
            $final_value = 0;
            $pos = 0;
            foreach ($values as $index => $value) {
                if ($value > $final_value ) {
                    $final_value = $value;
                    $pos = $index;
                }
            }
            array_push($orderned_values, $final_value);
            unset($values[$pos]);
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
