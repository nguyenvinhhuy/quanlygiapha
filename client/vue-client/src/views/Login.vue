<template>
    <div class="col-md-8 offset-md-2 pt-100">
        <div class="card">
            <article class="card-body">
                <a href="" class="float-right btn btn-outline-primary" @click.prevent="changeType('register')">Sign
                    up</a>
                <h4 class="card-title mb-4 mt-1">Sign in</h4>
                <hr>
                <form @submit.prevent="authenticate">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" class="form-control" placeholder="user@example.com" type="email"
                            v-model="form.email" :class="{ 'is-invalid': submitted && $v.form.email.$error }">
                        <div v-if="submitted && $v.form.email.$error" class="invalid-feedback">
                            <span v-if="!$v.form.email.required">Email is required</span>
                            <span v-if="!$v.form.email.email">Email is invalid</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" class="form-control" placeholder="******" type="password"
                            v-model="form.password" :class="{ 'is-invalid': submitted && $v.form.password.$error }">
                        <div v-if="submitted && $v.form.password.$error" class="invalid-feedback">
                            <span v-if="!$v.form.password.required">Password is required</span>
                            <span v-if="!$v.form.password.minLength">Password must be at least 6 characters</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="small" href="#">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </div>
</template> -->

<script>
// import { login } from '../store/auth'
import { required, email, minLength } from 'vuelidate/lib/validators'
export default {
    name: 'Login',
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            submitted: false,
            errorMessage: '',
            type: 'login',
            error: null
        }
    },
    validations: {
        form: {
            email: { required, email },
            password: { required, minLength: minLength(6) }
        }
    },
    methods: {
        authenticate() {
            this.submitted = true
            this.$v.$touch()
            if (this.$v.$invalid) {
                return
            }
            this.$store.dispatch('login')
            login(this.$data.form)
                .then(res => {
                    this.$router.push({ path: '/' })
                })
                .catch(err => {
                    alert(err.response.data.message)
                })
        },
        changeType(){
            this.$router.push({ path: '/register' })
        }
    }
}
</script>
