<?php

namespace App\Traits;

trait HttpResponce {

        protected function sucsess($data,$message=null,$code=200)
        {



            return response()->json([
                'status'=>'all data recieve sucssesfully',
                'message'=>$message,
                'data'=>$data
            ],$code);

        }

        protected function error($data,$message=null,$code)
        {



            return response()->json([
                'status'=>'ERROR',
                'message'=>$message,
                'data'=>$data
            ],$code);

        }













}






















?>
