<template>
  <v-card>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
      <v-spacer></v-spacer> 
      
    </v-card-title>
   
  </v-card>
</template>

<script>
  export default {
    data () {
      return {
        search: '',
        
      }
    },
  }
</script>