import Vue from 'vue';
import axios from 'axios';

window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
import Vuex from 'vuex';
import cartCount from "./components/cartCount";

Vue.use(Vuex);

Vue.component('addToCart', require('./components/addToCart.vue').default);
Vue.component('cartItem', require('./components/cartItem.vue').default);
Vue.component('cartItems', require('./components/cartItems.vue').default);
Vue.component('cartCount', require('./components/cartCount.vue').default);

export const eventBus = new Vue();
export const store = new Vuex.Store({
    state: {
        cartCount: 0,
        total: 0,
        items: null,
    },
    mutations: {
        updateCartCount(state, count) {
            state.cartCount = count;
        },
        updateCartTotal(state, total) {
            state.total = total;
        },
        getCartItems(state, response) {
            state.items = response.data.items;
            state.total = response.data.total;
            state.cartCount = response.data.count;
        },
        updateCartItems(state, items) {
            state.items = items;
        }
    },
    getters: {
        cartCount(state) {
            return state.cartCount
        },
        total(state) {
            return state.total
        },
        items(state) {
            return state.items
        }
    },
    actions: {
        getCartCount() {
            console.log(cartCount.computed.count());
        },
        getCartContent({commit}) {
            axios.get('/cart/getContent')
                .then((response) => {
                    commit('getCartItems', response);
                });
        },
        getTotal() {
            console.log(cartItems.computed.total());
        }
    },
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let healthcity = new Vue({
    el: '#healthcity',
    store,
});
