<template>
    <div class="container ">
        <div class="fs-1 fw-bold d-flex pt-5">

            <img class="w-50" :src="'/storage/' + apartment.cover" alt="">
            <div class="ms-3">
                <h1>{{ apartment.name }}</h1>
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
    },
};
</script>

<style lang="scss" scoped>
.infobox-imgshow {
    height: 500px;
    width: 500px;
    background-color: #6f42c1;
    border: 9px solid #6f42c1;
    border-radius: 50px;
    align-self: center;
    /* background-image: url('../../../../public/img/jumbo.jpg');
background-size: cover;
    background-repeat: no-repeat;
    background-position: center; */
}

.infobox-infoshow {
    height: 500px;
    width: 500px;
    background-color: #6f42c1;
    align-self: center;
    color: white;
}

.description-box {
    width: 100%;
    height: 34rem;
    background-color: #6f42c1;
    color: white;
}
</style>
