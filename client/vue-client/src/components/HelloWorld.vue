<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <h2>Essential Links</h2>
    <a href="javascript:void(0)" class="btn btn-lg btn-primary" v-on:click="logout">Logout</a>
  </div>
</template>

<script>
import { logout } from '../helpers/auth'
export default {
  name: 'HelloWorld',
  methods:{
    logout(){
      this.$store.dispatch('LOGOUT')
      this.$router.push({ path: '/login' })
    }
  },
  data() {
    return {
      msg: 'Welcome to Your Vue.js App',
      type: 'logout'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1,
h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
