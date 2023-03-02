<template>
    <div class="container ">

        <!-- <div class="chat">
            <i class="fa-regular fa-comment"></i>
        </div> -->
        <button type="button" class="chat " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-regular fa-comment"></i>
        </button>

        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class=" modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Invia un messaggio al proprietario di {{
                            apartment.name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="d-flex flex-column ">
                                <!-- name -->
                                <label>Nome</label>
                                <input type="text" class="w-100" v-model="name">
                            </div>
                            <div class="d-flex flex-column ">
                                <!-- surname -->
                                <label>Cognome</label>
                                <input type="text" class="w-100" v-model="surname">
                            </div>
                            <div class="d-flex flex-column ">
                                <!-- email -->
                                <label>Email</label>
                                <input type="email" class="w-100" v-model="email">
                            </div>
                            <div class="d-flex flex-column ">
                                <!-- message -->
                                <label>Messaggio</label>
                                <textarea name="" id="" cols="30" rows="10" class="w-100" v-model="text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- btn cancel -->
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <!-- btn send -->
                        <button class="send" @click="sendMessage">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                            d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <span>Send</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class=" d-flex pt-5 flex-wrap ">

            <div class="customwidth">
                <img class="w-100" :src="'/storage/' + apartment.cover" alt="">
            </div>

            <div class="d-flex flex-column ms-4">
                <div class=" fs-1 fw-bold">
                    <h1>{{ apartment.name }}</h1>
                </div>
                <div>
                    <i class="fa-solid fa-location-dot icone-custom"></i>
                    {{ apartment.address }}
                </div>
                <div>
                    <i class="fa-solid fa-door-closed icone-custom"></i> Stanze:
                    {{ apartment.rooms }}
                </div>
                <div>
                    <i class="fa-solid fa-toilet icone-custom"></i> Bagni:
                    {{ apartment.baths }}
                </div>
                <div>
                    <i class="fa-solid fa-bed icone-custom"></i> Posti letto:
                    {{ apartment.beds }}
                </div>
                <div>
                    <i class="fa-solid fa-cube icone-custom"></i> Dimensioni:
                    {{ apartment.meters }} mtq
                </div>
                <div class="fs-1  fw-bold" style="color:#6f42c1">

                    &euro;{{ apartment.price }}

                </div>
            </div>
        </div>

        <div>
            <div class="fs-1 mt-4 fw-bold" style="color:#6f42c1">
                Descrizione
            </div>

            <div class="mt-2">
                {{ apartment.description }}

            </div>
        </div>

    </div>
</template>

<!-- non ciclare nulla, l'array che ho portato fino alla show é un singolo elemento,
invece di fare <ul v-for="....">
usa direttamente {{apartment.name}} ecc..
-->

<script>
import axios from 'axios';

export default {
    name: "ShowVue",
    data() {
        return {
            apartment: {},
            fk: null,
            name: "",
            surname: "",
            email: "",
            text: "",
        }
    },
    mounted() {
        this.getApartment();
    },
    methods: {
        getApartment() {
            const apartmentId = this.$route.params.id;
            axios.get(`/api/apartments/${apartmentId}`)
                .then(response => {
                    this.apartment = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        sendMessage(){
            this.fk = this.apartment.id
            axios.get(`/api/message`,{
                params: {
                    name: this.name,
                    surname: this.surname,
                    email: this.email,
                    text: this.text,
                    fk: this.fk
                }
            })
            .then(alert("Il messaggio é stato inviato correttamente"))
            .catch((error)=>{
                alert("C'é stato un errore")
                console.error(error.response.data)
            })
    },  }
}
</script>

<style lang="scss" scoped>
.chat {
    position: fixed;
    bottom: 5%;
    right: 15%;
    font-size: 24px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #6f42c1;
    text-align: center;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.send {
    font-family: inherit;
    font-size: 14px;
    background: royalblue;
    color: white;
    padding: 0.7em 1em;
    padding-left: 0.9em;
    display: flex;
    align-items: center;
    border: none;
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.2s;
}

.send span {
    display: block;
    margin-left: 0.3em;
    transition: all 0.3s ease-in-out;
}

.send svg {
    display: block;
    transform-origin: center center;
    transition: transform 0.3s ease-in-out;
}

.send:hover .svg-wrapper {
    animation: fly-1 0.6s ease-in-out infinite alternate;
}

.send:hover svg {
    transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

.send:hover span {
    transform: translateX(5em);
}

.send:active {
    transform: scale(0.95);
}

.customwidth {
    width: 50%;
}

@keyframes fly-1 {
    from {
        transform: translateY(0.1em);
    }

    to {
        transform: translateY(-0.1em);
    }
}

.icone-custom{
    color:#6f42c1;
    font-size: 20px;
    margin-top: 25px;
    margin-right: 8px;
}

@media (max-width: 767.98px) {

    .customwidth {
        width: 100%;
        margin-bottom: 2rem;
    }

    }

</style>
