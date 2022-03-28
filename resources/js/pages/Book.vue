<template>
<!--    <div>Book {{ book }}</div>-->
    <div v-if="errors"> {{errors}} </div>
<div v-if="book.attributes">
    <div class='row'> <h1 class='movie-title'>{{ book.attributes.name }}</h1> </div>

    <div class="row"><button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>


        <div class="ms-auto form-check" v-if="!$parent.$parent.$parent.employee">
            <button class="width-fit btn btn-m btn-primary" id="addCartButton" @click="addToCart">
                Add to cart
            </button>
        </div>
    </div>


    <div class='row'>

        <div class="col-4 card-margin">
            <div class="card np">
            <img class="card-img card-image" :src="'../images/covers/'+ (book.attributes.cover || 'lorem_cover.png')" alt="Movie_poster">
            </div>
        </div>


        <div class="col">
            <div class="row">
                <div class="col card-margin">
                    <h3>
                        <span class="red-text">Release year: </span>{{ book.attributes.release_date }}
                    </h3>


                    <h3>
                        <span class="red-text">Genre: </span>
                        <!-- Først check om der er genre, derefter loop gennem alle genrerne-->
                        <span v-if="book.attributes.genre.length >=1">
                            <span v-for="(genre, index) in book.attributes.genre">{{genre.name}}<span v-if="(index !== book.attributes.genre.length - 1)">, </span></span>
                        </span>
                    </h3>
                    <h3>
                        <span class="red-text">Publisher: </span>
                        <span v-for="publisher in book.attributes.publisher">
                            {{ publisher }}
                        </span>
                    </h3>
                </div>

                <div class="col card-margin">
                    <h3>
                        <span class="red-text">Price: </span>
                            {{ book.attributes.price }}
                    </h3>
                    <h3>
                        <span class="red-text">Author: </span>
                        <span v-for="author in book.attributes.author">
                            {{ author }}
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

</template>


<script>

export default {
    name: "Book",
    data() {
        return {
            book: [],
            errors: ""
        }
    },
    beforeRouteEnter(to, from, next) {
        axios.get(`http://127.0.0.1:8000/api/book/` + to.params.id, {
            headers: {
                Accept: "application/json"
            }
        })
            .then(response => {
                next(vm => {
                    vm.book = response.data.data
                    console.log(vm.book)
                })
            })
            .catch(e => {
                next(vm => {
                    vm.errors = e
                })
            })
    },

    methods: {
        // Add a book to cart
        addToCart() {
            // Gets the cart from local storage
            let cart = JSON.parse(localStorage.getItem('cart'))
            let count = JSON.parse(localStorage.getItem('itemsInCart'))+1
            this.$parent.$parent.$parent.itemsInCart++;
            localStorage.setItem('itemsInCart', count.toString())
            // Checks if there is a cart in localstorage, and gives local cart a value.
            if (cart === null){
                cart = []
            }

            // Used to add one more of the same book to cart
            const newArr = cart.map(obj => {
                if (obj.id === this.book.id) {
                    return {...obj, quantity: obj.quantity + 1};
                }
                return obj;
            });

            // Checks if the cart is empty
            if (cart.length === 0) {
                cart.push({id: this.book.id, quantity: 1, book: this.book.attributes.name, price: this.book.attributes.price});

            } else {
                let newBook = true;

                // Loops through the cart to see if the book exists
                for (let key in cart) {
                    if (cart[key].id === this.book.id) {
                        newBook = false;
                        break;
                    }
                }
                // Checks if it is a new book, if true then add it to cart
                if (newBook) {
                    cart.push({id: this.book.id, quantity: 1, book: this.book.attributes.name, price: this.book.attributes.price});
                } else {
                    // Increases quantity by one
                    cart = newArr;
                }
            }
            // Saves the cart back to storage
            localStorage.setItem('cart', JSON.stringify(cart))
            console.log(cart)
        },
    },
}
</script>

