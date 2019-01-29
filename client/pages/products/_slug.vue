<template>
    <v-container>
        <v-layout row>
            <v-flex xs12 sm6 offset-sm3>
                <v-card>
                    <div class="loading" v-if="loading">
                        Loading...
                    </div>
                    <v-carousel hide-delimiters>

                        <v-carousel-item
                                v-for="(item,i) in images"
                                :key="i"
                                :src="item"
                                class="img-responsive"
                        ></v-carousel-item>
                    </v-carousel>
                    <v-card-actions class="mt-2">
                        <v-chip class="body-2 font-weight-bold" color="tild" text-color="black">
                            <v-avatar>
                                Rs
                            </v-avatar>
                            {{ product.price }}
                        </v-chip>
                        <v-spacer></v-spacer>
                        <v-btn flat color="grey--text">Share..</v-btn>

                        <v-btn icon @click="show = !show">
                            <v-icon>share</v-icon>
                        </v-btn>
                    </v-card-actions>


                    <v-card-title primary-title>
                        <v-flex xs11>
                            <h1 class="subheading font-weight-black">{{ product.title }}</h1>
                        </v-flex>
                        <v-flex xs1>
                            <v-menu
                                    transition="slide-x-transition"
                                    bottom
                                    left
                            >
                                <v-btn
                                        slot="activator"
                                        icon
                                >
                                    <v-icon>more_vert</v-icon>
                                </v-btn>

                                <v-list>
                                    <v-list-tile
                                            v-for="(item, i) in menu"
                                            :key="i"
                                            @click=""
                                    >
                                        <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                                    </v-list-tile>
                                </v-list>
                            </v-menu>
                        </v-flex>
                        <div class="grey--text   mt-2">
                            {{ product.description }}
                        </div>

                    </v-card-title>

                    <v-card-text>
                        <div class="text-xs-center">
                            <v-btn block color="error" dark large>Check Availibility</v-btn>

                        </div>
                    </v-card-text>

                    <v-card-text>
                        <div class="grey--text">
                            <div class="black--text">Specifications</div>
                            Subha Sundar Das
                        </div>
                    </v-card-text>

                    <v-slide-y-transition>
                        <v-card-text v-show="show">
                            <v-card-title>
                                <div>
                                    <span class="grey--text">Number 10</span><br>
                                    <span>Whitehaven Beach</span><br>
                                    <span>I'm a thing. But, like most politicians, he promised more than he could deliver. You won't have time for sleeping, soldier, not with all the bed making you'll be doing. Then we'll go with that data file! Hey, you add a one and two zeros to that or we walk! You're going to do his laundry? I've got to find a way to escape.</span>
                                </div>
                            </v-card-title>

                        </v-card-text>
                    </v-slide-y-transition>

                </v-card>
            </v-flex>
        </v-layout>


    </v-container>
</template>

<script>
    import axios from 'axios'
    export default {
        layout: 'default',

        head () {
            return {title: this.$t('home')}
        },
        data () {
            return {
                loading: true,
                backArrow: true,
                show: false,
                product: '',
                images: '',
                items: [
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg'
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg'
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg'
                    },
                    {
                        src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg'
                    }
                ],
                menu: [
                    {title: 'Click Me'},
                    {title: 'Click Me'},
                    {title: 'Click Me'},
                    {title: 'Click Me 2'}
                ],
                text: 'Can you believe there is another great reason to grow figs? Click here to learn some of the health benefits fig leaves offer. Try fig leaf tea!',
                //title: 'Your headline is in Ubuntu',
            }
        },


        /*asyncData ({params, error}) {

         let product = axios.get('http://localhost:8080/api/product/${params.slug}')
         console.log(product.data)
         return {
         product: product.data
         }
         }*/

        created(){
            this.fetchProduct(this.$route.params.slug)
        },

        methods: {
            fetchProduct (slug) {

                let api = "http://localhost:8080/api/product/" + slug
                axios.get(api).then(response = > {
                    this.product = response.data
                this.images = response.data.images
                this.loading = false
            })

            }
        }


    }
</script>