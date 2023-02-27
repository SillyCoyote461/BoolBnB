<template>
    <div>
        <!---<HeaderVue/>-->
       <!-- <IndexVue /> -->

       <router-view :propsApartment="apartments"></router-view>

    </div>
</template>

<script>
import IndexVue from '../views/pages/IndexVue.vue'
import HeaderVue from '../components/HeaderVue.vue'
export default {
    name: "App",
    components: {
        IndexVue,
        HeaderVue
    },
    data(){
        return{
            apartments: []
        }
    },
    methods: {
        getApartments(){
            axios.get('http://127.0.0.1:8000/api/apartments')
            .then(res=>{
                this.apartments = res.data;
            })
        }
    },
    mounted(){
        this.getApartments()
    }
}
</script>
