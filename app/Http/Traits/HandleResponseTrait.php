<?php
 
 namespace App\Http\Traits;
 Trait HandleResponseTrait
 {
    public function error($msg)
    {
        return response()->json([
            'failed'=>$msg,
        ],403);
    }

    public function success($msg)
    {
        return response()->json([
            'success'=>$msg],200);
    }

    public function successWithData($msg,$data)
    {
        return response()->json([
            'sucess'=>$msg,
            'data'=>$data,
        ],200);
    }
    
 }