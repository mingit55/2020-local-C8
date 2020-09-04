</header>
<!-- /헤더 영역 -->

<div class="container padding">
    <div class="sticky-top pt-4 bg-white">
        <span class="text-muted">장바구니</span>
        <div class="title">CART</div>
        <div class="table-head">
            <div class="cell-50">상품 정보</div>
            <div class="cell-15">가격</div>
            <div class="cell-10">수량</div>
            <div class="cell-15">합계</div>
            <div class="cell-10">+</div>
        </div>
    </div>
    <div id="cart-list" class="list">
        <div class="w-100 py-5 fx-n2 text-muted">장바구니에 담긴 상품이 없습니다.</div>
    </div>
    <div class="d-between mt-4">
        <div>
            <span class="text-muted">총 가격</span>
            <span class="total-price fx-3 ml-4 text-gold">0</span>
            <small class="text-muted">원</small>
        </div>
        <button class="button-label bg-gold" data-toggle="modal" data-target="#buy-modal">
            구매하기
        </button>
    </div>
</div>

<div class="bg-gray pb-5">
    <div class="container padding">
        <div class="sticky-top bg-gray pt-4 pb-3 d-between align-items-end border-bottom">
            <div>
                <span class="text-muted">인테리어 스토어</span>
                <div class="title blue">스토어</div>
            </div>
            <div class="d-flex align-items-end">
                <input type="checkbox" id="open-cart" hidden checked>
                <div class="search">
                    <span class="icon"><i class="fa fa-search"></i></span>
                    <input type="text" placeholder="검색어를 입력하세요">
                </div> 
                <label for="open-cart" class="ml-3 mr-5 text-blue">
                    <i class="fa fa-shopping-cart fa-lg"></i>
                </label>
                <div id="drop-area">
                    <div class="text-center text-white">
                        <div class="success position-center">
                            <i class="fa fa-check fa-3x"></i>
                            <p class="fx-n2 text-nowrap mt-4">장바구니에 등록되었습니다!</p>
                        </div>
                        <div class="error position-center">
                            <i class="fa fa-times fa-3x"></i>
                            <p class="fx-n2 text-nowrap mt-4">이미 장바구니에 담긴 상품입니다.</p>
                        </div>
                        <div class="normal position-center">
                            <fa class="fa fa-shopping-cart fa-3x"></fa>
                            <p class="fx-n2 text-nowrap mt-4">이곳에 상품을 넣어주세요.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="store-list" class="row mt-4">
            <div class="w-100 py-5 fx-n2 text-muted">일치하는 상품이 없습니다.</div>
        </div>
    </div>
</div>

<!-- 구매 내역 폼 -->
<div id="view-modal" class="modal fade">
    <div class="modal-dialog"></div>
    <img alt="구매내역" class="mw-100 mx-3 position-center">
</div>
<!-- /구매 내역 폼 -->

<!-- 구매 폼 -->
<div id="buy-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content">
            <div class="modal-body pt-4 px-3 pb-3">
                <div class="title text-center">
                    BUY ITEM
                </div>
                <div class="form-group mt-4">
                    <label for="user_name">구매자</label>
                    <input type="text" id="user_name" class="form-control" placeholder="이름을 입력하세요" required>
                </div>
                <div class="form-group">
                    <label for="address">주소</label>
                    <input type="text" id="address" class="form-control" placeholder="주소을 입력하세요" required>
                </div>
                <div class="mt-3">
                    <button class="w-100 py-2 text-center bg-gold text-white">
                        구매 완료
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /구매 폼 -->

<script src="./resources/js/Product.js"></script>
<script src="./resources/js/Store.js"></script>