<template>
    <div id="example">
        <input type="text" v-model="inputcolor" @input="getColor" placeholder="Nhập tên màu">
        <div v-bind:style="{ backgroundColor: Color }">color</div>
    </div>

</template>
<script>
export default {
    name: 'Test',
    data() {
        return {
            inputcolor: ' ',
            Color: '{{inputcolor}} '
        }
    },
    methods: {
        getColor: function () {
            this.Color = this.inputcolor
        }
    }
}
</script>
