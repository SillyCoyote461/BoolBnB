<template>
    <div>
        <!---<HeaderVue/>-->
       <!-- <IndexVue /> -->

       <router-view></router-view>

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
}
</script>
