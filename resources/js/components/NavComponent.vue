<template>
  <v-bottom-navigation
    :value="value"
    color="primary"
    horizontal
  >
    <v-btn href="http://127.0.0.1:8000/saludo">
        <h3>Inicio</h3>
    </v-btn>
    <v-divider
          class="mx-4"
          inset
          vertical
    ></v-divider>
    <v-btn href="http://127.0.0.1:8000/registro">
        <h3>Registro</h3>
    </v-btn>
  </v-bottom-navigation>
</template>


<script>
  export default {
    data: () => ({ value: 1 }),
  }
</script>