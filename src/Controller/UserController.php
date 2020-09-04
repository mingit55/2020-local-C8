<?php
namespace Controller;

use App\DB;

class UserController {
    function signIn(){
        checkInput();
        extract($_POST);

        $user = DB::who($user_id);
        if(!$user || $user->password !== hash('sha256', $password)) back("아이디 또는 비밀번호가 일치하지 않습니다.");
        $_SESSION['user'] = $user;
        go("/", "로그인 되었습니다.");
    }
    function signUp(){
        checkInput();
        extract($_POST);

        $user = DB::who($user_id);
        if($user) back("중복된 아이디입니다. 다른 아이디를 사용해주세요.");
        if($cap_input !== $cap_answer) back("자동가입방지 문자를 잘못 입력하였습니다.");

        $photo = $_FILES['photo'];
        $filename = time(). extname($photo);
        move_uploaded_file($photo['tmp_name'], _UPLOADS."/users/$filename");
        
        DB::query("INSERT INTO users(user_id, password, user_name, photo) VALUES (?, ?, ?, ?)", [$user_id, hash('sha256', $password), $user_name, $filename]);
        go("/", "회원가입 되었습니다.");
    }
    function logout(){
        unset($_SESSION['user']);
        go("/", "로그아웃 되었습니다.");
    }


    // 전문가 페이지
    function expertPage(){
        $sql = "SELECT DISTINCT U.*, if(R.cnt IS NULL, '0', floor(R.total/R.cnt)) score, M.eid reviewed
                FROM users U
                LEFT JOIN (SELECT SUM(score) total, COUNT(*) cnt, eid FROM expert_reviews GROUP BY eid) R ON R.eid = U.id
                LEFT JOIN (SELECT eid FROM expert_reviews WHERE uid = ?) M ON M.eid = U.id
                WHERE U.auth = 1";
        $experts = DB::fetchAll($sql, [user()->id]);

        $sql = "SELECT DISTINCT R.*, U.user_name, U.user_id, E.user_name e_name, E.user_id e_id
                FROM expert_reviews R
                LEFT JOIN users U ON U.id = R.uid
                LEFT JOIN users E ON E.id = R.eid
                WHERE R.uid = ?";
        $reviews = DB::fetchAll($sql, [user()->id]);

        view("expert", ["experts" => $experts, "reviews" => $reviews]);
    }
    function writeReview(){
        checkInput();
        extract($_POST);

        DB::query("INSERT INTO expert_reviews(uid, eid, price, score, contents) VALUES (?, ?, ?, ?, ?)", [user()->id, $eid, $price, $score, $contents]);
        go("/experts", "리뷰가 작성되었습니다.");
    }
}