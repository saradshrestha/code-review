<?php
    namespace App\GlobalService;

    class ResponseService{

    public function responseBladeError($message = 'Opps!!!. Something Went Wrong!!'){
        return redirect()->back()->with('error', $message);
    }
    
    public function responseBladeSuccess($message = 'Success!!!'){
        return redirect()->back()->with('success', $message);
    }

    public function responseError($msg, $code=''){
        return response([
            'status' => 'error',
            'code' => $code,
            'message' => $msg
        ], $code != '' ? $code : 400);
    }

    public function responseSuccess($data=[], $msg='', $code=''){
        return response([
            'status' => 'success',
            'message' => $msg,
            'data' => $data,
        ], $code != '' ? $code : 200);
    }

    public function responseSuccessMsg($msg="", $code=""){
        return response([
            'status' => 'success',
            'message' => $msg,
        ], $code != '' ? $code : 200);
    }

    public function abcResources($data, $code){
        return response([
            'status' => 'success',
            'data'=>$data
        ], $code != '' ? $code : 200);
    }
}

?>
