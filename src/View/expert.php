</header>

<div class="padding">
    <div class="text-center pb-5">
        <span class="text-muted">전문가 소개</span>
        <div class="title">EXPERTS</div>
    </div>
    <div class="bg-gold my-4 position-relative">
        <div class="container">
            <div class="row">
                <?php foreach($experts as $expert):?>
                <div class="expert-item col-lg-3 col-6 mb-5 mb-lg-0">
                    <div class="inner">
                        <div class="front">
                            <img src="./resources/images/specialist/<?=$expert->photo?>" alt="전문가 이미지" title="전문가 이미지" class="fit-cover">
                        </div>
                        <div class="back d-flex flex-column-reverse py-5">
                            <div class="d-flex flex-column align-items-center">
                                <div class="fx-2"><?=$expert->user_name?></div>
                                <small class="text-gold">(<?=$expert->user_id?>)</small>
                                <div class="my-3 text-gold">
                                    <?php for($i = 0; $i < $expert->score; $i++ ):?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor;?>
                                    <?php for(;$i < 5 ; $i++):?>
                                        <i class="fa fa-star-o"></i>
                                    <?php endfor;?>
                                </div>
                                <hr style="width: 50px;">
                                <button class="bg-blue text-white px-4 py-2" data-toggle="modal" data-target="#write-modal" data-id="1">
                                    시공 후기 작성
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>


<div class="container padding pt-0">
    <div class="sticky-top bg-white pt-4">
        <span class="text-muted">전문가 리뷰</span>
        <div class="title">REVIEWS</div>
        <div class="table-head">
            <div class="cell-15">전문가 정보</div>
            <div class="cell-40">내용</div>
            <div class="cell-15">작성자</div>
            <div class="cell-15">비용</div>
            <div class="cell-15">평점</div>
        </div>
    </div>
    <div class="list">
        <?php foreach($reviews as $review):?>
        <div class="table-item">
            <div class="cell-15">
                <span><?=$review->e_name?></span>
                <small class="text-muted">(<?=$review->e_id?>)</small>
            </div>
            <div class="cell-40">
                <p class="fx-n2 text-muted"><?=nl2br(htmlentities($review->contents))?></p>
            </div>
            <div class="cell-15">
                <span><?=$review->user_name?></span>
                <small class="text-muted">(<?=$review->user_id?>)</small>
            </div>
            <div class="cell-15">
                <span><?=number_format($review->price)?></span>
                <small class="text-muted">원</small>
            </div>
            <div class="cell-15">
                <div class="text-gold">
                    <?php for($i = 0; $i < $review->score; $i++ ):?>
                        <i class="fa fa-star"></i>
                    <?php endfor;?>
                    <?php for(;$i < 5 ; $i++):?>
                        <i class="fa fa-star-o"></i>
                    <?php endfor;?>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<!-- 글쓰기 모달 -->
<div id="write-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/experts/reviews" method="post" class="modal-content">
            <input type="hidden" id="eid" name="eid">
            <div class="modal-body pt-4 px-3 pb-3">
                <div class="title text-center">
                    REVIEW
                </div>
                <div class="form-group mt-4">
                    <label for="score">평점</label>
                    <select name="score" id="score" class="form-control">
                        <option value="1">1점</option>
                        <option value="2">2점</option>
                        <option value="3">3점</option>
                        <option value="4">4점</option>
                        <option value="5">5점</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">비용</label>
                    <input type="number" id="price" name="price" class="form-control" min="1" value="10000" required>
                </div>
                <div class="form-group">
                    <textarea name="contents" id="contents" cols="30" rows="10" class="form-control" placeholder="전문가의 상세한 리뷰를 남겨보세요!" required></textarea>
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
<script>
    window.onload = ()=>{
        $("[data-target='#write-modal']").on("click", e => {
            $("#eid").val(e.target.dataset.id);
        });
    }
</script>
<!-- /글쓰기 모달 -->