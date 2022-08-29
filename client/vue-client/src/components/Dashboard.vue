<template>
    <div>
        <h1>Dashboard</h1>
        <button v-if="loggedIn" :class="`btn btn-primary`" @click="logout">
            Logout
        </button>
    </div>
</template>

<script>
import { authComputed } from "../helpers/vuex";
export default {
    computed: {
        ...authComputed
    },
    methods: {
        logout() {
            this.$store.dispatch("logout");
        }
    }
};
</script>