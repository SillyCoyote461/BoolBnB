<template>
  <div>
    <div class="backgroundImg d-flex flex-column">
      <div class="d-flex align-items-center justify-content-center flex-grow-1">
        <div class="">

          <form class="form-inline d-flex">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>


        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="">Filtri</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "IndexVue",
};
</script>

</script>

<style lang="scss" scoped>
.backgroundImg {
  border-bottom: 5px solid black;
 // background-image: url('../../../../public/images/jumbo.jpg');
  background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  width: 100%;
  height: 57rem;
}
</style>
