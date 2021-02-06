<template>
  <div>
    <section id="clima-tempo">
      <h1>Clima Tempo - Simples</h1>
    </section>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <CidadesMaisQuentes />
        </div>
        <div class="col-md-6">
          <CidadesMaisFrias />
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <BuscarTempoCidade />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CidadesMaisQuentes from "./CidadesMaisQuentes.vue";
import CidadesMaisFrias from "./CidadesMaisFrias.vue";
import BuscarTempoCidade from "./BuscarTempoCidade.vue";
/*import ResultadoBusca from "./ResultadoBusca.vue";*/

export default {
  name: "Home",
  components: {
    CidadesMaisQuentes,
    CidadesMaisFrias,
    BuscarTempoCidade,
  },
};
</script>

<style scoped>
#clima-tempo {
  background-color: #2980b9;
  color: #fff;
  padding: 20px;
  margin-bottom: 25px;
}
</style>
