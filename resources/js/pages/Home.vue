<template>
    <p v-if="errors">
        {{errors}}
    </p>


    <div class="row">
        <div id="leftCol" class="col">
            <div class="row">
                <h1>Books</h1>
            </div>
            <div v-for="genre in genres">
                <div class="row" v-if="genre.book.length>0">
                        <h2 class="genre-title" @click="showGenre(genre.id)">{{genre.attributes.name}}</h2>
                        <h2 class="genre-count ms-auto">{{genre.book.length}}</h2>
                </div>
                <div class="row">
                    <div v-for="(book, index) in genre.book" class="col-3 card-margin" @click="showBook(book.id)">
                        <div class="card" v-if="index <=3">
                            <img class="card-img card-image" :src="'images/covers/'+ (book.attributes.cover || 'lorem_cover.png')"  alt="book_cover">
                            <div class="card-body">
                                <h5 class="card-title">{{ book.attributes.name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ book.attributes.price}} DKK</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>

<script>

export default {
    name: "Home",
    data() {
        return {
            genres: [],
            errors:"",
        }
    },

    methods: {
        showGenre(id) {
            this.$router.push({path: '/genre/'+id})
        },
        showBook(id){
            this.$router.push({path: '/book/'+id})
        },
    },

    // Fetch posts when the component is created.
    created() {
        axios.get(`http://127.0.0.1:8000/api/genre`, {
            headers: {
                Accept: "application/json"
            }
        })
            .then((response) => {
                this.genres = response.data.data
                console.log(this.genres)

            })
            .catch(e => {
                this.errors = e
            })
    }
}
</script>
