<template>
    <button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>

    <div class="login">
        <div class="row">
        <form id="register">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" id="email" placeholder="mail@mail.com" type="email" v-model="user.email"/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control password" id="password" type="password" placeholder="Password" v-model="user.password"/>
            </div>
        </form>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary width-fit" @click="login">Login</button>
            </div>
            <div class="col">
                <button class="btn btn-secondary width-fit" @click="$router.push('/register')">Register</button>
            </div>
        </div>
    </div>
</template>

<script>
// import Auth from '../Auth.js'

export default {
    name: "Login",
    data() {
        return {
            user: {
                email: '',
                password: '',
            }
        };
    },

    methods: {
        login() {
            axios.post('http://127.0.0.1:8000/api/login', this.user, {
                headers: {
                    Accept: "application/json"
                }
            })
                .then(({data}) => {
                    this.$auth.login(data.token, data.user)
                    this.$parent.$parent.$parent.user = true;
                    console.log(data)
                    // localStorage.setItem('user', this.user.email)
                    // localStorage.setItem('token', data.token)
                    this.$router.push('/dashboard');

                })
                .catch((error) => {
                    alert(error.response.data.error);
                });
        }
    }
}

</script>

