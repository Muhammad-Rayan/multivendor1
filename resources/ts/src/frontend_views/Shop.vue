<template>
    <div class="page-content mb-10 mt-10">
        <div class="container">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">
                        <!-- Start of Sticky Sidebar -->
                        <div class="sticky-sidebar">
                            <div class="filter-actions">
                                <label>Filter :</label>
                                <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                            </div>
                            <!-- Start of Collapsible widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>All Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    <li v-for="(cat, index) in categories" :key="index">
                                        <temlate v-if="cat.id == this.params.cat">
                                            <a class="filterclass" @click="catFilter(cat.id)" style="cursor: pointer;">{{ cat.name }}</a>
                                        </temlate>
                                        <temlate v-else>
                                            <a @click="catFilter(cat.id)" style="cursor: pointer;">{{ cat.name }}</a>
                                        </temlate>
                                        
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Price</span></h3>
                                <div class="widget-body">
                                    <ul class="filter-items search-ul">
                                        <li><a href="#">$0.00 - $100.00</a></li>
                                        <li><a href="#">$100.00 - $200.00</a></li>
                                        <li><a href="#">$200.00 - $300.00</a></li>
                                        <li><a href="#">$300.00 - $500.00</a></li>
                                        <li><a href="#">$500.00+</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input type="number" name="min_price" class="min_price text-center"
                                            placeholder="$min"><span class="delimiter">-</span><input
                                            type="number" name="max_price" class="max_price text-center"
                                            placeholder="$max"><a href="#"
                                            class="btn btn-primary btn-rounded">Go</a>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Size</span></h3>
                                <ul class="widget-body filter-items search-ul mt-1">
                                    <li v-for="(size, index) in size" :key="index">
                                        <temlate v-if="size.id == this.params.size_id">
                                            <a class="filterclass" @click="sizeFilter(size.id)" style="cursor: pointer;">{{ size.value }}</a>
                                        </temlate>
                                        <temlate v-else>
                                            <a @click="sizeFilter(size.id)" style="cursor: pointer;">{{ size.value }}</a>
                                        </temlate>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Brand</span></h3>
                                <ul class="widget-body filter-items search-ul mt-1">
                                    <li v-for="(brand, index) in brand" :key="index">
                                        <temlate v-if="brand.id == this.params.brand_id">
                                            <a class="filterclass" @click="brandFilter(brand.id)" style="cursor: pointer;">{{ brand.name }}</a>
                                        </temlate>
                                        <temlate v-else>
                                            <a @click="brandFilter(brand.id)" style="cursor: pointer;">{{ brand.name }}</a>
                                        </temlate>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Color</span></h3>
                                <ul class="widget-body filter-items search-ul mt-1">
                                    <li v-for="(color, index) in color" :key="index">
                                        <temlate v-if="color.id == this.params.color_id">
                                            <a class="filterclass" @click="colorFilter(color.id)" style="cursor: pointer;">{{ color.name }}</a>
                                        </temlate>
                                        <temlate v-else>
                                            <a @click="colorFilter(color.id)" style="cursor: pointer;">{{ color.name }}</a>
                                        </temlate>
                                    </li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Main Content -->
                <div class="main-content">
                    <!-- Start of Shop Banner -->
                    <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                        style="background-image: url(assets/images/shop/banner1.jpg); background-color: #FFC74E;">
                        <div class="banner-content">
                            <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart
                                Watches</h3>
                            <a href="shop-banner-sidebar.html"
                                class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End of Shop Banner -->
                    <div class="row mb-10">
                        <div class="col-3">
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control" @change="orderPerPage"
                                    v-model="params.order_by">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="latest">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-3">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control"  @change="updatePerPage"
                                    v-model="params.per_page">
                                    <option value="9">Show 9</option>
                                    <option value="12" selected="selected">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                        <div class="product-wrap" v-for="(products, index) in model.data" :key="index">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img :src="`/productgallery/${products.capture_image}`" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">3D Television</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $220.00 - $230.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="toolbox toolbox-pagination justify-content-between">
                        <p class="showing-info mb-2 mb-sm-0">
                            Showing<span>{{model.from}} - {{model.to}} of {{model.total}} </span> Products
                        </p>
                        <ul class="pagination">
                            <li class="prev disabled">
                                <a aria-label="Previous" @click="prevPage">
                                    <i class="w-icon-long-arrow-left"></i>Prev
                                </a>
                            </li>
                            <!-- <li class="page-item active"  v-for="(links, index) in model.links" :key="index">
                                <a class="page-link" href="#">{{ }}</a>
                            </li> -->
                            <li class="next">
                                <a aria-label="Next" @click="nextPage">
                                    Next<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
