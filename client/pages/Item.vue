<template>
    <div class="masonry">
        <div v-for="(item, index) in forSale">
            <div class="item">
                <div class="img-responsive">
                    <img :src="image" :alt="name">
                </div>
                <div class="body">
                    <h2 class="title">{{ name }}</h2>
                    <div>Rs. {{ price }}</div>
                </div>
                <div class="row justify-content-end">
                    <button class="btn btn-primary">Add to cart</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'item',
        props: ['invId', 'name', 'image', 'price'],
    };
</script>