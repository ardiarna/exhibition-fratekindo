<?php 

$n = 0;
function fungsi($n){
   
    
    $str = str_replace(",","",$n);
    $arr = str_split($str);
    
    for($i=0;$i<strlen($str);$i++){
        $hasil = $arr[$i] + 1;
        if(!empty($arr[$i])){
        if(strpos($str,$hasil."") != "" ){
            $n = $n+1;
        }else{
           $n = $n+0;
        }
        }
    }
    
    return $n;
    
}

echo fungsi($_GET['n']);

?>