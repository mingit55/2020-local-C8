<?php

function user(){
    return isset($_SESSION['user']) ? $_SESSION['user'] : false;
}

function checkInput(){
    foreach($_POST as $input){
        if(trim($input) == "") back("모든 정보를 입력해 주세요!");
    }
    foreach($_FILES as $file){
        if(!is_file($file['tmp_name'])) back("모든 파일을 업로드 하세요!");
    }
}

function back($message = ""){
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
    exit;
}
function go($url, $message = ""){
    echo "<script>";
    if($message !== "") echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}

function json_response($data){
    header("Content-Type: application/json");
    echo json_encode($data);
}

function extname($file){
    return substr($file['name'], strrpos($file['name'], '.'));
}

function view($filename, $data = []){
    extract($data);
    $page = explode("?", $_SERVER['REQUEST_URI'])[0];
    $filePath = _VIEW."/$filename.php";
    if(is_file($filePath)){
        require _VIEW."/layouts/header.php";
        require $filePath;
        require _VIEW."/layouts/footer.php";
    }
}