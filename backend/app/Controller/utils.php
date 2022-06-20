<?php

namespace App\Controller;


trait utils{

    /**
     * @param  array  $db_data
     * @param  array|object  $input_data
     * @return array
     */
    public function checkCredentiels(array $db_data,array|object $input_data): array
    {
        var_dump($db_data);
        if ( $db_data != null){
            if (password_verify($input_data['password'] , $db_data['password'])){
               return $db_data;
            }else{
                echo 'wrong password';
            }
        }else{
            echo 'wrong email';
        }
    }
}