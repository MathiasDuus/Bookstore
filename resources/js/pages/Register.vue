<template>
    <button class="width-fit btn btn-m btn-secondary" @click="$router.go(-1)" >Back</button>

    <div class="login">
        <div class="row">
            <form id="register">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First name</label>
                    <input class="form-control" id="first_name" placeholder="John" required v-model="user.first_name"/>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last name</label>
                    <input class="form-control" id="last_name" placeholder="Doe" required v-model="user.last_name"/>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" id="email" placeholder="mail@mail.com" type="email" required v-model="user.email"/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control password" id="password" type="password" placeholder="Password" required v-model="user.password"/>
                </div>
                <div class="mb-3">
                    <p><b>Password must </b></p>
                    <ul class="password-check">
                        <li id="eightCh">    Be at least 8 characters</li>
                        <li id="oneNum">     Have at least one number</li>
                        <li id="oneSym">     Have at least one symbol</li>
                        <li id="uppercase">  Have at least one upper case letter</li>
                        <li id="lowercase">  Have at least one lower case letter</li>
                    </ul>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input class="form-control password" id="password_confirmation" type="password" placeholder="Password" required v-model="user.password_confirmation"/>
                </div>
            </form>
        </div>
        <div class="row">
            <button id="register-btn" class="btn btn-primary width-fit" @click="register()">Register</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data(){
        return {
            user: {
                first_name:'',
                last_name:'',
                email:'',
                password: '',
                password_confirmation: '',
            },
        }
    },
    methods:{
        register(){
            console.log(this.user);
            axios.post(`http://127.0.0.1:8000/api/register`, this.user)
                .then(({data}) => {
                    this.$router.push('/login');
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    }
}
</script>

