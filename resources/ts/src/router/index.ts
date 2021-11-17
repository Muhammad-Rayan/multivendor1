import { createRouter, createWebHashHistory, RouteRecordRaw } from "vue-router";
import store from "@/store";
import { Mutations, Actions } from "@/store/enums/StoreEnums";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    redirect: "/dashboard",
    component: () => import("@/layout/Layout.vue"),
    children: [
      {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("@/views/Dashboard.vue"),
      },
      
      {
        path: "/products/create",
        name: "product-create",
        component: () => import("@/views/product/form.vue"),
      },
      {
        path: "/products",
        name: "product-list",
        component: () => import("@/views/product/index.vue"),
      },
      // Category Route
      {
        path: "/products/categories",
        name: "product-category-list",
        component: () => import("@/views/product/product_category/index.vue"),
      },
      {
        path: "/products/categories/create",
        name: "product-category-create",
        component: () => import("@/views/product/product_category/form.vue"),
      },
      {
        path: "/products/categories/:id/edit",
        name: "product-category-edit",
        meta: {mode: 'edit'},
        component: () => import("@/views/product/product_category/form.vue"),
      },
      
      {
        path: "/products/brand",
        name: "product-brand",
        component: () => import("@/views/product/product_brand/index.vue"),
      },
      {
        path: "/products/brand/create",
        name: "product-brand-create",
        component: () => import("@/views/product/product_brand/form.vue"),
      },
      {
        path: "/products/brand/:id/edit",
        name: "product-brand-edit",
        meta: {mode: 'edit'},
        component: () => import("@/views/product/product_brand/form.vue"),
      },
     {
        path: "/products/attribute",
        name: "product-attribute",
        component: () => import("@/views/product/product_attribute/index.vue"),
      },
      
      {
        path: "/products/attribute/create",
        name: "product-attribute-create",
        component: () => import("@/views/product/product_attribute/form.vue"),
      },
      {
        path: "/products/attribute/:id/edit",
        name: "product-attribute-edit",
        meta: {mode: 'edit'},
        component: () => import("@/views/product/product_attribute/form.vue"),
      },
      {
        path: "/products/:id/attribute-item",
        name: "attribute-item",
        component: () => import("@/views/product/product_attribute/item.vue"),
      },
      
      {
        path: "/products/color",
        name: "product-color",
        component: () => import("@/views/product/product_color/index.vue"),
      }, 
      {
        path: "/products/color/create",
        name: "product-color-create",
        component: () => import("@/views/product/product_color/form.vue"),
      },
      {
        path: "/products/color/:id/edit",
        name: "product-color-edit",
        meta: {mode: 'edit'},
        component: () => import("@/views/product/product_color/form.vue"),
      },
      {
        path: "/products/review",
        name: "product-review",
        component: () => import("@/views/product/product_review/index.vue"),
      },


      {
        path: "/products/seller-product",
        name: "seller-product",
        component: () => import("@/views/product/seller_product/index.vue"),
      },

      {
        path: "/products/inhouse-product",
        name: "inhouse-product",
        component: () => import("@/views/product/inhouse_product/index.vue"),
      },
      {
        path: "/customers/customer-list",
        name: "customer-list",
        component: () => import("@/views/customer/index.vue"),
      },

      {
        path: "/sales/all-order",
        name: "all-order",
        component: () => import("@/views/sales/all_order/index.vue"),
      },
       {
        path: "/sales/inhouse-order",
        name: "inhouse-order",
        component: () => import("@/views/sales/inhouse_order/index.vue"),
      },
       {
        path: "/sales/seller-order",
        name: "seller-order",
        component: () => import("@/views/sales/seller_order/index.vue"),
      },
       {
        path: "/sales/pickuppoint-order",
        name: "pickuppoint-order",
        component: () => import("@/views/sales/pickuppoint_order/index.vue"),
      },

       {
        path: "/refund/approved-request",
        name: "approved-request",
        component: () => import("@/views/refund/approved_request/index.vue"),
      },
       {
        path: "/refund/rejected-request",
        name: "rejected-request",
        component: () => import("@/views/refund/rejected_request/index.vue"),
      },
       {
        path: "/refund/refund-request",
        name: "refund-request",
        component: () => import("@/views/refund/refund_request/index.vue"),
      },
      {
        path: "/reports/inhouseproduct-sale",
        name: "inhouseproduct-sale",
        component: () => import("@/views/reports/inhouseproduct_sale/index.vue"),
      },
      {
        path: "/reports/sellerproduct-sale",
        name: "sellerproduct-sale",
        component: () => import("@/views/reports/sellerproduct_sale/index.vue"),
      },
      {
        path: "/reports/product-stock",
        name: "product-stock",
        component: () => import("@/views/reports/product-stock/index.vue"),
      },

    ],
  },
  
  
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

router.beforeEach(() => {
  // reset config to initial state
  store.commit(Mutations.RESET_LAYOUT_CONFIG);

  store.dispatch(Actions.VERIFY_AUTH);

  // Scroll page to top on every route change
  setTimeout(() => {
    window.scrollTo(0, 0);
  }, 100);
});

export default router;