<?php

//初始编码utf-8
header("Content-type:text/html;charset=utf-8");

class TaiNine {
  //初始化
  public $str;

function __construct($str) {
    
    $this->str=$str;
    
    //81个原始字符数组
    $KEY[0]="a";
    $KEY[1]="b";
    $KEY[2]="c";
    $KEY[3]="d";
    $KEY[4]="e";
    $KEY[5]="f";
    $KEY[6]="g";
    $KEY[7]="h";
    $KEY[8]="i";
    $KEY[9]="j";
    $KEY[10]="k";
    $KEY[11]="l";
    $KEY[12]="m";
    $KEY[13]="n";
    $KEY[14]="o";
    $KEY[15]="p";
    $KEY[16]="q";
    $KEY[17]="r";
    $KEY[18]="s";
    $KEY[19]="t";
    $KEY[20]="u";
    $KEY[21]="v";
    $KEY[22]="w";
    $KEY[23]="x";
    $KEY[24]="y";
    $KEY[25]="z";
    $KEY[26]="A";
    $KEY[27]="B";
    $KEY[28]="C";
    $KEY[29]="D";
    $KEY[30]="E";
    $KEY[31]="F";
    $KEY[32]="G";
    $KEY[33]="H";
    $KEY[34]="I";
    $KEY[35]="J";
    $KEY[36]="K";
    $KEY[37]="L";
    $KEY[38]="M";
    $KEY[39]="N";
    $KEY[40]="O";
    $KEY[41]="P";
    $KEY[42]="Q";
    $KEY[43]="R";
    $KEY[44]="S";
    $KEY[45]="T";
    $KEY[46]="U";
    $KEY[47]="V";
    $KEY[48]="W";
    $KEY[49]="X";
    $KEY[50]="Y";
    $KEY[51]="Z";
    $KEY[52]=",";
    $KEY[53]=".";
    $KEY[54]="?";
    $KEY[55]="!";
    $KEY[56]=":";
    $KEY[57]=";";
    $KEY[58]="+";
    $KEY[59]="-";
    $KEY[60]="*";
    $KEY[61]="/";
    $KEY[62]="^";
    $KEY[63]="@";
    $KEY[64]="0";
    $KEY[65]="1";
    $KEY[66]="2";
    $KEY[67]="3";
    $KEY[68]="4";
    $KEY[69]="5";
    $KEY[70]="6";
    $KEY[71]="7";
    $KEY[72]="8";
    $KEY[73]="9";
    $KEY[74]="%";
    $KEY[75]="<";
    $KEY[76]=">";
    $KEY[77]="#";
    $KEY[78]="$";
    $KEY[79]="&";
    $KEY[80]=" ";
    
    //深拷贝2个数组用来打乱和记录原始数据
    for($i=0;$i<=80;$i++){
        $this->encryptKey[$i]=$KEY[$i];
        $this->originKey[$i]=$KEY[$i];
    }
    
    //获取正确序列数组的反序列
    $this->underKey=array_flip($this->encryptKey);
}
    
//中文转换的函数用于加密和解密
function toHtml($string) {
    return mb_convert_encoding($string,"HTML-ENTITIES","utf-8");
}

function backHtml($string) {
    return mb_convert_encoding($string,"utf-8","HTML-ENTITIES");
}


//加密算法函数
function encrypt($str){ 
    if($str==''){
        $str=$this->str;
    }
    
    //每次打乱数组
    shuffle($this->encryptKey);

    //获取打乱数组的序列
    for($i=0;$i<=80;$i++){
        $encryMethod=$encryMethod.$this->encryptKey[$i];
    }
    
    //获取html实体化数据
    $htmlStr=$this->toHtml($str);
    
    //打乱序列
    for($i=0;$i<strlen($htmlStr);$i++){
        //同余位次叠加加密法
        $j=($this->underKey[$htmlStr[$i]]+$i)%81;
        $encStr=$encStr.$this->encryptKey[$j];
    }
    $this->encryptData=$encStr;
    $this->method=$encryMethod;
    $this->htmlData=$htmlStr;

}

//解密方法，需要一个method
function decrypt($str,$method){
    for($i=0;$i<strlen($method);$i++){
        $decryKey[$i]=$method[$i];
    }
    $underDecryKey=array_flip($decryKey);
    for($i=0;$i<strlen($str);$i++){
        $j=$underDecryKey[$str[$i]]-$i;
        while(($j<=-1) || ($j>=82)){
            if($j<=-1) {$j=$j+81;}
            if($j>=82) {$j=$j-81;}
        }
        $decryptData=$decryptData.$this->originKey[$j];
    }
    $this->decryptData=$decryptData;
}

//class end
}

?>
