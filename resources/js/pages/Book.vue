<template>
<!--    <div>Book {{ book }}</div>-->
    <div v-if="errors"> {{errors}} </div>
<div v-if="book.attributes">
    <div class='row'> <h1 class='movie-title'>{{ book.attributes.name }}</h1> </div>

    <div class="row"><button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>


        <div class="ms-auto form-check">
            <button class="width-fit btn btn-m btn-secondary" id="addCartButton" @click="addToCart">
                Add to cart
            </button>
        </div>
    </div>


    <div class='row'>

        <div class="col-4 card-margin">
            <div class="card np">
            <img class="card-img card-image" src="" alt="Movie_poster" @error="defaultImage" >
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
                            <span v-for="(genre, index) in book.attributes.genre">
                                {{ genre.name }}
                                <span v-if="(index !== book.attributes.genre.length - 1)">, </span>
                            </span>
                        </span>
                    </h3>
                </div>

                <div class="col card-margin">
                    <h3>
                        <span class="red-text">Author: </span>
                        <span v-for="author in book.attributes.author">
                            {{ author }}
                        </span>
                    </h3>
                </div>
                <div class="row">

                    <h3>
                        <span class="red-text">Publisher: </span>
                        <span v-for="publisher in book.attributes.publisher">
                            {{ publisher }}
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

</template>


<script>
import img from '../../pictures/covers/lorem_cover.png'

export default {
    data() {
        return {
            book: [],
            errors:""
        }
    },
    beforeRouteEnter(to,from,next) {
        /*
        axios.get('/api/channel/' + to.params.id).then(response => {
      next(vm => {
        vm.content = reponse.data
      })
    })
         */
        axios.get(`http://127.0.0.1:8000/api/book/`+to.params.id, {
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
        defaultImage(event){
            event.target.src = img
        },
        showGenre(id, event) {
            // `this` inside methods points to the current active instance
            alert(`Hello ${id}!`)
            // `event` is the native DOM event
            if (event) {
                alert(event.target.tagName)
            }
        },
        addToCart(){

            const newArr = this.cart.map(obj => {
                if (obj.id === this.book.id) {
                    return {...obj, quantity: obj.quantity+1};
                }
                return obj;
            });

            console.log(this.cart.length)
            if(this.cart.length === 0){
                this.cart.push({id:this.book.id ,quantity: 1, book: this.book.attributes.name});
                console.log(this.cart)
            }
            // else if: hvis der allerrede er noget i kurven, og en ny bog skal tilføjes, tjek da id mod id
            // og tilføj
            else {
                this.cart = newArr;
                console.log(this.cart)
            }


            // let i = 1;
            // this.cart.push({quantity: i,book: this.book.attributes.name});
            // // this.cart.quantity ++
            // // this.cart.book = this.book.attributes.name
            //
            // console.log(this.cart)
        },
    },
}
</script>

