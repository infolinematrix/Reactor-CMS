<template>

        <v-layout align-center justify-center row fill-height>
            <v-flex d-flex xs12 sm6 md6>
                <v-card  flat>
                    <v-container fluid grid-list-lg>

                        <form @submit.prevent="login" @keydown="form.onKeydown($event)">

                            <v-card-title primary-title >
                                    <h3 class="title mb-0">Profile</h3></br>
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

                                    <v-flex xs6 sm6 md6>
                                        <v-select
                                                name="gender"
                                                id="gender"
                                                v-model="form.gender"
                                                :items="['Male', 'Female']"
                                                label="Gender"
                                        ></v-select>
                                    </v-flex>
                                    <v-flex xs6 sm6 md6>
                                        <v-menu
                                                ref="menu"
                                                :close-on-content-click="false"
                                                v-model="menu"
                                                :nudge-right="40"
                                                lazy
                                                transition="scale-transition"
                                                offset-y
                                                full-width
                                                min-width="290px"
                                        >
                                            <v-text-field
                                                    slot="activator"
                                                    v-model="form.dob"
                                                    label="Birthday date"
                                                    readonly
                                            ></v-text-field>
                                            <v-date-picker
                                                    ref="picker"
                                                    v-model="date"
                                                    min="1945-01-01"
                                                    @change="save"
                                            ></v-date-picker>
                                        </v-menu>
                                    </v-flex>

                                    <v-flex d-flex xs6 md6>
                                        <v-select
                                                v-model="form.country"
                                                name="country"
                                                id="country"
                                                :items="country"
                                                item-text="name"
                                                item-value="name"
                                                label="Country"
                                                return-object
                                                single-line
                                        ></v-select>
                                    </v-flex>
                                    <v-flex d-flex xs6 md6>
                                        <v-text-field
                                                name="phone"
                                                label="Contact"
                                                id="phone"
                                                type="text"
                                                v-model="form.phone"
                                                required></v-text-field>
                                    </v-flex>

                                    <v-flex d-flex xs8 md8>
                                        <v-text-field
                                                name="city"
                                                label="City, Region"
                                                id="city"
                                                type="text"
                                                v-model="form.city"
                                                required></v-text-field>
                                    </v-flex>
                                    <v-flex d-flex xs4 sm md4>
                                        <v-text-field
                                                name="pincode"
                                                label="Pin code"
                                                id="pincode"
                                                type="text"
                                                v-model="form.pincode"
                                                required></v-text-field>
                                    </v-flex>

                                    <v-flex xs6 sm6 md6>
                                        <v-select
                                                name="type"
                                                id="type"
                                                v-model="form.type"
                                                :items="['Yes, I play', 'Not play']"
                                                label="Play Harmonica?"
                                        ></v-select>
                                    </v-flex>
                                    <v-flex d-flex xs6 md6>
                                        <v-select
                                                name="profession"
                                                id="profession"
                                                v-model="form.gender"
                                                :items="['Male', 'Female']"
                                                label="Profession"
                                        ></v-select>
                                    </v-flex>

                                </v-layout>

                            </v-card-text>

                            <v-card-actions>
                                <!-- Submit Button -->

                                <v-btn
                                        large
                                        primary
                                        @click.native= ''
                                >

                                    Register
                                    <v-icon right dark>cloud_upload</v-icon>
                                </v-btn>

                            </v-card-actions>

                        </form>

                    </v-container>
                </v-card>
            </v-flex>
        </v-layout>

</template>

<script>
    import Form from 'vform'
    import {mapGetters} from 'vuex'
    import countrycode from '@/assets/json/CountryCodes.json'

    export default {
        //scrollToTop: false,

        head () {
            return {title: this.$t('settings')}
        },

        data: () => ({
        form: new Form({
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            gender: '',
            dob: '',
            country: '',
            city: '',
            pincode: '',
        }),
        date: null,
        menu: false,
        country: countrycode,
    }),

    watch: {
        menu (val) {
            val && this.$nextTick(() => (this.$refs.picker.activePicker = 'YEAR'))
        }
    },

    computed: mapGetters({
        user: 'auth/user'
    }),
            created()
    {
        // Fill the form with user data.
        this.form.keys().forEach(key => {
            this.form[key] = this.user[key]
    })
    }
    ,

    methods: {
        async
        update()
        {
            const {data} = await this.form.patch('/api/settings/profile')
            this.$store.dispatch('auth/updateUser', {user: data})
        },
        save (date) {
            this.$refs.menu.save(date)
        }
    }
    }
</script>
