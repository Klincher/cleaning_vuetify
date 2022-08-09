<template>
    <div>
        <v-form>
            <v-container class="col-3">
                <v-text-field v-model="formData.phone" label="Phone" outlined></v-text-field>
                <v-text-field v-model="formData.first_name" label="First Name" outlined></v-text-field>
                <v-text-field v-model="formData.last_name" label="Last Name" outlined></v-text-field>
                <v-text-field v-model="formData.email" label="Email" outlined></v-text-field>
                <v-btn text small color="primary" @click="saveClient">Vuetify hueta</v-btn>
            </v-container>
        </v-form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                phone: '',
                first_name: '',
                last_name: '',
                email: '',
            },
        }
    },
    methods: {
        saveClient() {
            this.axios
                .post('/api/clients', this.formData)
                .then(({ data }) => {
                    console.log('data :>> ', data);
                    // this.clients = data;
                })
                .catch(({ message }) => {
                    console.log('error :>> ', message);
                });
        }
    }
}
</script>