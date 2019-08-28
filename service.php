<?php
include 'TaiNine.php';

$data=isset($_POST['data']) ? htmlspecialchars($_POST['data']) : '';
$request=isset($_POST['request']) ? htmlspecialchars($_POST['request']) : '';
$method=isset($_POST['method']) ? htmlspecialchars($_POST['method']) : '';

if($data==''){
    $code = array('status'=>0,'message'=>'missing data','data'=>'','htmlData'=>'','method'=>'','encryptData'=>'','decryptData'=>''); 
    echo json_encode($code);
    exit();
}

//missing API

if($data!=''){
    $tq=new TaiNine($data);
    if($request=='encrypt'){
        $tq->encrypt();
        $code = array('status'=>1,'message'=>'encrypting data','data'=>$data,'htmlData'=>$tq->toHtml($data),'method'=>$tq->method,'encryptData'=>$tq->encryptData,'decryptData'=>''); 
        echo json_encode($code);
        exit();
    }
    else if($request=='decrypt'){
        if(strlen($method)!=91){
            $code = array('status'=>strlen($method),'message'=>'wrong method when decrypting','data'=>$data,'htmlData'=>$tq->toHtml($data),'method'=>'','encryptData'=>'','decryptData'=>''); 
            echo json_encode($code);
            exit();
        }
        
        else if(strlen($method)==91){
            $tq->decrypt($data,$method);
            $code = array('status'=>1,'message'=>'decrypting data','data'=>$data,'htmlData'=>$tq->toHtml($data),'method'=>'','encryptData'=>'','decryptData'=>$tq->decryptData); 
            echo json_encode($code);
            exit();
        }
        else {
            $code = array('status'=>0,'message'=>'wrong method','data'=>$data,'htmlData'=>$tq->toHtml($data),'method'=>'','encryptData'=>'','decryptData'=>''); 
            echo json_encode($code);
            exit();
        }
    }
    else {
        $code = array('status'=>0,'message'=>'wrong request','method'=>'','encryptData'=>'','decryptData'=>''); 
        echo json_encode($code);
        exit();
    }
}

?>
