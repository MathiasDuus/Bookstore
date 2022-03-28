<template>
    <div class="row">
        <button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>

        <div class="ms-auto form-check">
            <button class="width-fit btn btn-m btn-primary" id="buy" @click="buy">
                Køb
            </button>
        </div>
    </div>


    <div class='row'>
        <div class="col">
            <h2>Order:</h2>
            <div v-if="cart">
                <div class="row" v-for="book in cart">
                    <div class="col card-margin">
                        <h3 class="cursor-point" @click="this.$router.push({path: '/book/'+book.id})"> <span class="red-text">{{book.quantity }} X </span>{{book.book}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h3><span class="red-text">Total price: </span> {{totalPrice}}</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cart",
    data() {
        return {
            cart: [],
            totalPrice: 0
        }
    },
    mounted() {
        this.showCart()
    },
    beforeUpdate() {
        this.showCart()
    },
    methods: {
        showCart() {
            if (localStorage.getItem('cart')) {
                this.totalPrice = 0;
                this.cart = JSON.parse(localStorage.getItem('cart'))
                for (let key in this.cart) {
                    this.totalPrice += this.cart[key].quantity * this.cart[key].price;
                }
                this.totalPrice = this.numberWithCommas(this.totalPrice);
                console.log(this.cart)
            }
        },
        buy() {
            if (localStorage.getItem('user')) {
                let checkoutData = {
                    address_id:JSON.parse(localStorage.getItem('user')).attributes.addresses[0].id,
                    date:'2002-10-10',
                    status: 'in transit'
                }
                axios.post(`http://127.0.0.1:8000/api/order`, checkoutData)
                    .then(({data}) => {
                        console.log(data.data.id)
                        for (let book of this.cart) {
                            axios.post(`http://127.0.0.1:8000/api/orderLine`, {
                                order_id:data.data.id,
                                book_id:book.id,
                                quantity:book.quantity,
                                price:book.price,
                            })
                                .then(({data}) => {
                                    console.log(data)
                                    this.totalPrice = 0
                                    this.cart = []
                                    this.$parent.$parent.$parent.itemsInCart = 0;
                                    localStorage.removeItem('cart')
                                    localStorage.removeItem('itemsInCart')
                                })
                                .catch((error) => {
                                    console.log(error);
                                });
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }else{
                alert('You must login or register')
                this.$router.push('/login');
            }
        },
        numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>
