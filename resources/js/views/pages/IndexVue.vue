<template>
    <div>
        <!-- JUMBO -->

        <div class="backgroundImg d-flex flex-column">
            <div
                class="d-flex align-items-center justify-content-center flex-grow-1"
            >
                <div class="">
                    <div>
                        <input
                            type="text"
                            v-model="address"
                            placeholder="Search by Address"
                        />
                        <input
                            type="number"
                            v-model="price"
                            placeholder="Max price"
                        />
                        <input
                            type="number"
                            v-model="rooms"
                            placeholder="Min number of rooms"
                        />
                        <input
                            type="number"
                            v-model="baths"
                            placeholder="Min number of baths"
                        />
                        <input
                            type="number"
                            v-model="beds"
                            placeholder="Min number of beds"
                        />
                        <button @click="searchApartments">Search</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="background2">
            <div class="container p-5 d-flex flex-wrap grid gap-3">
                <div class="card-deck">
                    <!-- index -->
                    <div
                        v-if="filter.length == 0"
                        v-for="apartment in apartments"
                        :key="apartment.id"
                        class="card border border-5 borderpurple"
                        style="width: 18rem"
                    >
                        <img
                            :src="
                                require(`../../../../public/storage/${apartment.cover}`)
                            "
                            class="card-img-top"
                            :alt="apartment.name"
                        />

                        <div class="card-body">
                            <h5 class="card-title">{{ apartment.name }}</h5>
                            <p class="card-text">{{ apartment.description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Prezzo: {{ apartment.price }} €
                                </li>
                                <li class="list-group-item">
                                    N° Stanze: {{ apartment.rooms }}
                                </li>
                                <li class="list-group-item">
                                    N° Bagni: {{ apartment.baths }}
                                </li>
                                <li class="list-group-item">
                                    Posti letto: {{ apartment.beds }}
                                </li>
                            </ul>
                            <a
                                :href="'/apartments/' + apartment.id"
                                class="btn btn-primary my-2"
                                >Details</a
                            >
                        </div>
                    </div>

                    <!-- filtrati :key="apartment.id"-->
                    <div
                        v-else
                        v-for="apartment in filter"

                        class="card border border-5 borderpurple"
                        style="width: 18rem"
                    >
                        <img
                            :src="
                                require(`../../../../public/storage/${apartment.cover}`)
                            "
                            class="card-img-top"
                            :alt="apartment.name"
                        />
                        <div class="card-body">
                            <h5 class="card-title">{{ apartment.name }}</h5>
                            <p class="card-text">{{ apartment.description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Prezzo: {{ apartment.price }} €
                                </li>
                                <li class="list-group-item">
                                    N° Stanze: {{ apartment.rooms }}
                                </li>
                                <li class="list-group-item">
                                    N° Bagni: {{ apartment.baths }}
                                </li>
                                <li class="list-group-item">
                                    Posti letto: {{ apartment.beds }}
                                </li>
                            </ul>
                            <a
                                :href="'/apartments/' + apartment.id"
                                class="btn btn-primary my-2"
                                >Details</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "IndexVue",
    props: {
        apartments: Array,
    },
    data() {
        return {
            address: "",
            price: "",
            rooms: "",
            baths: "",
            beds: "",
            filter: [],
        };
    },
    methods: {
        // filtro
        searchApartments() {
            // se i parametri di ricerca sono vuoti
            if(this.address == "" && this.price == "" && this.rooms == "" && this.baths == "" && this.beds ==""){
                // svuota l'array filtrato
                this.filter = []
            }
            // invece se
            else{
                // controlla i parametri e setta su null per evitare problemi
                if(this.address == ""){
                this.address = null
                }
                if(this.price == ""){
                    this.price = null
                }
                if(this.rooms == ""){
                    this.rooms = null
                }
                if(this.baths == ""){
                    this.baths = null
                }
                if(this.beds == ""){
                    this.beds = null
                }
                // procedi con axios
                axios
                // chiamata api al controller del filtro
                .get("http://127.0.0.1:8000/api/filtered", {
                    // parametri da filtrare
                    params: {
                        address: this.address,
                        cover: this.cover,
                        price: this.price,
                        rooms: this.rooms,
                        baths: this.baths,
                        beds: this.beds,
                    },
                })
                .then((response) => {
                    this.filter = response.data
                    console.log(response.data)
                })
                .catch((error) => {
                    console.error(error.response.data);
                });
                // se la ricerca non trova nulla
                if(this.filter.length == 0){
                    // svuota il filtro
                        // si puó aggingere una funzione per mandare un pop-up
                    this.filter = []
                }

            }
        },
    },
};
</script>

<style lang="scss" scoped>
.backgroundImg {
    border-bottom: 5px solid #6f42c1;
    background-image: url("../../../../public/img/jumbo.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 80vh;
}
.containerCustom {
    margin: auto;
    width: 80%;
}
.purple {
    color: var(--bs-purple);
    border-color: var(--bs-purple);
}
.filtri-section {
    width: 100%;
    height: 60px;
    background-color: #6f42c1;
}
</style>
