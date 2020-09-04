<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내집꾸미기</title>
    <script src="./resources/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./resources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="./resources/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./resources/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <script>
        $(function(){
            $("[data-target='#sign-up']").on("click", function(){
                let canvas = document.querySelector("#cap_canvas");
                let ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.font = "50px 나눔스퀘어, sans-serif";
                
                let captcha = Math.random().toString(36).substr(2, 5);
                let w = ctx.measureText(captcha).width;
                
                ctx.fillText(captcha, canvas.width / 2 - w / 2, canvas.height / 2 + 10);
                $("#cap_answer").val(captcha);
            });
        });
    </script>
</head>
<body>
    <!-- 로그인 모달 -->
    <div id="sign-in" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" action="/sign-in" class="modal-content">
                <div class="modal-body pt-4 px-3 pb-3">
                    <div class="title text-center">
                        SIGN IN
                    </div>
                    <div class="form-group mt-4">
                        <label for="login_id">아이디</label>
                        <input type="text" id="login_id" class="form-control" name="user_id" placeholder="아이디를 입력하세요" required>
                    </div>
                    <div class="form-group">
                        <label for="login_pw">비밀번호</label>
                        <input type="password" id="login_pw" class="form-control" name="password" placeholder="비밀번호를 입력하세요" required>
                    </div>
                    <div class="mt-3">
                        <button class="w-100 py-2 text-center bg-gold text-white">
                            로그인
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /로그인 모달 -->
    <!-- 회원가입 모달 -->
    <div id="sign-up" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" action="/sign-up" class="modal-content" enctype="multipart/form-data">
                <div class="modal-body pt-4 px-3 pb-3">
                    <div class="title text-center">
                        SIGN UP
                    </div>
                    <div class="form-group mt-4">
                        <label for="join_id">아이디</label>
                        <input type="text" id="join_id" class="form-control" name="user_id" placeholder="아이디를 입력하세요" required>
                    </div>
                    <div class="form-group">
                        <label for="join_pw">비밀번호</label>
                        <input type="password" id="join_pw" class="form-control" name="password" placeholder="비밀번호를 입력하세요" required>
                    </div>
                    <div class="form-group">
                        <label for="join_name">이름</label>
                        <input type="text" id="join_name" class="form-control" name="user_name" placeholder="이름를 입력하세요" required>
                    </div>
                    <div class="form-group">
                        <label for="join_photo">사진</label>
                        <div class="custom-file">
                            <input type="file" id="join_photo" class="custom-file-input" name="photo" required>
                            <label for="join_photo" class="custom-file-label">파일을 업로드 하세요</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="cap_answer" name="cap_answer">
                        <canvas id="cap_canvas" class="border w-100" width="450" height="100"></canvas>
                        <input type="text" id="cap_input" name="cap_input" class="form-control" placeholer="상단의 문자를 입력하세요" required>
                    </div>
                    <div class="mt-3">
                        <button class="w-100 py-2 text-center bg-gold text-white">
                            회원가입
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /회원가입 모달 -->

    <!-- 헤더 영역 -->
    <header <?= $page !== '/' ? "style=\"height: 130px; margin-bottom: 0\"" : "" ?>>
        <div id="gnb">
            <div class="d-between align-items-end px-5 py-3 h-100">
                <a href="/">
                    <img src="./resources/images/logo.svg" alt="내집꾸미기" title="내집꾸미기" height="50">
                </a>
                <div class="nav d-none d-lg-flex">
                    <a href="/">
                        <span class="icon">
                            <i class="fa fa-home"></i>
                        </span>
                        홈
                    </a>
                    <a href="/online-party">
                        <span class="icon">
                            <i class="fa fa-search"></i>
                        </span>
                        온라인 집들이
                    </a>
                    <a href="/store">
                        <span class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                        스토어
                    </a>
                    <a href="/experts">
                        <span class="icon">
                            <i class="fa fa-user-secret"></i>
                        </span>
                        전문가
                    </a>
                    <a href="/estimates">
                        <span class="icon">
                            <i class="fa fa-file-text"></i>
                        </span>
                        시공 견적
                    </a>
                </div>
                <div>
                    <div class="auth d-none d-lg-flex">
                        <?php if(user()): ?>
                            <span class="fx-n2 text-gold mr-2"><?=user()->user_name?>(<?=user()->user_id?>)</span>
                            <a href="/logout">로그아웃</a>
                        <?php else :?>
                            <a href="#" data-target="#sign-in" data-toggle="modal">로그인</a>
                            <a href="#" data-target="#sign-up" data-toggle="modal">회원가입</a>
                        <?php endif;?>
                    </div>
                    <div class="menu-icon d-lg-none">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="menu d-lg-none">
                        <div class="inner">
                            <div class="m-nav">
                                <a href="/">홈</a>
                                <a href="/online-party">온라인 집들이</a>
                                <a href="/store">스토어</a>
                                <a href="/experts">전문가</a>
                                <a href="/estimates">시공 견적</a>
                            </div>
                            <div class="m-auth">
                                <a href="#" data-target="#sign-in" data-toggle="modal">로그인</a>
                                <a href="#" data-target="#sign-up" data-toggle="modal">회원가입</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    