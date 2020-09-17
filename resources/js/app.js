require('./bootstrap');

window.Vue = require('vue');

// COMPONENTS \\
    // LAYOUT \\
    Vue.component("TheNavbar", () => import("./components/layout/TheNavbar.vue"));
    Vue.component("TheFooter", () => import("./components/layout/TheFooter.vue"));
    // PAGES \\
    Vue.component("TheWelcome", () => import("./components/pages/TheWelcome.vue"));
    Vue.component("TheApp", () => import("./components/pages/TheApp.vue"));
        // PRODUCTS \\
        Vue.component("ProductShow", () => import("./components/pages/products/ProductShow.vue"));
        Vue.component("ProductCreate", () => import("./components/pages/products/ProductCreate.vue"));
    // PARTIALS \\
    Vue.component("ProductList", () => import("./components/partials/ProductList.vue"));
    Vue.component("ProductItem", () => import("./components/partials/ProductItem.vue"));
    // FORMS \\
        // PARTIALS \\
        Vue.component("MaterialListForm", () => import("./components/forms/partials/MaterialListForm.vue"));
        Vue.component("MaterialItemForm", () => import("./components/forms/partials/MaterialItemForm.vue"));
        Vue.component("TypeListForm", () => import("./components/forms/partials/TypeListForm.vue"));
        Vue.component("TypeItemForm", () => import("./components/forms/partials/TypeItemForm.vue"));


const app = new Vue({
    el: '#app',
});
