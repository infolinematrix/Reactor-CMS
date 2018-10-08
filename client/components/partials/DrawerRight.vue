<template>
    <v-navigation-drawer
            temporary
            :right="right"
            v-model="rightDrawer"
            fixed
    >
        <v-list>
            <v-list-tile @click.native="right = !right">
                <v-list-tile-action>
                    <v-icon light>compare_arrows</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>Switch drawer (click me)</v-list-tile-title>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>

<script>

    export default {

        components: {
            DrawerRight
        },

        data () {
            return {
                drawer: false,
                items: [
                    { icon: 'apps', title: 'Welcome', to: '/' },
                    { icon: 'bubble_chart', title: 'Inspire', to: '/inspire' }
                ],
                miniVariant: false,
                right: true,
                rightDrawer: false,
                title: 'Vuetify.js'
            }
        }
    }
</script>