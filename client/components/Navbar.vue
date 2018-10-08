<template>

  <div>
    <v-navigation-drawer
            :mini-variant.sync="miniVariant"
            :clipped="clipped"
            v-model="drawer"
            fixed
            app
    >
      <v-list>
        <v-list-tile
                router
                :to="item.to"
                :key="i"
                v-for="(item, i) in items"
                exact
        >
          <v-list-tile-action>
            <v-icon v-html="item.icon"></v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title v-text="item.title"></v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>

    <v-toolbar  fixed app flat  dark color="primary"  :clipped-left="clipped">
      <v-toolbar-side-icon  @click="drawer = !drawer">
        <img src="@/static/harmonica_imp.png" height="30px" />
      </v-toolbar-side-icon>

      <v-toolbar-title class="white--text">
          <router-link class="white--text" :to="{ name: user ? 'home' : 'welcome' }">
            {{ appName }}
          </router-link>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <router-link class="white--text" :to="{ name: 'settings.profile' }">
          <v-icon>apps</v-icon>
        </router-link>
      </v-btn>

      <v-btn icon>
        <a @click.prevent="logout" href="#" class="white--text">
          <v-icon>lock</v-icon>
        </a>
      </v-btn>

      <v-btn icon class="white--text">
        <v-icon>more_vert</v-icon>
      </v-btn>

    </v-toolbar>
  </div>


</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  data: () => ({
    appName: process.env.appName,
    clipped: false,
    drawer: false,
    fixed: false,
    items: [
      { icon: 'apps', title: 'Welcome', to: '/' },
      { icon: 'bubble_chart', title: 'Inspire', to: '/inspire' }
    ],
    miniVariant: false,
    right: true,
    rightDrawer: false,
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  components: {
    LocaleDropdown
  },

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
