<template>

    <div>
        <v-tabs
                centered
                color="blue"
                dark
                slider-color="purple lighten-3"
                icons-and-text
        >
            <v-tabs-slider color="yellow"></v-tabs-slider>

            <v-tab href="#tab-1">
                Video
                <v-icon>movie</v-icon>
            </v-tab>

            <v-tab href="#tab-2">
                Discuss
                <v-icon>comment</v-icon>
            </v-tab>

            <v-tab href="#tab-3">
                Events
                <v-icon>event_available</v-icon>
            </v-tab>
            <v-tab href="#tab-4">
                Tutorial
                <v-icon>live_help</v-icon>
            </v-tab>
            <v-tab href="#tab-5">
                Donation
                <v-icon>live_help</v-icon>
            </v-tab>


            <v-tab-item
                    v-for="i in 5"
                    :id="'tab-' + i"
                    :key="i"
            >
                <v-card flat>
                    <v-card-text>{{ text }}</v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs>



    </div>

</template>

<script>
    export default {
        middleware: 'auth',

        head () {
            return {title: this.$t('home')}
        },

        data: () => ({
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
        })
    }
</script>
