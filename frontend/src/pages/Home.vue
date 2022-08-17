<template>
    <v-form>
        <v-container>
            <v-row>
                <v-col sm="6">
                    <v-text-field v-model="formData.phone" label="Phone" outlined></v-text-field>
                    <v-text-field v-model="formData.first_name" label="First Name" outlined></v-text-field>
                    <v-text-field v-model="formData.last_name" label="Last Name" outlined></v-text-field>
                    <v-text-field v-model="formData.email" label="Email" outlined></v-text-field>
                </v-col>
                <v-col sm="6">
                    <v-text-field v-model="formData.address" label="Address" outlined></v-text-field>
                    <v-text-field v-model="formData.area" label="Area" outlined></v-text-field>
                    <v-select v-model="formData.rooms" :items="rooms" label="Rooms" outlined></v-select>
                    <v-select v-model="formData.bathrooms" :items="bathrooms" label="Bathrooms" outlined></v-select>
                    <v-select v-model="formData.kitchens" :items="kitchens" label="Kitchens" outlined></v-select>
                    <v-text-field v-model="formData.fridges" label="Fridges" outlined></v-text-field>
                    <v-text-field v-model="formData.wardrobes" label="Wardrobes" outlined></v-text-field>
                    <v-text-field v-model="formData.animals" label="Animals" outlined></v-text-field>
                    <v-text-field v-model="formData.adults" label="Adults" outlined></v-text-field>
                    <v-text-field v-model="formData.children" label="Children" outlined></v-text-field>
                    <div class="d-flex justify-content-center">
                        <v-btn depressed color="primary" @click="saveClient">Confirm</v-btn>
                    </div>
                </v-col>
            </v-row>
        </v-container>
    </v-form>
</template>

<script>
export default {
    data() {
        return {
            rooms: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            bathrooms: ['0,5', '1', '1,5'],
            kitchens: ['1', '2', '3'],
            formData: {
                phone: '',
                first_name: '',
                last_name: '',
                email: '',
                address: '',
                area: '',
                rooms: '0',
                bathrooms: '0',
                kitchens: '0',
                fridges: '',
                wardrobes: '',
                animals: '',
                adults: '',
                children: '',
            },
        }
    },
    methods: {
        saveClient() {
            this.axios
                .post('/api/clients', this.formData)
                .then(({ data }) => {
                    console.log('data :>> ', data);
                })
                .catch(({ message }) => {
                    console.log('error :>> ', message);
                });
        }
    }
}
</script>