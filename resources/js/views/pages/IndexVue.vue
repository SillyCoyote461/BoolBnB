<template>
  <div>
    <!-- JUMBO -->

    <div class="backgroundImg d-flex flex-column">
      <div class="d-flex align-items-center justify-content-center flex-grow-1">
        <div class="">
          <div>
            <input type="text" v-model="name" placeholder="Search by name" />
            <input type="number" v-model="price" placeholder="Max price" />
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

    <div class=" background2">
        <div class="container p-5 d-flex flex-wrap grid gap-3">
            <div class="card-deck ">
              <div
                v-for="apartment in apartments"
                :key="apartment.id"
                class="card border border-5 borderpurple"
                style="width: 18rem"
              >

                <img
                  :src="apartment.cover"
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
                    <li class="list-group-item">Posti letto: {{ apartment.beds }}</li>
                  </ul>
                  <a
                    :href="'/apartments/' + apartment.id"
                    class="btn btn-primary"
                    >Details</a
                  >
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      cover: "",
      price: null,
      rooms: null,
      baths: null,
      beds: null,
      apartments: [],
    };
  },
  methods: {
    searchApartments() {
      axios
        .get("http://127.0.0.1:8000/api/apartments", {
          params: {
            name: this.name,
            cover: this.cover,
            price: this.price,
            rooms: this.rooms,
            baths: this.baths,
            beds: this.beds,
          },
        })
        .then((response) => {
          this.apartments = response.data;
          console.log(this.apartment.cover)
        })
        .catch((error) => {
          console.error(error);
        });
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

.background2{
    background-color: #2c125c;
}

.borderpurple{
    border-color: #6f42c1 !important;
    border-radius: 10px;
    color: white;
    background-color: initial;
}
</style>
