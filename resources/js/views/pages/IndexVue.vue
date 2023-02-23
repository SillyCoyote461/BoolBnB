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
        <div class="text-light">Filtri</div>
      </div>
    </div>

    <!-- APPARTAMENTI FILTRATI -->

    <div >
      <ul class="container d-flex flex-wrap grid gap-3" v-if="filteredApartments.length">
        <li v-for="(apartment, index) in filteredApartments" :key="index">
          <div class="card">
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
          </div>
        </li>
      </ul>
          <p v-else>Non ho trovato nulla</p>
    </div>



    <!-- SPONSORED / APPARTAMENTI CICLATI -->

    <section>
      <div class="containerCustom py-5">
        <!-- APPARTAMENTI CICLATI -->

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
    </section>

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
      apartments: [],
    };
  },
  computed: {
    filteredApartments() {
      return this.propsApartment.filter((apartment) => {
        return apartment.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },

  // methods: {},

  // mounted() {},
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
