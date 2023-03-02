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
                            v-model="beds"
                            placeholder="Min number of beds"
                        />
                        <button @click="searchApartments">Search</button>


                        <!--  -->
                        <!-- prova longitudine -->
                        <!--  -->
                        <div>
                            <div id="searchbox" ref="searchbox"></div>
                        </div>
                        <input
                            type="number"
                            v-model="range"
                            placeholder="Range di ricerca in Km"
                        />

                        <!-- <button @click="longitudeTest">Search</button> -->
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
                        style="width: 18rem">
                        <img
                            :src="
                                require(`../../../../public/storage/${apartment.cover}`)
                            "
                            class="card-img-top"
                            :alt="apartment.name"/>

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
                            <a :href="'/apartments/' + apartment.id"
                                class="btn btn-primary my-2">Details</a>
                        </div>
                    </div>
                    <!-- filtrati :key="apartment.id"-->
                    <div
                        v-if="filter.length != 0"
                        v-for="item in filter"
                        :key="item.id"
                        class="card border border-5 borderpurple"
                        style="width: 18rem"
                    >
                        <img :src="require(`../../../../public/storage/${item.cover}`)"
                            class="card-img-top"
                            :alt="item.name"/>

                        <div class="card-body">
                            <h5 class="card-title">{{ item.name }}</h5>
                            <p class="card-text">{{ item.description }}</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Prezzo: {{ item.price }} €
                                </li>
                                <li class="list-group-item">
                                    N° Stanze: {{ item.rooms }}
                                </li>
                                <li class="list-group-item">
                                    N° Bagni: {{ item.baths }}
                                </li>
                                <li class="list-group-item">
                                    Posti letto: {{ item.beds }}
                                </li>
                            </ul>
                            <a :href="'/apartments/' + item.id"
                                class="btn btn-primary my-2">
                                Details
                            </a>

                        </div>
                    </div>
                </div>
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
            lat: 0,
            lng: 0,
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
        // handleResultsFound(event) {
        //     var results = event.data.results.fuzzySearch.results

        //     if (results.length === 0) {
        //         searchMarkersManager.clear()
        //     }
        //     searchMarkersManager.draw(results)
        //     fitToViewport(results)

        //     // Lat
        //     var lat
        //     var address
        //     results.forEach(element => {
        //         lat = element.position.lat
        //         address = element.address
        //     });
        //     this.position.lat = lat
        //     // Long
        //     var long
        //     results.forEach(element => {
        //         long = element.position.lng
        //     });
        //     this.position.lng = long

        // },
        // filtro
        searchApartments() {
            // se i parametri di ricerca sono vuoti
            if(this.address == ""  && this.price == ""  && this.rooms == ""  && this.baths == ""  && this.beds =="" && this.range == "" ){
                // svuota l'array filtrato
                this.filter = []
            }
            // invece se
            else{
                // controlla i parametri e setta su null per evitare problemi
                if(this.address == ""){
                    this.address = null
                    this.adressX = true
                }

                if(this.price == ""){
                    this.price = null
                    this.priceX = true
                }

                if(this.rooms == ""){
                    this.rooms = null
                    this.roomsX = true
                }

                if(this.baths == ""){
                    this.baths = null
                    this.bathsX = true
                }

                if(this.beds == ""){
                    this.beds = null
                    this.bedsX = true
                }

                if(this.range == ""){
                    this.range = null
                    this.rangeX = true
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
                        lon: this.longitude,
                        lat: this.latitude,
                        range: this.range,
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

                // validazioni pt.2
                if(this.addressX == true){
                    this.adressX = false
                    this.address = ""
                }
                if(this.priceX == true){
                    this.priceX = false
                    this.price = ""
                }
                if(this.roomsX == true){
                    this.roomsX = false
                    this.rooms = ""
                }
                if(this.bathsX == true){
                    this.bathsX = false
                    this.baths = ""
                }
                if(this.bedsX == true){
                    this.bedsX = false
                    this.beds = ""
                }
                if(this.rangeX == true){
                    this.rangeX = false
                    this.range = ""
                }

            }
        },
        // appartamenti e servizi
        getApartments(){
            axios.get('http://127.0.0.1:8000/api/apartments')
            .then(res=>{
                this.apartments = res.data.apartments;
                this.services = res.data.services;
            })
        },
    },
    created(){
        this.getApartments();
    },
    mounted() {

    },
    updated(){
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
        document.getElementById('searchbox').append(searchBoxHTML);
        ttSearchBox.on("tomtom.searchbox.resultselected", function(data) {
            let result = Object.values(data.data.result.position)
            console.log(result)
            this.lng.push(result[0]);
        })

    }
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
