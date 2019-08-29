<?php
class EasyRequest {
    function __construct() {
        $this->avail_request=[];
    }
    
    function get($request) {
        $this->request=$request;
    }
    
    function send() {
        echo json_encode($this->response);
    }
    
    function when($request,$func){
        array_push($this->avail_request,$request);
        if($this->request==$request){
            call_user_func($func,$this);
        }
    }
    
    function error($errorMessage){
        if(!in_array($this->request,$this->avail_request)){
            echo json_encode($errorMessage);
        }
    }
    
}

?>
