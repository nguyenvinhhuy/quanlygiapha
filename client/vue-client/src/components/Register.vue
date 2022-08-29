<template>
    <div class="col-md-8 offset-md-2 pt-100">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 mt-1">Sign up</h4>
                <form autocomplete="off" @submit.prevent="register">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" v-model="form.name" required>
                    </div>
                    <div class="form-group" >
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com"
                            v-model="form.email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" v-model="form.password" required>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role_id</label>
                        <input type="text" id="role_id" class="form-control" v-model="form.role_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

// import { register } from '../store/auth'
export default {
    name:'register',
    data() {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                role_id:''
            },
            type:'register'
        };
    },
    methods: {
        register() {
            this.$store.dispatch('REGISTER')
            register(this.$data.form)
                .then(res => {
                    this.$store.commit('REGISTER', res)
                    this.$router.push({ path: '/login' })
                })
                .catch(err => {
                    this.$store.commit('REGISTER', { err })
                    alert(this.authError, 'error')
                })
        }
    }
}
</script>