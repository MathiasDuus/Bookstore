<template>
    <button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>

    <div class="row" v-if="user">
        <h1 class="col">{{ user.first_name + ' ' + user.last_name }}</h1>
    </div>
    <div class="col" id="comment_user">
        <h2><b>Orders:</b></h2>
<!--        @if($comments!= null && count($comments) >0)-->
<!--        @foreach($comments as $comment)-->
        <table class="table-sm table-striped table-hover table-bordered border-dark">
            <thead>
            <tr>
                <th>ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="order in orders" @click="show(order.id)">
                <td>order.id</td>
                <td>order.quantity</td>
                <td>order.price</td>
                <td>order.status</td>
            </tr>
            </tbody>
        </table>
<!--        @endforeach-->
<!--        @endif-->

    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            orders: [],
            user: []
        }
    },
    beforeRouteEnter(to, from, next) {
        if (localStorage.getItem('user')) {
            axios.get(`http://127.0.0.1:8000/api/customer/` + localStorage.getItem('user').id, {
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
        }else {
            next(vm=>{
                vm.$router.push('/login')
            })
        }
    },
    methods: {
        getOrders() {

        },
        show(id) {

        }
    }
}
</script>

<style scoped>

</style>
