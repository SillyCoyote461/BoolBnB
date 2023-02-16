<template>
    <div>

        <div class="background">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <img class="logo" src="../../../public/images/logo.webp" alt="">
                    <!---<img src="{{asset('images/logo.webp.jpg')}}" alt="">--->
                    <h1>Login</h1>
                </div>
            </div>

        </div>


    </div>
</template>


<script>
export default {
    name: 'HeaderVue'
}
</script>

<style lang="scss" scoped>
.background{
    background-color: #6646E2;

    .logo{
        width: 50px;
    }
}


</style>

