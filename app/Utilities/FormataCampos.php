<?php

namespace App\Utilities;

class FormataCampos{

    public static function formataCampos(array $strings){
        $data = array();
        foreach ($strings as $key => $texto){
            $texto = str_replace('-', '', $texto);
            $texto = str_replace('.', '', $texto);

            $data[$key] = $texto;
        }
        return $data;
    }
}
