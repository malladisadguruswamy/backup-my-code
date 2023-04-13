<?php require('class.pdf2text.php');
extract($_POST);
 
if(isset($readpdf)){
     
    if($_FILES['file']['type']=="application/pdf") {
        $a = new PDF2Text();
        $a->setFilename($_FILES['file']['tmp_name']);
        $a->decodePDF();
        $data = $a->output();
        $res = phone_number($data);
        //$out = fetch_mails($data);
        echo '<pre>'; print_r($res);
        // echo '<pre>'; var_dump($data);
    }
      
    else {
        echo "<p style='color:red; text-align:center'>
            Wrong file format</p>
";
    }
}  
function fetch_mails($text){
    
  //String that recognizes an e-mail
    $str = '/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i';
    preg_match_all($str, $text, $out);
  //return a blank array if not true otherwise insert the email in $out and return
    return isset($out[0]) ? $out[0] : array();
} 
function phone_number($str){
    $regex_email = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';
    $regex_phone = "/[0-9]{5,}|\d[ 0-9 ]{1,}\d|\sone|\stwo|\sthree|\sfour|\sfive|\ssix|\sseven|\seight|\snine|\sten/i";
    
    $estr = preg_replace($regex_email,'(email hidden)',$str); // extract email
    $mstr = preg_replace($regex_phone,'(phone hidden)',$str); // extract phone
    echo '<pre>';print_r($estr);  echo '<pre>';print_r($mstr); exit;
}
?>
 
<html>
 
<head>
    <title>Read pdf php</title>
</head>
 
<body>
    <form method="post" enctype="multipart/form-data">
        Choose Your File
        <input type="file" name="file" />
        <br>
        <input type="submit" value="Read PDF" name="readpdf" />
    </form>
</body>
 
</html>