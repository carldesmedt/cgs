<?php

namespace App\Actions\Admin;

class ReadCsv {

    public function readCsv()
        {
            $filename = '../Storage/app/public/Planning_Helpdesk_2024.csv';
            $data = [];

            $f = fopen($filename, 'r');

            if($f === false){
                dd('cannot open file');
            }

            while (($row = fgetcsv($f, 0, ';' )) !==false){
                $data[] = $row;
            }

            fclose($f);

            return $data;
        }
    
}