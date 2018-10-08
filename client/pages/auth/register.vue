<template>

    <v-container fluid grid-list-lg>
        <v-layout align-center justify-center row fill-height>
        <v-flex d-flex xs12 sm6 md6>
            <v-card flat>

                    <form @submit.prevent="register" @keydown="form.onKeydown($event)">

                        <v-card-title primary-title >
                            <h3 class="title mb-0">Register</h3></br>
                            <div class="font-weight-light">Located two hours south of Sydney in the Southern Highlands of New South Wales, ...</div>
                        </v-card-title>

                        <v-card-text>
                            <v-layout row wrap>
                                <v-flex d-flex xs12 md6>
                                    <v-text-field
                                            name="first_name"
                                            label="First Name"
                                            id="first_name"
                                            type="text"
                                            v-model="form.first_name"
                                            required></v-text-field>
                                </v-flex>
                                <v-flex d-flex xs12 md6>
                                    <v-text-field
                                            name="last_name"
                                            label="Last Name"
                                            id="last_name"
                                            type="text"
                                            v-model="form.last_name"
                                            required />
                                </v-flex>

                                <v-flex xs12 sm12 md12>
                                    <v-text-field
                                            name="email"
                                            label="Email"
                                            id="email"
                                            type="email"
                                            required></v-text-field>
                                </v-flex>


                                <v-flex d-flex xs6 md6>
                                    <v-text-field
                                            name="password"
                                            label="Password"
                                            id="password"
                                            type="password"
                                            required></v-text-field>
                                </v-flex>
                                <v-flex d-flex xs6 md6>
                                    <v-text-field
                                            name="confirm_password"
                                            label="Confirm Password"
                                            id="confirm_password"
                                            type="password"
                                            required></v-text-field>
                                </v-flex>

                                <v-flex d-flex>
                                    <v-checkbox v-model="agree" label="I agree with terms &amp; conditions." value="1"></v-checkbox>
                                </v-flex>
                            </v-layout>

                        </v-card-text>

                        <v-card-actions>
                            <!-- Submit Button -->
                            <v-btn large primary >
                                Submit
                            </v-btn>
                        </v-card-actions>

                    </form>

            </v-card>
        </v-flex>
    </v-layout>
    </v-container>

</template>

<script>
    import Form from 'vform'

    export default {
        head () {
            return {title: this.$t('register')}
        },

        data: () => ({
        form: new Form({
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        }),
        agree: "1"
    })
    ,

    methods: {
        async
        register()
        {
            // Register the user.
            const {data} = await this.form.post('/register')

            // Log in the user.
            const {data: {token}} = await this.form.post('/login')

            // Save the token.
            this.$store.dispatch('auth/saveToken', {token})

            // Update the user.
            await this.$store.dispatch('auth/updateUser', {user: data})

            // Redirect home.
            this.$router.push({name: 'home'})
        }
    }
    }
</script>
