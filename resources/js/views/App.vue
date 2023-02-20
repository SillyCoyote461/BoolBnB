<template>
    <div>
        <!---<HeaderVue/>-->
        <!-- <IndexVue/> -->
        <ShowVue />
    </div>
</template>

<script>


import IndexVue from '../views/pages/IndexVue.vue'
import ShowVue from '../views/pages/ShowVue.vue'
import HeaderVue from '../components/HeaderVue.vue'

export default {
    name: "App",
    components: {
        IndexVue,
        HeaderVue,
        ShowVue
    }
}
</script>
