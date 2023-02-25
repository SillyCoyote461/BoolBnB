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
                  <label for="prezzo">Prezzo massimo</label>
                  <input
                    type="number"
                    name="price"
                    v-model="filters.price"
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
                  <label for="meters">Metri quadrati massimi</label>
                  <input
                    type="number"
                    name="meters"
                    v-model="filters.meters"
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
                  <select
                    name="services"
                    v-model="filters.services"
                    class="form-control"
                    multiple
                  >
                    <option
                      v-for="service in allServices"
                      :key="service.id"
                      :value="service.name"
                    >
                      {{ service.name }}
                    </option>
                  </select>
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

    <!-- APPARTAMENTI FILTRATI -->

    <!-- <div>
      <ul
        class="container d-flex flex-wrap grid gap-3"
        v-if="filteredApartments.length"
      >
        <li v-for="(apartment, index) in filteredApartments" :key="index">
          <div class="card">
            <a :href="'/apartment/' + apartment.id">
              <div class="card-img">
                <img
                  :src="
                    require(`../../../../storage/app/public/${apartment.cover}`)
                  "
                  class="card-img-top"
                  alt="..."
                />
              </div>
              <div class="card-info">
                <p class="text-title">{{ apartment.name }}</p>
                <p class="text-body">Posti letto: {{ apartment.beds }}</p>
                <p class="text-body">rooms: {{ apartment.rooms }}</p>
                <p class="text-body">baths: {{ apartment.baths }}</p>
              </div>
              <div class="card-footer">
                <span class="text-title bold-violet"
                  >{{ apartment.price }}&euro;</span
                >
              </div>
            </a>
          </div>
        </li>
      </ul>
      <p v-else>Non ho trovato nulla</p>
    </div> -->

    <!-- SPONSORED / APPARTAMENTI CICLATI -->

    <!-- <section>
      <div class="containerCustom py-5">


        <a href="/ShowVue">test</a>
        <div class="d-flex flex-wrap">
          <ul v-for="(element, index) in propsApartment" :key="index">
            <li>
              <div class="card">
                <div class="card-img">
                  <img
                    :src="
                      require(`../../../../storage/app/public/${element.cover}`)
                    "
                    class="card-img-top"
                    alt="..."
                  />
                </div>
                <div class="card-info">
                  <p class="text-title">{{ element.name }}</p>
                  <p class="text-body">Posti letto: {{ element.beds }}</p>
                  <p class="text-body">rooms: {{ element.rooms }}</p>
                  <p class="text-body">baths: {{ element.baths }}</p>
                </div>
                <div class="card-footer">
                  <span class="text-title bold-violet"
                    >{{ element.price }}&euro;</span
                  >
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section> -->
  </div>
</template>


<script>
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
        nome: '',
        prezzo: null,
        stanze: null,
        baths: null,
        letti: null,
        meters: null,
        address: '',
        services: [],
      },
      allServices: [],
    };
  },
    //   computed: {
    //     filteredApartments() {
    //       return this.propsApartment.filter((apartment) => {
    //         return apartment.name.toLowerCase().includes(this.search.toLowerCase());
    //       });
    //     },
    //   },
  created() {
    // Recupera tutti i servizi disponibili
    axios.get('/api/services')
      .then(response => {
        this.allServices = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
  methods: {
    searchApartments() {
      // Invia la richiesta API al server
      axios.get('http://127.0.0.1:8000/api/apartments', { params: this.filters })
      .then(res=>{
                this.apartments = res.data;
                console.log(this.apartments)
            })
        .catch(error => {
          console.log(error);
        });

        }
}}
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
