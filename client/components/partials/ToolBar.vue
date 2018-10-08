<template>

    <div>
    HELLOWE S

    </div>

</template>



<script>
    import { mapGetters } from 'vuex'
    import LocaleDropdown from './LocaleDropdown'

    export default {
        data: () => ({
        appName: process.env.appName
    }),

    computed: mapGetters({
        user: 'auth/user'
    }),

    methods: {
        async logout () {
            // Log out the user.
            await this.$store.dispatch('auth/logout')

            // Redirect to login.
            this.$router.push({ name: 'login' })
        }
    }
    }
</script>