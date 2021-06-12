<template>
  <v-app>
   <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Nuevo Registro
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Nuevo Registro</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col
                cols="12"
                sm="6"
                
              >
               <v-autocomplete
                v-model="dataForms.idEmpleado"
                 :items="dataEmpleados"
                 item-value="id"
                 item-text="name"
                  dense
                  
                 filled
                 hint="Seleccione el Empleado*"
                  persistent-hint
                  hide-details="auto"                 
                  required
                 label="Empleados*"
              ></v-autocomplete>
              </v-col>
              <v-col
                cols="12"
                sm="6"
              >
              <v-autocomplete
                v-model="dataForms.estadoEmpleado"
                 :items="dataEstado"
                 item-value="id"
                 item-text="name"
                  dense
                  
                 filled
                 hint="Seleccione el estado*"
                  persistent-hint
                  hide-details="auto"                 
                  required
                 label="Estado*"
              ></v-autocomplete>
                </v-col>
              
             
            <v-date-picker
              v-model="dataForms.picker"
              :landscape="dataForms.landscape">
              </v-date-picker>
            
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="guardarNuevoRegistro"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  <v-data-table
    :headers="headers"
    :items="dataReg"
    sort-by="calories"
    class="elevation-1">
    
  </v-data-table>
  </v-app>
</template>
<script>

export default{
  data(){
    return{
      //Instanciamos los titulos de la tabla
      headers:[  
        
        { text: 'ID Empleado', value: 'ID Empleado' },
        { text: 'Fecha de Ingreso', value: 'Fecha Ingreso' },
        { text: 'Area', value: 'Area' },
        { text: 'Estado', value: 'Estado' },
        { text: 'Hora del Registro', value: 'Hora Registro' },],

//Instanciamos las variables
    
        dataReg:[],
        dataEstado:[],
        dataEmpleados:[],
        dialog:false,

        dataForms:{
        idEmpleado:"",
        identificacion:"",
        estadoEmpleado:"",
        fechaIngreso:"",
        picker: new Date().toISOString().substr(0, 7),
        landscape: false,
        area:"",
        hora:"",
        dateData:[]
        }
          
        }
      },
      mounted(){
    
    this.getDataAreas()
    this.getDataRegistros()
    this.getDataEmpleados()
    this.getDate()
    this.guardarNuevoRegistro()
    
  },
   
  methods:{
    allowedDates: val => parseInt(val.split('-')[2], 10) % 2 === 0,

    guardarNuevoRegistro(){
      
      const dataArea= this.dataEmpleados.find(el => el.id==this.dataForms.idEmpleado)
      
      var data = new FormData();
       data.append('getId',this.dataForms.idEmpleado);
       data.append('getFecha',this.dataForms.picker);
       data.append('getarea',dataArea.area);
       data.append('getestado',this.dataForms.estadoEmpleado);
      

      axios.post("/nuevoregistro",data).then((response) =>{
        if(response.status == 200){
          this.getDataRegistros()
          this.dialog=false
        }else{
          this.dialog=false
        }

    });

    },

    getDataRegistros()
    {
      axios.get("/consultaregistros").then((response) =>{
        if(response.status == 200){
          this.dataReg = response.data.data
        }else{
          this.dataReg = []
        }

      });
    },

    getDataAreas()
    {
      axios.get("/consultaestados").then((response) =>{
        if(response.status == 200){
          this.dataEstado = response.data.data
        }else{
          this.dataEstado = []
        }

      });
    },


    getDataEmpleados()
    {
      axios.get("/empleadoslist").then((response) =>{
        if(response.status == 200){
          this.dataEmpleados = response.data.data
        }else{
          this.dataEmpleados = []
        }

      });
    },

    getDate()
    {
      axios.get("/fechacalculada").then((response) =>{
        if(response.status == 200){
          this.dateData = response.data.data
        }else{
          this.dateData = []
        }

        console.log(this.dateData)

      });
    },




    getCreateRegister()
    {
      console.log(this.dataForms)
    }
  }
}
</script>