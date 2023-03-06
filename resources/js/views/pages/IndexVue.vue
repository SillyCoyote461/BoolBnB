<template>
    <div>
        <!-- JUMBO -->

        <div class="backgroundImg d-flex flex-column">
            <div class="d-flex align-items-center justify-content-center flex-grow-1">
                <div class="contenitore-input container">
                    <div>

                        <div class="pb-3">
                            <label class="purple fs-5">Cerca un luogo</label>
                            <div id="searchbox" ref="searchbox"></div>
                        </div>



                        <div class="d-flex flex-wrap justify-content-center">
                            <div>
                                <label class="d-block label-email text-center purple">Max price</label>
                                <input type="number" v-model="price" placeholder="" />
                            </div>

                            <div class="px-3">
                                <label class="d-block label-email text-center purple">Min number of rooms</label>
                                <input type="number" v-model="rooms" placeholder="" />
                            </div>

                            <div class="px-3">
                                <label class="d-block label-email text-center purple">Min number of beds</label>
                                <input type="number" v-model="beds" placeholder="" />
                            </div>

                            <!--  -->
                            <!-- prova longitudine -->
                            <!--  -->

                            <div class="px-3">
                                <label class="d-block label-email text-center purple">Range di ricerca in Km</label>
                                <input type="number" v-model="range" placeholder="" />
                            </div>

                            <br/>


                            <!-- <button @click="longitudeTest">Search</button> -->
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <button @click="searchApartments" class="bottonefigo mt-2"> Search   <i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="background2">
            <div class="container p-5 d-flex flex-wrap  grid gap-3">
                <!-- <div class="card-deck"> -->

                <div class="card-app" v-if="apartments.length != 0" v-for="apartment in apartments" :key="apartment.id">

                    <div class="immagine-contenitore">
                        <img :src="require(`../../../../public/storage/${apartment.cover}`)" class="immagine" :alt="apartment.name">
                    </div>
                    <div class="contenuto">
                        <div class="titolo">
                            {{ apartment.name }}
                        </div>
                        <div>
                            <div class="sottotitolo">
                                {{ apartment.address }}
                            </div>
                            <div class="fw-bold purple fs-5">
                                {{ apartment.price }} €
                            </div>
                            <div>
                                <a :href="'/apartments/' + apartment.id">
                                    <button class="bottonefigo mt-2">Visita</button>
                                </a>

                            </div>
                        </div>

                    </div>

                    <div v-if="apartments.length == 0" class=" borderpurple" style="width: 18rem">

                        <h3>Non abbiamo trovato nulla</h3>
                    </div>

                </div>





                <!--     loop cards
                    <div v-if="apartments.length != 0"
                        v-for="apartment in apartments"
                        :key="apartment.id"
                        class="card border border-5 borderpurple"
                        style="width: 18rem">
                        immagine
                        <img :src="require(`../../../../public/storage/${apartment.cover}`)"
                            class="card-img-top"
                            :alt="apartment.name"/>

                        <div class="card-body">
                            <h5 class="card-title">{{ apartment.name }}</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Luogo: {{ apartment.name }}
                                </li>
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
                            <a :href="'/apartments/' + apartment.id"
                                class="btn btn-primary my-2">Details</a>
                        </div>
                    </div>
                    se non trovato nulla
                    <div v-if="apartments.length == 0"
                        class="card border border-5 borderpurple"
                        style="width: 18rem">

                        <h1>Non abbiamo trovato nulla</h1>
                    </div>
                </div> -->





            </div>
        </div>
    </div>
</template>

