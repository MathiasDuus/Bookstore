import axios from 'axios';

class Auth {
    constructor () {
        this.token = window.localStorage.getItem('token');
        let userData = window.localStorage.getItem('user');
        this.user = userData;

        if (this.token) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;
        }
    }


    login (token, user) {
        window.localStorage.setItem('token', token);
        if (user.type === 'Employee') {
            window.localStorage.setItem('employee', JSON.stringify(user));

        } else {
            window.localStorage.setItem('user', JSON.stringify(user));
        }
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

        this.token = token;
        this.user = user;
    }


    check () {
        return !! this.token;
    }


    logout () {
        // window.localStorage.clear();
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('user');
        window.localStorage.removeItem('employee');
        this.user = null;
    }
}
export default new Auth();
