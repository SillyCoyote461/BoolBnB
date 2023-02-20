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
                <!-- SPONSORED -->

                <div
                    class="border-bottom border-3 p-3 overflow-x-auto grid gap-3"
                >
                    <h1>In Primo Piano</h1>
                    <div>
                        <div class="card" style="width: 18rem">
                            <img src="" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <p class="card-text">
                                    Some quick example text to build on the card
                                    title and make up the bulk of the card's
                                    content.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- APPARTAMENTI CICLATI -->

                <div class="p-3 border-3 d-flex flex-wrap grid gap-3">
                    <div class="card" style="width: 18rem">
                        <img
                            src="../../../../public/img/jumbo.jpg"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="card-body">
                            <p class="card-text">
                                Some quick example text to build on the card
                                title and make up the bulk of the card's
                                content.
                            </p>   
                                 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "IndexVue",
};
// data(){
//     return{
//         posts: []
//     }
// },
// mounted(){

// },
// methods : {
//     getApartment(){
//         axios.get('http://127.0.0.1:8000/api/apartment')
//     }
// }
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
