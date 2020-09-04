class Product {
    buyCount = 0;
    constructor(app, json){
        json.price = parseInt(json.price.replace(/[^0-9]/, ""));
        this.json = json;
        this.init();

        this.app = app;
        this.storeUpdate();
    }

    get totalPrice(){
        return this.buyCount * this.json.price;
    }

    init(){
        const {id, product_name, brand, photo, price} = this.json;
        this.id = id;
        this.product_name = product_name;
        this.brand = brand;
        this.photo = photo;
        this.price = price;
        return this;
    }

    cartUpdate(){
        const {id, product_name, brand, photo, price} = this.json;

        if(!this.$cartElem){
            this.$cartElem = $(`<div class="table-item">
                                    <div class="cell-50">
                                        <div class="text-left d-flex align-items-center">
                                            <img src="./resources/images/store/${photo}" alt="상품 이미지" width="80" height="80">
                                            <div class="ml-4">
                                                <span class="text-muted">${brand}</span>
                                                <div class="fx-3">${product_name}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-15">
                                        <span>${price.toLocaleString()}</span>
                                        <small class="text-muted">원</small>
                                    </div>
                                    <div class="cell-10">
                                        <input type="number" class="buy-count" min="1" value="${this.buyCount}" data-id="${id}">
                                    </div>
                                    <div class="cell-15">   
                                        <span class="total">${this.totalPrice.toLocaleString()}</span>
                                        <small class="text-muted">원</small>
                                    </div>
                                    <div class="cell-10">
                                        <button class="remove" data-id="${id}">×</button>
                                    </div>
                                </div>`);
        } else {
            this.$cartElem.find(".buy-count").val(this.buyCount);
            this.$cartElem.find(".total").text(this.totalPrice.toLocaleString());
        }
    }

    storeUpdate(){
        const {id, photo, price} = this.json;       
        const {product_name, brand} = this;
        
        if(!this.$storeElem){
            this.$storeElem = $(`<div class="col-lg-4 col-md-6 mb-5">
                                    <div class="store-item">
                                        <div class="image overflow-hidden rounded" style="height: 300px" data-id="${id}" draggable="draggable">
                                            <img class="fit-cover" src="./resources/images/store/${photo}" alt="상품 이미지">
                                        </div>
                                        <div class="py-3 px-2 d-between align-items-end">
                                            <div class="w-50">
                                                <div class="brand text-ellipsis text-muted">${brand}</div>
                                                <div class="product_name text-ellipsis fx-3">${product_name}</div>
                                            </div>
                                            <div class="w-50 text-right">
                                                <span class="text-ellipsis fx-3">${price.toLocaleString()}</span>
                                                <small class="text-ellipsis text-muted">원</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
        } else {
            this.$storeElem.find(".product_name").html(product_name);
            this.$storeElem.find(".brand").html(brand);
        }
    }
}