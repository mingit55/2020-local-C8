</header>

<div class="container padding">
    <div class="sticky-top bg-white pt-4">
        <div class="d-between align-items-end">
            <div class="pb-4">
                <span class="text-muted">시공 견적 요청</span>
                <div class="title">REQUESTS</div>
            </div>
            <button class="button-label" data-toggle="modal" data-target="#request-modal">견적 요청</button>
        </div>
        <div class="table-head border-top">
            <div class="cell-10">상태</div>
            <div class="cell-40">내용</div>
            <div class="cell-15">요청자</div>
            <div class="cell-15">시공일</div>
            <div class="cell-10">견적 개수</div>
            <div class="cell-10">+</div>
        </div>
    </div>
    <div class="list">
        <?php foreach($reqList as $req):?>
        <div class="table-item">
            <div class="cell-10">
                <?php if(!$req->sid):?>
                    <span class="rounded-pill bg-gold px-3 py-2 text-white fx-n2">진행 중</span>
                <?php else :?>
                    <span class="rounded-pill bg-gold px-3 py-2 text-white fx-n2">완료</span>
                <?php endif;?>
            </div>
            <div class="cell-40">
                <p class="text-muted fx-n2"><?=nl2br(htmlentities($req->contents))?></p>
            </div>
            <div class="cell-15">
                <span><?=$req->user_name?></span>
                <small class="text-muted">(<?=$req->user_id?>)</small>
            </div>
            <div class="cell-15">
                <span><?= $req->start_date ?></span>
            </div>
            <div class="cell-10">
                <span><?= $req->cnt ?></span>
            </div>
            <div class="cell-10">
                <?php if($req->uid == user()->id):?>
                    <button class="px-2 py-2 bg-gold text-white fx-n3" data-id="<?=$req->id?>" data-target="#view-modal" data-toggle="modal">견적 보기</button>
                <?php elseif(!$req->sid && !$req->sended && user()->auth):?>
                    <button class="px-2 py-2 bg-gold text-white fx-n3" data-id="<?=$req->id?>" data-target="#response-modal" data-toggle="modal">견적 보내기</button>
                <?php else: ?>
                    -
                <?php endif;?>
            </div>
        </div>
        <?php endforeach;?> 
    </div>
</div>

<?php if(user()->auth):?>
<div class="bg-gray">
    <div class="container padding">
        <div class="sticky-top bg-gray pt-4">
            <div class="pb-4">
                <span class="text-muted">보낸 견적</span>
                <div class="title blue">RESPONSES</div>
            </div>
            <div class="table-head border-top">
                <div class="cell-10">상태</div>
                <div class="cell-40">내용</div>
                <div class="cell-15">요청자</div>
                <div class="cell-15">시공일</div>
                <div class="cell-10">입력한 비용</div>
                <div class="cell-10">+</div>
            </div>
        </div>
        <div class="list">
            <?php foreach($resList as $res):?>
            <div class="table-item">
                <div class="cell-10">
                    <?php if(!$res->sid):?>
                        <span class="rounded-pill bg-blue px-3 py-2 text-white fx-n2">진행 중</span>
                    <?php elseif($res->sid == $res->id): ?>
                        <span class="rounded-pill bg-blue px-3 py-2 text-white fx-n2">선택</span>
                    <?php else :?>
                        <span class="rounded-pill bg-blue px-3 py-2 text-white fx-n2">미선택</span>
                    <?php endif;?>
                </div>
                <div class="cell-40">
                    <p class="text-muted fx-n2"><?=nl2br(htmlentities($res->contents))?></p>
                </div>
                <div class="cell-15">
                    <span><?=$res->user_id?></span>
                    <small class="text-muted">(<?=$res->user_name?>)</small>
                </div>
                <div class="cell-15">
                    <span><?=$res->start_date?></span>
                </div>
                <div class="cell-10">
                    <span><?=number_format($res->price)?></span>
                    <small class="text-muted">원</small>
                </div>
                <div class="cell-10">
                    -
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?php endif;?>

<!-- 요청 모달 -->
<div id="request-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/requests" method="post" class="modal-content">
            <div class="modal-body pt-4 px-3 pb-3">
                <div class="title text-center">
                    REQUEST
                </div>
                <div class="form-group mt-4">
                    <label for="start_date">평점</label>
                    <input type="date" id="start_date" class="form-control" name="start_date" required>
                </div>
                <div class="form-group">
                    <textarea name="contents" id="contents" cols="30" rows="10" class="form-control" placeholder="시공할 내용을 상세히 기재해 주세요!" required></textarea>
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
<!-- /요청 모달 -->

<!-- 응답 모달 -->
<div id="response-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/responses" method="post" class="modal-content">
            <input type="hidden" id="qid" name="qid">
            <div class="modal-body pt-4 px-3 pb-3">
                <div class="title text-center">
                    RESPONSE
                </div>
                <div class="form-group mt-4">
                    <label for="price">비용</label>
                    <input type="number" id="price" class="form-control" name="price" min="1" value="10000" required>
                </div>
                <div class="mt-3">
                    <button class="w-100 py-2 text-center bg-gold text-white">
                        입력 완료
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function(){
        $("[data-target='#response-modal']").on("click", e => {
            $("#qid").val(e.currentTarget.dataset.id);
        });
    });
</script>
<!-- /응답 모달 -->

<!-- 보기 모달 -->
<div id="view-modal" class="modal fade">
    <div class="modal-dialog">
        <form action="/estimates/pick" method="post" class="modal-content">
            <input type="hidden" id="pick_qid" name="qid">
            <input type="hidden" id="pick_sid" name="sid">
            <div class="modal-body pt-4 px-3 pb-3">
                <div class="title text-center">
                    ESTIMATES
                </div>
                <div class="table-head">
                    <div class="cell-30">전문가 정보</div>
                    <div class="cell-40">비용</div>
                    <div class="cell-30">+</div>
                </div>
                <div class="list">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function(){
        $("#view-modal .list").on("click", "button", e => {
            $("#pick_sid").val(e.target.dataset.id);
        });

        $("[data-target='#view-modal']").on("click", e => {
            $("#pick_qid").val(e.target.dataset.id);

            $.getJSON("/responses?id="+ e.target.dataset.id , function(res){
                if(res.list && res.req){
                    $("#view-modal .list").html('');
                    res.list.forEach(item => {
                        $("#view-modal .list").append(`<div class="table-item">
                                                            <div class="cell-30">
                                                                <span>${item.user_name}</span>
                                                                <small class="text-muted">(${item.user_id})</small>
                                                            </div>
                                                            <div class="cell-40">
                                                                <span>${parseInt(item.price).toLocaleString()}</span>
                                                                <small class="text-muted">원</small>
                                                            </div>
                                                            <div class="cell-30">
                                                                ${
                                                                    res.req.sid ? "" :
                                                                    `<button class="p-2 text-white bg-blue fx-n2" data-id="${item.id}">선택</button>`
                                                                }
                                                            </div>
                                                        </div>`);
                    });
                }
            });
        });
    });
</script>
<!-- /보기 모달 -->