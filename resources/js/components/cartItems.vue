<template>
    <keep-alive>
        <div class="cart__content__items">
            <p v-if="!total">{{emptyText}}</p>
            <cart-item v-else v-for="item in items" :key="item.id" :item="item" :unit="unit"></cart-item>

            <div class="cart__content__totals">
                <p>{{ totalText }}:</p>
                <div class="cart__content__totals__info">
                    <picture>
                        <img src="/img/icons/services-inner-invoice-icon.svg" alt="icon">
                    </picture>
                    <div class="info__price">
                        <span>{{ priceText }}</span>
                        <span class="info__qty">{{ formatPrice(total) }} {{ unit }}</span>
                    </div>
                    <div v-if="total > 0" class="cart__content__totals__info__btns">
                        <a href="#" class="btn-request" @click.prevent="printCart">{{ printText }}</a>
                        <a href="#" class="btn-clear" @click.prevent="clearCart">{{ clearText }}</a>
                    </div>
                </div>
            </div>
        </div>
    </keep-alive>
</template>

<script>

export default {
    props: ['priceText', 'unit', 'totalText', 'emptyText', 'clearText','printText'],
    data() {
        return {};
    },
    created() {
        this.getCartContent();
    },
    computed: {
        total: {
            get() {
                return this.$store.state.total;
            },
            set(val) {
                this.$store.state.total = val;
            },
        },
        items: {
            get() {
                return this.$store.state.items;
            },
            set(val) {
                this.$store.state.items = val;
            },
        },
    },
    mounted() {
        this.$store.state.total = this.total;
        this.$store.state.items = this.items;
    },
    methods: {
        getCartContent() {
            this.$store.dispatch("getCartContent")
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        },
        removeItem(item) {
            this.items.splice(this.items.indexOf(item), 1);
        },
        clearCart() {
            let self = this;
            axios.post('/cart/clear')
                .then((response)=>{
                    self.$store.commit('updateCartCount',response.data.count);
                    self.$store.commit('updateCartTotal',response.data.total);
                    self.$store.commit('updateCartItems',response.data.items);
                });
        },
        printCart() {
            let self = this;
            axios.get('/cart/print')
                .then((response)=>{
                    const url = response.data.application.file;
                    const link = document.createElement('a');
                    link.href = `/storage/${url}`;
                    link.setAttribute('download', `healthcity_${response.data.application.uuid}.pdf`);
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });
        }
    },
};
</script>
