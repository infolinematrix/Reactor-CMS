<template>

    <div>

        <v-layout align-center justify-center row fill-height>

            <v-flex d-flex xs12 sm6 md4>
                <v-card color="transparent" flat>
                    <v-container fluid grid-list-lg>

                        <form @submit.prevent="login" @keydown="form.onKeydown($event)">

                            <v-card-title primary-title >
                                <div  class="text-md-center">
                                    <h3 class="headline mb-0">Login</h3>
                                    <div>Located two hours south of Sydney in the <br>Southern Highlands of New South Wales, ...</div>
                                </div>
                            </v-card-title>

                            <v-card-text>
                                <v-text-field
                                    name="email"
                                    label="Email"
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    required></v-text-field>
                                <v-text-field
                                        name="password"
                                        label="Password"
                                        id="password"
                                        type="password"
                                        v-model="form.password"
                                        required />
                                <v-checkbox
                                        name="remember"
                                        v-model="remember"
                                        label="Remember me?"
                                        required
                                ></v-checkbox>
                            </v-card-text>

                            <v-card-actions>
                                <!-- Submit Button -->
                                <v-btn large primary @click.native= login()>
                                    Login
                                </v-btn>

                                <v-btn large primary :to="{ name: 'register' }" >
                                    Register
                                </v-btn>
                            </v-card-actions>

                            <v-card-actions>
                                <router-link :to="{ name: 'password.request' }" >
                                    {{ $t('forgot_password') }}
                                </router-link>
                            </v-card-actions>

                        </form>

                    </v-container>
                </v-card>
            </v-flex>

        </v-layout>

    </div>

</template>

<script>
    import Form from 'vform'

    export default {

        layout: 'simple',

        head () {
            return {title: this.$t('login')}
        },

        data: () => ({
        form: new Form({
            email: 'admin@admin.com',
            password: 'matrix0404'
        }),
        remember: false
    })
    ,

    methods: {
        async
        login()
        {
            // Submit the form.
            const {data} = await this.form.post('/api/login')

            // Save the token.
            this.$store.dispatch('auth/saveToken', {
                token: data.token,
                remember: this.remember
            })

            // Fetch the user.
            await this.$store.dispatch('auth/fetchUser')

            // Redirect home.
            this.$router.push({name: 'home'})
        }
    }
    }
</script>
