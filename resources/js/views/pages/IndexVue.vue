<template>
  <div>
    <!-- JUMBO -->

    <div class="backgroundImg d-flex flex-column">
      <div class="d-flex align-items-center justify-content-center flex-grow-1">
        <div class="">
          <form class="form-inline d-flex" @submit.prevent>
            <input
              class="form-control mr-sm-2"
              type="text"
              placeholder="Search"
              aria-label="Search"
              v-model="search"
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
      <div
        class="d-flex align-item-center justify-content-center filtri-section"
      >
        <div class="text-light">
          <button
            class="btn btn-primary"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop"
            aria-controls="staticBackdrop"
          >
            Filtri
          </button>
        </div>
        <div
          class="offcanvas offcanvas-start"
          data-bs-backdrop="static"
          tabindex="-1"
          id="staticBackdrop"
          aria-labelledby="staticBackdropLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">
              Filtri ricerca
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <div>
              <form @submit.prevent="searchApartments">
                <!-- <form action="{{ route('apartments.index') }}" method="GET"> -->
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input
                    type="text"
                    name="name"
                    v-model="filters.name"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <label for="stanze">Stanze</label>
                  <input
                    type="number"
                    name="rooms"
                    v-model="filters.rooms"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <label for="baths">Bagni</label>
                  <input
                    type="number"
                    name="baths"
                    v-model="filters.baths"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <label for="letti">Letti</label>
                  <input
                    type="number"
                    name="beds"
                    v-model="filters.beds"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <label for="address">Indirizzo</label>
                  <input
                    type="text"
                    name="address"
                    v-model="filters.address"
                    class="form-control"
                  />
                </div>

                <div class="form-group">
                  <label for="services">Servizi</label>
                  <div v-for="service in allServices" :key="service.id">
                    <input
                      type="checkbox"
                      :id="service.name"
                      :value="service.name"
                      v-model="filters.services"
                    />
                    <label :for="service.name">{{ service.name }}</label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Cerca</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from 'axios';


export default {
  name: "IndexVue",
  props: {
    propsApartment: Array,
  },
  data() {
    return {
      search: "",
      //   apartments: [],
      filters: {
        name: "",
        prezzo: null,
        stanze: null,
        baths: null,
        beds: null,
        meters: null,
        address: "",
        services: [],
      },
      allServices: [],
    };
  },

  created() {
    // Recupera tutti i servizi disponibili
    axios
      .get("/api/ServicesController")
      .then((response) => {
        this.allServices = response.data;
        console.log(this.allServices)
      })
      .catch((error) => {
        console.log(error);
      });
  },
  methods: {
    searchApartments() {
      // Invia la richiesta API al server
      axios
        .get("http://127.0.0.1:8000/api/ApartmentController", {
          params: this.filters,
        })
        .then((res) => {
          this.apartments = res.data;
          console.log(this.apartments);
        })
        .catch((error) => {
          console.log(error);
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
</style>
