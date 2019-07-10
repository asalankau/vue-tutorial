<template>
    <div class="product">
        <div class="product-image">
            <img :src="image" />
        </div>

        <div class="product-info">
            <h1>{{title}}</h1>
            <p v-if="inStock > 10">In stock</p>
            <p v-else-if="inStock <= 10 && inStock > 0">Almost Sold! {{ inStock }} left.</p>
            <p v-else>Out of stock</p>
            <p>Shipping :{{shipping}}</p>

            <ul>
                <li v-for="detail in product.details">{{detail}}</li>
            </ul>
            <div v-for="(variant, index) in product.variants" :key="variant.id" class="color-box" :style="{backgroundColor:variant.color}" @mouseover="updateProduct(index)">
            </div>

            <button v-on:click="addToCart" :disabled="!inStock" :class="{ disabledButton: !inStock }">Add to cart</button>

            <div class="cart">
                <p>Cart({{cart}})</p>
                <button v-if="cart >= 1" @click="removeFromCart">Remove from cart</button>
            </div>

            <p v-if="onSale">This item on sale 50% from orginal price</p>
        </div>
    </div>
</template>

<script>
    export default {
        name:"product",
        mounted() {
            console.log('Component mounted.')

            axios.post('api/products',{})
                .then( response => {
                    this.product = response.data;
                });
        },
        data: function (){
            return {
                product: [],
                cart:0,
                selectedVariant:0,
                reviews:[],
            }
        },
        methods: {
            addToCart: function () {
                this.cart += 1
            },
            updateProduct: function (index) {
                this.selectedVariant = index;
            },
            removeFromCart:function () {
                this.cart -= 1
            },


        },
        computed:{
            title(){
                return this.product.brand+' '+this.product.name;
            },
            image(){

                var variant_image_list = [];

                $.each(this.product.variants, function(key, obj) {
                    variant_image_list.push(obj.variantImage);
                });

                return variant_image_list[this.selectedVariant]
            },
            inStock(){

                var variant_quantity_list = [];

                $.each(this.product.variants, function(key, obj) {
                    variant_quantity_list.push(obj.variantQuantity);
                });

                return variant_quantity_list[this.selectedVariant]
            },
            onSale(){

                var variant_onsale_list = [];

                $.each(this.product.variants, function(key, obj) {
                    variant_onsale_list.push(obj.saleNow);
                });

                return variant_onsale_list[this.selectedVariant]
            },
            shipping(){
                if(this.premium){
                    return "free"
                }

                return "2.99"
            },
        },
        props: {
            text_var:{
                type: String,
                required: false,
            },
            type:{},
            premium: {
                type: Boolean,
                required: true,
            }
        },
    }
</script>

<style>
    .review-container{
        height: 400px;
        display: block;
        flex-flow: wrap;
        position: relative;
        overflow: scroll;
    }

    body {
        font-family: tahoma;
        color:#282828;
        margin: 0px;
    }

    .nav-bar {
        background: linear-gradient(-90deg, #84CF6A, #16C0B0);
        height: 60px;
        margin-bottom: 15px;
    }

    .footer-bar {
        background: linear-gradient(-90deg, #84CF6A, #16C0B0);
        height: 60px;
        margin-bottom: -15px;
        display: block;
    }

    .product {
        display: flex;
        flex-flow: wrap;
        padding: 1rem;
    }

    img {
        border: 1px solid #d8d8d8;
        width: 70%;
        margin: 40px;
        box-shadow: 0px .5px 1px #d8d8d8;
    }

    .product-image {
        width: 80%;
    }

    .product-image,
    .product-info {
        margin-top: 10px;
        width: 50%;
    }

    .color-box {
        width: 40px;
        height: 40px;
        margin-top: 5px;
    }

    .cart {
        margin-right: 25px;
        float: right;
        border: 1px solid #d8d8d8;
        padding: 5px 20px;
    }

    button {
        margin-top: 30px;
        border: none;
        background-color: #1E95EA;
        color: white;
        height: 40px;
        width: 100px;
        font-size: 14px;
    }

    .disabledButton {
        background-color: #d8d8d8;
    }

    .review-form{
        width: 400px;
        padding: 20px;
        margin: 40px;
        border: 1px solid #d8d8d8;
        float:left;
    }

    .reviews{
        width: 400px;
        padding: 20px;
        margin: 40px;
        border: 1px solid #d8d8d8;
        float:left;
    }

    input {
        width: 100%;
        height: 25px;
        margin-bottom: 20px;
    }

    textarea {
        width: 100%;
        height: 60px;
    }

    .tab {
        margin-left: 20px;
        cursor: pointer;
    }

    .activeTab {
        color: #16C0B0;
        text-decoration: underline;
    }

</style>
