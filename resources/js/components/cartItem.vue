<template>
    <div class="cart-item">
        <p class="cart-item__name">{{ item.name }}</p>
        <p class="cart-item__price">{{ formatPrice(item.price) }} {{ unit }}</p>
        <p class="cart-item__remove" @click.prevent="removeItem"><svg width="36" height="34" viewBox="0 0 36 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="1.11064" height="24.4341" rx="0.555321" transform="matrix(0.722457 -0.691416 0.722457 0.691416 8.42517 8.83093)" fill="#EA5C10"/>
            <rect width="1.11064" height="24.4341" rx="0.555321" transform="matrix(0.722457 0.691416 -0.722457 0.691415 26.0775 8.06296)" fill="#EA5C10"/>
        </svg>
        </p>
    </div>
</template>

<script>
import {store} from '../vueApp';

export default {
    props: ['item','unit'],
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },
        removeItem(){
            let self = this;
            axios.post('/cart/remove',{productId: this.item.id})
                .then((response)=>{
                    self.$store.commit('updateCartCount',response.data.count);
                    self.$store.commit('updateCartTotal',response.data.total);
                    self.$store.commit('updateCartItems',response.data.items);
                });
        }
    },
};
</script>
<style>

</style>
