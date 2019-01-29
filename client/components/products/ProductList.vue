<template>

    <nuxt-link :to="{name: 'product-single', params: { slug:item.slug } }" class="item">
        <div class="img-responsive">
            <img :src="item.img" alt="">
        </div>
        <div class="body">
            <span class="title ">{{ item.name }}</span>
        </div>
    </nuxt-link>


</template>

<script>
    export default {
        props: {
            item: {
                type: Object,
                required: true
            },
            index: {
                type: Number,
                required: true
            }
        },
        filters: {
            usdollar: function (value) {
                return `$${value}`;
            }
        },
        methods: {
            addItem() {
                this.$store.commit('addItem', this.item);
            }
        }
    };
</script>


