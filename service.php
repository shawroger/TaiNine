<?php

include 'TaiNine.php';

$data=isset($_POST['data']) ? $_POST['data'] : '';
$request=isset($_POST['request']) ? $_POST['request'] : '';
$method=isset($_POST['method']) ? $_POST['method'] : '';
$code = array('status'=>'','message'=>'missing data','data'=>'','method'=>''); 

if($data==''){
    $code['status']=0;
    $code['message']='missing_data';
    echo json_encode($code);
    exit();
}
else{
    if(($request=='encrypt') || ($request=='0')){
        $e=new TaiNine();
        $e->encrypt($data);
        $code['status']=1;
        $code['message']='encrypting_data';
        $code['data']=$e->encryptData;
        $code['method']=$e->method;
        echo json_encode($code);
        exit();
    }
    else if(($request=='decrypt') || ($request=='1')){
        if(strlen($method)!=81){
            $code['status']=0;
            $code['message']='wrong_method';
            echo json_encode($code);
            exit();
        }
        $d=new TaiNine();
        $d->decrypt($data,$method);
        $code['status']=1;
        $code['message']='decrypting_data';
        $code['data']=$d->decryptData;
        echo json_encode($code);
        exit();
    }else{
        $code['status']=0;
        $code['message']='wrong_request';
        echo json_encode($code);
        exit();
    }
}