</template>
<script type="text/javascript">
import Dropdown2 from "@/components/dropdown/Dropdown2.vue";
import FileUpload from '@/my_components/form/FileUpload.vue'
import ErrorText from '@/my_components/form/ErrorText.vue'

import { get,byMethod } from '@/lib/api'
import { form } from '@/lib/mixins'
import { useToast } from "vue-toastification";
import { copyObject } from '@/lib/helpers'

function initializeUrl (to) {
    let urls = {
        'create': `/api/product/categories/create`,
        'edit': `/api/product/categories/${to.params.id}/edit`,
        'clone': `/api/product/categories/${to.params.id}/edit?mode=clone`,
    }

    return (urls[to.meta.mode] || urls['create'])
}

export default ({
  name: "kt-widget-12",
  components: { Dropdown2,FileUpload,ErrorText },
  mixins: [ form ],
  data() {
        return {
            model: {},
            categories:{},
            catClass: false,
            params: {
              per_page: 12,
              order_by:'default',
              page: 1,
              q: '',
              cat:'',
              size_id:'',
              brand_id:'',
              color_id:'',
              colorsFilter:'',
              brandsFilter:'',
              attriutesFilter:'',
              sort_column: this.$route.query.sort_column|| this.defaultSortColumn,
              sort_direction: this.$route.query.sort_direction || this.defaultSortDirection
            },
        }
    },
    created() {
          this.store = `/api/users/products/${this.$route.params.id}/update`
          this.method = 'POST'
  },
  beforeRouteUpdate (to, from, next) {
        this.show = false
        get(`/api/users/products`)
            .then(res => {
                this.setData(res)
                next()
            })
            //catch 422
    },
    beforeRouteEnter(to, from, next) {
        get(`/api/users/products`)
            .then(res => {
                next(vm => vm.setData(res))
            })
            // catch 422
    },
    computed: {
    },
  props: {
    widgetClasses: String,
  },
  totalVuePackages:{
      type: [String, Number, Array]
    },
  methods: {
    setData(res) {
      this.model = res.data.results;
      this.categories = res.data.categories
      this.size = res.data.size
      this.color = res.data.color
      this.brand = res.data.brand
      console.log(res.data);
    },
    updatePerPage() {
      const query = copyObject(this.$route.query)
      
      query.per_page = this.params.per_page
      query.page = 1

      get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}&q=${this.params.q}`)
      .then(res => {
          this.setData(res)
      })
    },
    orderPerPage(){
        get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
        &q=${this.params.q}&order_by=${this.params.order_by}`)
        .then(res => {
            this.setData(res)
        })
    },
    nextPage() {
        if(this.model.next_page_url) {
            this.params.page = this.params.page ? this.params.page + 1 : 2
            get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
            &q=${this.params.q}&order_by=${this.params.order_by}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    prevPage() {
        if(this.model.prev_page_url) {
            this.params.page = this.params.page ? Number(this.params.page) - 1 : 1
            get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
            &q=${this.params.q}&order_by=${this.params.order_by}`)
            .then(res => {
                this.setData(res)
            })
        }
    },
    catFilter(id){
        this.params.cat = id;
        get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
        &q=${this.params.q}&order_by=${this.params.order_by}&cat=${this.params.cat}`)
        .then(res => {
            this.setData(res)
        })
    },
    sizeFilter(id){
        this.params.size_id = id;
        get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
        &q=${this.params.q}&order_by=${this.params.order_by}&cat=${this.params.cat}&size=${this.params.size_id}
        &brand=${this.params.brand_id}&color=${this.params.color_id}`)
        .then(res => {
            this.setData(res)
        })
    },
    brandFilter(id){
        this.params.brand_id = id;
        get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
        &q=${this.params.q}&order_by=${this.params.order_by}&cat=${this.params.cat}&size=${this.params.size_id}
        &brand=${this.params.brand_id}&color=${this.params.color_id}`)
        .then(res => {
            this.setData(res)
        })
    },
    colorFilter(id){
        this.params.color_id = id;
        get(`/api/users/products?per_page=${this.params.per_page}&page=${this.params.page}
        &q=${this.params.q}&order_by=${this.params.order_by}&cat=${this.params.cat}&size=${this.params.size_id}
        &brand=${this.params.brand_id}&color=${this.params.color_id}`)
        .then(res => {
            this.setData(res)
        })
    }
},
  setup() {
    const toast = useToast();
    return { toast }
  },
});
</script>
<style>
.border{
    border:2px solid; 
}
.select-box select, .select-menu select {
    max-width: 100% !important;
}
.select-box:before, .select-menu:before {
    top:66% !important;
}
.filterclass{
    font-size: 20px;
    font-weight: 600;
    color: #336699 !important;
}
</style>
