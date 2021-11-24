<?php

namespace App\ETL;

final class Extract

{

    function request_numbers(int $page): array
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://challenge.dienekes.com.br/api/numbers?page=$page",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true)['numbers'] ?? [];
    }

    public function extract(): array
    {
        $numbers = [];
        $page = 0;
        do {
            $page++;
            $page_numbers = $this->request_numbers($page);
            foreach ($page_numbers as $number) array_push($numbers, $number);
        } while (count($page_numbers) != 0);
        return (array_values($numbers));
    }
}
