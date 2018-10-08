<template>
    <div>

        <v-toolbar flat>
            <v-toolbar-side-icon></v-toolbar-side-icon>
            <v-toolbar-title>
                <template v-if="authenticated">
                    <router-link :to="{ name: 'home' }">
                        {{ $t('home') }}
                    </router-link>
                </template>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">


                <v-btn flat>
                    <router-link :to="{ name: 'login' }">
                        {{ $t('login') }}
                    </router-link>
                </v-btn>

                <v-btn flat>
                    <router-link :to="{ name: 'register' }">
                        {{ $t('register') }}
                    </router-link>
                </v-btn>
                <v-btn flat>Link Three</v-btn>
            </v-toolbar-items>
        </v-toolbar>


        <div class="row">
            <div class="col-md-6">sdsdfgfd</div>
            <div class="col-md-6">asd</div>
        </div>

        <div class="text-center mt-5">
            <div class="title mb-4">
                {{ title }}
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        layout: 'simple',


        head () {
            return {title: this.$t('home')}
        },

        computed: mapGetters({
            authenticated: 'auth/check'
        }),

        data: () => ({
        title: process.env.appName
    })
    }
</script>

<style scoped>
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .title {
        font-size: 85px;
    }
</style>
