<template>
    <div class="home">
        <v-card>
            <!-- <v-card-title> -->
                <!-- <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details> -->
                <!-- </v-text-field> -->
            <!-- </v-card-title> -->
            <!-- <v-data-table :headers="headers" :items="desserts" :search="search"></v-data-table> -->
        </v-card>
    </div>
</template>

<script>
export default {
    mounted() {
        this.getClients();
    },

    methods: {
        getClients() {
            this.clients = [];

            this.axios
                .get('/api/clients')
                .then(({ data }) => {
                    console.log('data :>> ', data);
                    // this.clients = data;
                })
                .catch(({message}) => {
                    console.log('error :>> ', message);
                });
        },
    }
}
</script>