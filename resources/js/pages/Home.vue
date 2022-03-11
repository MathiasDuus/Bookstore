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
                <div class="row">
                        <h2 class="genre-title" @click="showGenre(genre.id)">{{genre.attributes.name}}</h2>
                        <h2 class="genre-count ms-auto">{{genre.book.length}}</h2>
                </div>
                <div class="row">
                        <div v-for="(book, index) in genre.book" class="col-2 card-margin" @click="showProgram(book.id)">
                            <div class="card" v-if="index <=5">
                                <img class="card-img card-image" src="" @error="defaultImage" alt="book_cover">
                                <h3 class="book-title">{{ book.attributes.name }}</h3>
                            </div>
                        </div>
                    </div>
                    </div>

        </div>
    </div>

</template>

<script>
// import axios from 'axios';
import img from '../../pictures/covers/lorem_cover.png'

export default {
    data() {
        return {
            genres: [],
            errors:""
        }
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
        showProgram(id){
            this.$router.push({path: '/about'})
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
