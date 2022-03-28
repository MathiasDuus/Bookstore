<template>
    <button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>

    <div class="row" v-if="user.first_name && user.last_name">
        <h1 class="col">{{ user.first_name + ' ' + user.last_name }}</h1>
    </div>
    <div class="col" v-if="orders.length >0">
        <h2><b>Orders:</b></h2>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="order in orders">
                <td>{{ order.id }}</td>
                <td>{{ order.quantity }}</td>
                <td>{{ order.price }}</td>
                <td>{{ order.status }}</td>
            </tr>
            </tbody>
        </table>


    </div>

    <div class="col" v-if="employee.attributes">
        <ul>
            <li>
                <h3><span class="red-text">Department: </span>{{ employee.attributes.department}}</h3>
            </li>
            <li>
                <h3><span class="red-text">Store: </span>{{ employee.attributes.store}}</h3>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            orders: [],
            user: [],
            employee:[]
        }
    },
    beforeRouteEnter(to, from, next) {
        // console.log(localStorage.getItem('user'))
        if (localStorage.getItem('user')) {
            axios.get(`http://127.0.0.1:8000/api/customer/` + JSON.parse(localStorage.getItem('user')).id, {
                headers: {
                    Accept: "application/json"
                }
            })
                .then(response => {
                    next(vm => {
                        vm.orders = response.data.data.attributes.orders
                        let id= 0
                        let quantity = 0
                        let price = 0
                        let status = ""
                        let ord = []
                        for (let orders of vm.orders) {
                            for (let order of orders){
                                id = order.id
                                status = order.attributes.status

                                for (let orderLine of order.attributes.order_line) {
                                    quantity += orderLine.attributes.quantity
                                    price += orderLine.attributes.quantity*orderLine.attributes.price
                                }
                                ord.push({
                                    id:id,
                                    quantity:quantity,
                                    price:price,
                                    status:status
                                })
                                id=0
                                quantity=0
                                price=0
                                status=''

                            }
                        }
                        vm.orders = ord
                        vm.user = {
                            first_name:response.data.data.attributes.first_name,
                            last_name:response.data.data.attributes.last_name
                        }
                        console.log(response.data.data.attributes.orders)
                    })
                })
                .catch(e => {
                    next(vm => {
                        vm.errors = e
                    })
                })
        }
        else if(localStorage.getItem('employee')){
            axios.get(`http://127.0.0.1:8000/api/employee/` + JSON.parse(localStorage.getItem('employee')).id, {
                headers: {
                    Accept: "application/json"
                }
            })
                .then(response => {
                    next(vm => {
                        vm.employee = response.data.data
                        vm.user = {
                            first_name:response.data.data.attributes.first_name,
                            last_name:response.data.data.attributes.last_name
                        }
                        console.log(vm.employee)
                    })
                })
                .catch(e => {
                    next(vm => {
                        vm.errors = e
                    })
                })
        }
        else {
            next(vm=>{
                vm.$router.push('/login')
            })
        }
    },
}
</script>

<style scoped>

</style>
