<template>
  <div>
    <form name="form" id="form">
      <v-select
        :options="options"
        label="nome"
        @input="changedValue"
        placeholder="Selecione o nome da cidade para pesquisar"
      ></v-select>
    </form>

    <div v-if="cidade" id="resultados">
      <h3 class="text-center">
        Clima para os próximos 7 dias para a cidade de {{ cidade }}
      </h3>
    </div>

    <div class="row">
      <div
        class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 controle-box"
        v-for="item in dados"
        :key="item.id"
      >
        <div class="card box-shadow-inverse">
          <div class="card-header">
            <p>{{ item.data_previsao | moment("L") }}</p>
            <p>{{ item.data_previsao | moment("dddd") }}</p>
          </div>
          <div class="card-body text-left">
            <div class="clima">
              <span class="icone">
                <div
                  v-if="item.clima == 'nublado'"
                  :class="{ 'cor-nublado': item.clima == 'nublado' }"
                >
                  <i class="fas fa-cloud-moon-rain"></i>
                </div>

                <div
                  v-if="item.clima == 'chuvoso'"
                  :class="{ 'cor-chuvoso': item.clima == 'chuvoso' }"
                >
                  <i class="fas fa-cloud-rain"></i>
                </div>

                <div
                  v-if="item.clima == 'tempestuoso'"
                  :class="{ 'cor-tempestuoso': item.clima == 'tempestuoso' }"
                >
                  <i class="fas fa-cloud-showers-heavy"></i>
                </div>

                <div
                  v-if="item.clima == 'ensolarado'"
                  :class="{ 'cor-ensolarado': item.clima == 'ensolarado' }"
                >
                  <i class="fas fa-sun"></i>
                </div>

                <div
                  v-if="item.clima == 'instavel'"
                  :class="{ 'cor-instavel': item.clima == 'instavel' }"
                >
                  <i class="fas fa-cloud-sun-rain"></i>
                </div>
              </span>

              {{ item.clima }}
            </div>
            <p class="verde">{{ item.temperatura_minima }} ºC</p>
            <p class="vermelho">{{ item.temperatura_maxima }} ºC</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "BuscarTempoCidade",
  data() {
    return {
      options: [],
      dados: [],
      cidade: "",
    };
  },

  mounted: function() {
    axios
      .get("http://localhost:8000/api/cidades")
      .then((response) => {
        this.options = response.data;
      })
      .catch(function(error) {
        console.log(error);
      });
  },

  methods: {
    changedValue: function(event) {
      let valorSelecao = JSON.stringify(event);
      let idCidade = JSON.parse(valorSelecao);
      axios
        .get(`http://localhost:8000/api/previsao/${idCidade.id}/7`)
        .then((response) => {
          this.dados = response.data;
          this.cidade = response.data[0].nome;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.card {
  margin: 5px;
}

.card-body {
  padding: 8px !important;
  margin: 2px !important;
}
.card-body p {
  margin: 0px;
}
.clima {
  margin-bottom: 5px;
  font-weight: bold;
  text-transform: capitalize;
}

.icone {
  position: relative;
  display: inline-flex;
  margin-right: 5px;
}

.cor-nublado {
  color: #7f8c8d;
}
.cor-chuvoso {
  color: #34495e;
}
.cor-tempestuoso {
  color: #2c3e50;
}
.cor-ensolarado {
  color: #d35400;
}
.cor-instavel {
  color: #7f8c8d;
}

.card-header p {
  padding: 0;
  margin: 0;
  text-transform: capitalize;
  font-weight: bold;
  color: #555;
  font-size: 14px;
}
.card-header p:first-child {
  font-size: 12px;
  font-weight: 400;
}

.verde {
  color: #27ae60;
}
.vermelho {
  color: #c0392b;
}

.controle-box {
  padding: 0px !important;
  margin: 0px !important;
}
</style>
