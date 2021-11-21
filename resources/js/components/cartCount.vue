<template>
    <keep-alive>
        <span class="cart__qty" :count="count">{{ cartCount }}</span>
    </keep-alive>
</template>

<script>
import {store} from '../vueApp';

export default {
    props: ['count'],
    computed: {
        cartCount() {
            return this.$store.state.cartCount;
        }
    },
    mounted() {
        store.state.cartCount = this.count;
    },
    methods: {},
};
</script>
