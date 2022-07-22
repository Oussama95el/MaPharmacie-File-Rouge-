<?php

namespace App\Controller;


trait utils{


    public function checkCredentiels(array $db_data,array|object $input_data)
    {
        if ( $db_data != null){
            if (password_verify($input_data['password'] , $db_data['password'])){
                echo json_encode($db_data);
            }else{
                echo json_encode('error');
            }
        }else{
            echo json_encode('error');
        }
    }
}