<template>
  <div id="app">
    <Home />
  </div>
</template>

<script>
import Home from "./components/Home.vue";

export default {
  name: "App",
  components: {
    Home,
  },
};
</script>

<style>
body {
  padding-bottom: 50px;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#resultados {
  margin-top: 45px;
  margin-bottom: 45px;
}

.box-shadow {
  box-shadow: none;
  transition: box-shadow 0.3s ease-in-out;
}
.box-shadow:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.box-shadow-inverse {
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
}
.box-shadow-inverse:hover {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
  transition: box-shadow 0.3s ease-in-out;
}
#form input {
  height: 30px;
  line-height: 20px;
  margin-top: 25px;
}
</style>
