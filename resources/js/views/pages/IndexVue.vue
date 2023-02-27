<template>
  <div>
    <!-- JUMBO -->

    <div class="backgroundImg d-flex flex-column">
      <div class="d-flex align-items-center justify-content-center flex-grow-1">
        <div class="">
            <div>
    <input type="text" v-model="name" placeholder="Search by name">

    <input type="number" v-model="rooms" placeholder="Min number of rooms">

    <input type="number" v-model="beds" placeholder="Min number of beds">
    <button @click="searchApartments">Search</button>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Address</th>
          <th>Rooms</th>
          <th>Beds</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="apartment in apartments" :key="apartment.id">
          <td>{{ apartment.id }}</td>
          <td>{{ apartment.name }}</td>
          <td>{{ apartment.description }}</td>

          <td>{{ apartment.address }}</td>

          <td>{{ apartment.rooms }}</td>

          <td>{{ apartment.beds }}</td>
        </tr>
      </tbody>
    </table>
  </div>
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
            price: this.price,
            rooms: this.rooms,
            baths: this.baths,
            beds: this.beds,
          },
        })
        .then((response) => {
          this.apartments = response.data;
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
</style>
