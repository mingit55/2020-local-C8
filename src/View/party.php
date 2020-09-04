</header>

<!-- 온라인 집들이 -->
<div class="container padding">
    <div class="d-between border-bottom align-items-end">
        <div class="pb-3">
            <span class="text-muted">온라인 집들이</span>
            <div class="title">KNOWHOWS</div>
        </div>
        <button class="button-label" data-toggle="modal" data-target='#write-modal'>
            글쓰기
            <i class="fa fa-pencil ml-2"></i>
        </button>
    </div>
    <div class="row mt-4">
        <?php foreach($knowhows as $knowhow):?>
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="knowhow-item border">
                <div class="image">
                    <img class="fit-cover" src="/uploads/knowhows/<?=$knowhow->before_img?>" alt="Before 이미지" title="Before 이미지">
                    <img class="fit-cover" src="/uploads/knowhows/<?=$knowhow->after_img?>" alt="After 이미지" title="After 이미지">
                </div>
                <div class="py-4 px-3">
                    <div class="d-between">
                        <div>
                            <span><?=$knowhow->user_name?></span>
                            <small class="text-blue">(<?=$knowhow->user_id?>)</small>
                            <small class="text-muted ml-2"><?=date("Y-m-d", strtotime($knowhow->created_at))?></small>
                        </div>
                        <div class="score-value text-gold">
                            <i class="fa fa-star<?=$knowhow->score == 0 ? '-o' : '' ?>"></i>
                            <?=$knowhow->score?>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="fx-n2 text-muted"><?=nl2br(htmlentities($knowhow->contents))?></div>
                    </div>
                    <?php if(user()->id !== $knowhow->uid &&!$knowhow->reviewed):?>
                    <div class="mt-4 d-between score-label">
                        <small class="text-muted">이 글이 마음에 드시나요?</small>
                        <button class="bg-blue px-2 py-1 text-white fx-n2" data-target="#score-modal" data-toggle="modal" data-id="<?=$knowhow->id?>">평점 주기</button>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<!-- /온라인 집들이 -->

<!-- 글쓰기 모달 -->
<div id="write-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/knowhows" method="post" class="modal-content" enctype="multipart/form-data">
            <div class="modal-body pt-4 px-3 pb-3">
                <div class="title text-center">
                    KNOWHOW
                </div>
                <div class="form-group mt-4">
                    <label for="before_img">Before 사진</label>
                    <div class="custom-file">
                        <input type="file" id="before_img" class="custom-file-input" name="before_img" required>
                        <label for="before_img" class="custom-file-label">이미지를 업로드 하세요</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="after_img">After 사진</label>
                    <div class="custom-file">
                        <input type="file" id="after_img" class="custom-file-input" name="after_img" required>
                        <label for="after_img" class="custom-file-label">이미지를 업로드 하세요</label>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="contents" id="contents" cols="30" rows="10" class="form-control" placeholder="자신만의 노하우를 모두에게 알려보세요!" required></textarea>
                </div>
                <div class="mt-3">
                    <button class="w-100 py-2 text-center bg-gold text-white">
                        작성 완료
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /글쓰기 모달 -->

<!-- 평점 모달 -->
<div id="score-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pt-4 pb-3">
                <div class="text-center text-muted">이 게시글에 평점을 매겨주세요!</div>
                <div class="d-flex justify-content-center mt-3">
                    <button class="mx-2 text-gold border px-3 py-2" data-value="1">
                        <i class="fa fa-star"></i>
                        1
                    </button>
                    <button class="mx-2 text-gold border px-3 py-2" data-value="2">
                        <i class="fa fa-star"></i>
                        2
                    </button>
                    <button class="mx-2 text-gold border px-3 py-2" data-value="3">
                        <i class="fa fa-star"></i>
                        3
                    </button>
                    <button class="mx-2 text-gold border px-3 py-2" data-value="4">
                        <i class="fa fa-star"></i>
                        4
                    </button>
                    <button class="mx-2 text-gold border px-3 py-2" data-value="5">
                        <i class="fa fa-star"></i>
                        5
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let kid, score, $target;
    $("[data-target='#score-modal']").on("click", e => {
        kid = e.currentTarget.dataset.id;
        $target = $(e.target).closest(".knowhow-item");
    });

    $("#score-modal button").on("click", e => {
        console.log(e.currentTarget);
        score = e.currentTarget.dataset.value;
        $.post("/knowhows/reviews", {kid, score}, function(res){
            if(res){
                $target.find(".score-value").html(`<i class="fa fa-star${ res.score == 0 ? "-o" : "" }"></i>${res.score}`);
                $target.find(".score-label").remove();
                $("#score-modal").modal("hide");
            }
        });
    });
</script>
<!-- /평점 모달 -->