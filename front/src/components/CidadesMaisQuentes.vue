<template>
  <div id="cidadesMaisQuentes" class="text-left">
    <h5>
      Cidades Mais Quentes Hoje <span><i class="fas fa-fire-alt"></i></span>
    </h5>
    <table class="table table-bordered box-shadow-inverse">
      <tbody>
        <tr v-for="item in items" v-bind:key="item.id">
          <td>{{ item.nome }} / {{ item.uf }}</td>
          <td class="vermelho2">{{ item.clima }}</td>
          <td class="vermelho">Max {{ item.temperatura_maxima }} ºC</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "CidadesMaisQuentes",

  data() {
    return {
      items: [],
    };
  },
  mounted: function() {
    axios
      .get("http://localhost:8000/api/maior-temperatura")
      .then((response) => {
        //console.log(response.data);
        this.items = response.data;
      })
      .catch(function(error) {
        console.log(error);
      });
  },
};
</script>

<style scoped>
#cidadesMaisQuentes {
  margin-top: 25px;
}
.vermelho {
  color: #d35400;
  font-weight: bold;
}
</style>
