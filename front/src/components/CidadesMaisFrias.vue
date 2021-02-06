<template>
  <div id="cidadesMaisFrias" class="text-left">
    <h5>
      Cidades Mais Frias Hoje <span><i class="fas fa-snowflake"></i></span>
    </h5>

    <table class="table table-bordered box-shadow-inverse">
      <tbody>
        <tr v-for="item in items" v-bind:key="item.id">
          <td>{{ item.nome }} / {{ item.uf }}</td>
          <td>{{ item.clima }}</td>
          <td class="verde">Min {{ item.temperatura_maxima }} ºC</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "CidadesMaisFrias",
  data() {
    return {
      items: [],
    };
  },
  mounted: function() {
    axios
      .get("http://localhost:8000/api/menor-temperatura")
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
#cidadesMaisFrias {
  margin-top: 25px;
}
.verde {
  color: #27ae60;
  font-weight: bold;
}
</style>
