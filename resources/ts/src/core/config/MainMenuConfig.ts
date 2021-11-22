const DocMenuConfig = [
  {
    pages: [
      {
        heading: "dashboard",
        route: "/dashboard",
        svgIcon: "media/icons/duotune/art/art002.svg",
        fontIcon: "bi-app-indicator",
      },
    ],
  },
  {
    pages: 
    [
      {
        sectionTitle: "Products",
        route: "/products",
        svgIcon: "media/icons/duotune/general/gen025.svg",
        fontIcon: "bi-layers",
        sub: [
          {
            heading: "Add New Products",
            route: "/products/create",
          },
          {
            heading: "Products List",
            route: "/products",
          },
          {
            heading: "In House Product",
            route: "/products/inhouse-product",
          },
           {
            heading: "Seller Product",
            route: "/products/seller-product",
          },
          {
            heading: "Category",
            route: "/products/categories",
          },
          {
            heading: "Brand",
            route: "/products/brand",
          },
          {
            heading: "Attribute",
            route: "/products/attribute",
          },
          {
            heading: "Color",
            route: "/products/color",
          },         
           {
            heading: "Review",
            route: "/products/review",
          },
        ],
      },
    ],
  },
 {
    pages: 
    [
      {
        sectionTitle: "Customers",
        route: "/customers",
        svgIcon: "media/icons/duotune/general/gen025.svg",
        fontIcon: "bi-layers",
        sub: [
          {
            heading: "Customer list",
            route: "/customers/customer-list",
          },
          
        ],
      },
    ],

  },
 {
    pages: 
    [
      {
        sectionTitle: "Sales",
        route: "/sales",
        svgIcon: "media/icons/duotune/general/gen025.svg",
        fontIcon: "bi-layers",
        sub: [
          {
            heading: "All Order",
            route: "/all_orders",
          },
          {
            heading: "In House Order",
            route: "/orders/inhouse-orders",
          },
          {
            heading: "Seller Order",
            route: "/orders/seller-order",
          },
          {
            heading: "Pickup-point Order",
            route: "/orders/pickuppoint-order",
          },
          
        ],
      },
    ],

  },

 {
    pages: 
    [
      {
        sectionTitle: "Refund",
        route: "/refund",
        svgIcon: "media/icons/duotune/general/gen025.svg",
        fontIcon: "bi-layers",
        sub: [
          {
            heading: "Refund Request",
            route: "/refund/refund_request",
          },
          {
            heading: "Approved Request",
            route: "/refund/approved_request",
          },
          {
            heading: "Rejected Request",
            route: "/refund/rejected_request",
          },
          
        ],
      },
    ],

  },
   {
    pages: 
    [
      {
        sectionTitle: "Reports",
        route: "/reports",
        svgIcon: "media/icons/duotune/general/gen025.svg",
        fontIcon: "bi-layers",
        sub: [
          {
            heading: "InHouse Product Sale",
            route: "/reports/inhouseproduct-sale",
          },
          {
            heading: "Seller Product Sale",
            route: "/reports/sellerproduct-sale",
          },
          {
            heading: "Product Stock",
            route: "/reports/product-stock",
          },
          
        ],
      },
    ],

  },
];

export default DocMenuConfig;