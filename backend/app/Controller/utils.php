<?php

namespace App\Controller;


trait utils{

    /**
     * @param  array  $db_data
     * @param  array|object  $input_data
     * @return void
     */
    public function checkCredentiels(array $db_data,array|object $input_data){

        if ( $db_data != null){
            if (password_verify($input_data['password'] , $db_data['password'])){
                echo 'valid email and password';
            }else{
                echo 'wrong password';
            }
        }else{
            echo 'wrong email';
        }
    }
}