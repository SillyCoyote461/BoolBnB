<template>
    <div class="container">

        <div class="d-flex justify-content-between py-5">
            <div class="infobox-imgshow">
                <div>
                   <img class="w-100" src="../../../../public/img/jumbo.jpg" alt="">
                </div>
            </div>

            <div class="infobox-infoshow p-5">
                <h1>titolo </h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde nam hic cum? Impedit eius ad quis tempore! Nesciunt omnis mollitia dolorum officia enim ea id dignissimos corporis placeat fugit.
                </p>
            </div>
        </div>

        <div class="description-box p-5">
            <!-- <h1>{{apartment.name}}</h1> -->

            <ul>
                <li>
                    {{ apartment.name }}
                    <!-- <li v-for="info in elem.posts">
                        {{ posts.title }}
                    </li> -->
                </li>
            </ul>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste culpa dolorum illo, sed delectus, voluptatem aliquid tempore illum eius hic quae inventore sapiente facere quos sunt molestias exercitationem esse! Eaque!</p>
        </div>


    </div>
</template>

<!-- non ciclare nulla, l'array che ho portato fino alla show é un singolo elemento,
invece di fare <ul v-for="....">
usa direttamente {{apartment.name}} ecc..
-->

<script>
export default {
    name: "ShowVue",
    data() {
    return {
      apartment: null ,
    };
  },
  mounted() {
       this.getApartment();
    },
    methods: {
        getApartment() {
            axios
            .get(`http://127.0.0.1:8000/api/apartments/${this.$route.params.id}`)
            .then((res) => {
                this.apartment = res.data;
                console.log(res.data);
            })
            .catch((err) => {
                console.log(err);
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
