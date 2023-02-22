<template>
    <div>
        <!-- JUMBO -->

        <div class="backgroundImg d-flex flex-column">
            <div
                class="d-flex align-items-center justify-content-center flex-grow-1"
            >
                <div class="">
                    <form class="form-inline d-flex">
                        <input
                            class="form-control mr-sm-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button
                            class="btn btn-outline-light border-3 purple my-2 my-sm-0"
                            type="submit"
                        >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="">Filtri</div>
            </div>
        </div>

        <!-- SPONSORED / APPARTAMENTI CICLATI -->

        <section>
            <div class="containerCustom py-5">
                <!-- APPARTAMENTI CICLATI -->



                <a href="/ShowVue">test</a>
                <div class="d-flex">
                    <ul v-for="(element, index) in propsApartment" :key="index">
                        <li>
                            <!-- <div class="card" style="width: 18rem">
                                <img :src="require(`../../../../storage/app/public/${element.cover}`)" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">{{ element.name }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">price: {{ element.price }}&euro;</li>
                                    <li class="list-group-item">
                                        rooms: {{ element.rooms }}
                                    </li>
                                    <li class="list-group-item">
                                        beds: {{ element.beds }}
                                    </li>
                                    <li class="list-group-item">
                                        baths: {{ element.baths }}
                                    </li>
                                </ul>

                            </div> -->
                            <div class="card">
                                <div class="card-img">
                                    <img :src="require(`../../../../storage/app/public/${element.cover}`)" class="card-img-top" alt="..." />
                                </div>
                                <div class="card-info">
                                    <p class="text-title">{{ element.name }} </p>
                                    <p class="text-body">Posti letto: {{ element.beds }}</p>
                                    <p class="text-body">rooms: {{ element.rooms }}</p>
                                    <p class="text-body">baths: {{ element.baths }}</p>
                                </div>
                                <div class="card-footer">
                                    <span class="text-title bold-violet">{{ element.price }}&euro;</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "IndexVue",
    props: {
        propsApartment: Array,
    },
    // data() {

    // },

    // methods: {},

    // mounted() {},
};
</script>

<style lang="scss" scoped>
.backgroundImg {
    border-bottom: 5px solid black;
    background-image: url("../../../../public/img/jumbo.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 57rem;
}

.containerCustom {
    margin: auto;
    width: 80%;
}

.purple {
    color: var(--bs-purple);
    border-color: var(--bs-purple);
}
</style>
