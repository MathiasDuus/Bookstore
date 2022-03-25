<template>


    <div v-if="genres.attributes && genres.book">
        <div class="row">
            <h2 class="nm genre-title">{{GenreName}}</h2>
            <h2 class="genre-count ms-auto">{{genres.book.length}}</h2>
        </div>
        <div class="row">

            <div v-for="book in genres.book" class="col-3 card-margin" @click="showBook(book.id)">
                <div class="card">
                    <img class="card-img card-image" :src="'../images/covers/'+ (book.attributes.cover || 'lorem_cover.png')"  alt="book_cover">
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

</template>

<script>
export default {
    name: "Genre",
    data() {
        return {
            genres: [],
            GenreName:'',
            errors:"",
        }
    },
    beforeRouteEnter(to, from, next) {
        axios.get(`http://127.0.0.1:8000/api/genre/` + to.params.id, {
            headers: {
                Accept: "application/json"
            }
        })
            .then(response => {
                next(vm => {
                    vm.genres = response.data.data
                    vm.GenreName = vm.genres.attributes.name.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                        return letter.toUpperCase();
                    });
                    console.log(vm.genres)
                })
            })
            .catch(e => {
                next(vm => {
                    vm.errors = e
                })
            })
    },

    methods: {
        showGenre(id) {
            this.$router.push({path: '/genre/'+id})
        },
        showBook(id){
            this.$router.push({path: '/book/'+id})
        },
    },

}
</script>

<style scoped>

</style>