<script>
import { services } from '@tomtom-international/web-sdk-services';
import SearchBox from '@tomtom-international/web-sdk-plugin-searchbox';
export default {
    name: "IndexVue",
    data() {
        return {

            apartments: [],
            services: [],
            address: "",
            price: "",
            rooms: "",
            baths: "",
            beds: "",
            filter: [],
            // test
            range: "",
            lat: "",
            lng: "",

            // bool variables
            adressX: false,
            priceX: false,
            roomsX: false,
            bathsX: false,
            bedX: false,
            rangeX: false,


        };
    },
    methods: {
        // filtro
        searchApartments() {

            // invece se

            // controlla i parametri e setta su null per evitare problemi
            if (this.address == "") {
                this.address = null
                this.adressX = true
            }

            if (this.price == "") {
                this.price = null
                this.priceX = true
            }

            if (this.rooms == "") {
                this.rooms = null
                this.roomsX = true
            }

            if (this.baths == "") {
                this.baths = null
                this.bathsX = true
            }

            if (this.beds == "") {
                this.beds = null
                this.bedsX = true
            }
            // validazioni range
            if (this.range == "") {
                this.range = null
                this.rangeX = true
            }
            else if (this.range < 0) {
                this.range = this.range * (-1)
            }

            // procedi con axios
            axios
                // chiamata api al controller del filtro
                .get("http://127.0.0.1:8000/api/filtered", {
                    // parametri da filtrare
                    params: {
                        address: this.address,
                        price: this.price,
                        rooms: this.rooms,
                        baths: this.baths,
                        beds: this.beds,
                        lon: this.lng,
                        lat: this.lat,
                        range: this.range,
                    },
                })
                .then((response) => {
                    this.apartments = response.data
                })
                .catch((error) => {
                    console.error(error.response.data);
                });


            // se la ricerca non trova nulla

            // validazioni pt.2
            if (this.addressX == true) {
                this.adressX = false
                this.address = ""
            }
            if (this.priceX == true) {
                this.priceX = false
                this.price = ""
            }
            if (this.roomsX == true) {
                this.roomsX = false
                this.rooms = ""
            }
            if (this.bathsX == true) {
                this.bathsX = false
                this.baths = ""
            }
            if (this.bedsX == true) {
                this.bedsX = false
                this.beds = ""
            }
            if (this.rangeX == true) {
                this.rangeX = false
                this.range = ""
            }


        },
        // appartamenti e servizi
        getApartments() {
            axios.get('http://127.0.0.1:8000/api/apartments')
                .then(res => {
                    this.apartments = res.data.apartments;
                    this.services = res.data.services;
                })
        },
        handleResultSelection(event) {
            this.lat = event.data.result.position.lat
            this.lng = event.data.result.position.lng
            return
        }
    },
    created() {
        this.getApartments();
    },
    mounted() {

    },
    mounted() {
        // searchbar
        const options = {
            searchOptions: {
                key: 'bCA9waVZD04StnT2jWnglVMqwjHK75ve',
                language: 'it-IT'
            },
            autocompleteOptions: {
                debounceTime: 200
            },
            position: 'topright'
        };
        const ttSearchBox = new SearchBox(services, options);
        const searchBoxHTML = ttSearchBox.getSearchBoxHTML();
        document.getElementById('searchbox').appendChild(searchBoxHTML);
        ttSearchBox.on("tomtom.searchbox.resultselected", this.handleResultSelection)

    }
};
</script>

<style lang="scss" scoped>
.card-app {
    width: 280px;
    height: 425px;
    border: 1px solid #6f42c1;
    border-radius: 8px;
}

.immagine-contenitore {
    width: 260px;
    height: 230px;
    background-color: gray;
    border-radius: 6px;
    margin: auto;
    margin-top: 10px;
}

.immagine {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 6px;
}

.contenuto {
    padding: 10px;
}

.titolo {
    font-weight: bold;
    font-size: 22px;
}

.sottotitolo {
    color: gray;
}

.contenitore2 {
    display: flex;
    justify-content: space-between;
}



input {
    border: 0px;
    border-bottom: 1px solid grey;
    color: #6f42c1;
    font-weight: bold;
}

.backgroundImg {
    border-bottom: 5px solid #6f42c1;
    background-image:
        linear-gradient(to top, rgba(255, 255, 255, 0.30), rgb(255, 255, 255)), url('../../../../public/img/bnbbed.webp');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 70vh;
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
