<template>
    <v-app>

        <navbar/>

        <v-content>

                <nuxt />
        </v-content>

    </v-app>
</template>

<script>
    import Navbar from '~/components/Navbar'

    export default {
        components: {
            Navbar
        }
    }
</script>
