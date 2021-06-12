
<template>
  <v-app>
    <!--<v-btn depressed
      color="primary">
      Primary
    </v-btn> -->
                    <!-- Botón que abre form de crear nuevo empleado -->
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
          Crear Nuevo Empleado
        </v-btn>

      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Nuevo Empleado</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col
                cols="12"
                sm="6"
                
              >
                <v-text-field
                  label="Primer Apellido*"
                  v-model="dataForms.primerApellido"
                  hide-details="auto"
                  hint="Ingrese su primer apellido en mayusculas"
                  persistent-hint
                  onkeyup="javascript:this.value=this.value.toUpperCase();"
                  maxlength="20"
                  

                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                
              >
                <v-text-field
                  label="Segundo Apellido"
                  v-model="dataForms.segundoApellido"
                  
                  hint="Ingrese su segundo apellido en mayusculas"
                  persistent-hint
                  onkeyup="javascript:this.value=this.value.toUpperCase();"
                  maxlength="20"
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                
              >
              <v-text-field
                  label="Primer Nombre*"
                  v-model="dataForms.primerNombre"
                  hide-details="auto"
                  hint="Ingrese su primer nombre en mayusculas"
                  persistent-hint
                  required
                  onkeyup="javascript:this.value=this.value.toUpperCase();"
                  maxlength="20"
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                
              >
                <v-text-field
                  v-model="dataForms.otrosNombres"
                  label="Otros Nombres"
                  
                  hint="Digite su segundo nombre"
                  persistent-hint
                  onkeyup="javascript:this.value=this.value.toUpperCase();"
                  maxlength="50"
                ></v-text-field>
              </v-col>
             <v-col
                cols="12"
                sm="6"
                
              >
              <v-autocomplete
                 v-model="dataForms.paisEmpleo"
                 :items="dataCountry"
                 item-value="id"
                 item-text="nombre"
                  dense
                 
                 filled
                 hint="Seleccione el país de empleo"
                  persistent-hint
                  hide-details="auto"                 
                  required
                 label="Pais de Empleo*"
              ></v-autocomplete>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                
              >
              <v-autocomplete
                 v-model="dataForms.tipoIdentificacion"
                 :items="dataDocument"
                 item-value="id"
                 item-text="documento"
                  dense
                 filled
                 hint="Seleccione el tipo de identificación"
                  persistent-hint
                  hide-details="auto"                 
                  required
                 label="Tipo de Identificación*"
                 
                 
          ></v-autocomplete>
              </v-col>
              
              <v-col
                cols="12"
                sm="6"
                
              >
                <v-text-field
                  label="Numero de Documento*"
                  v-model="dataForms.numeroIdentificacion"
                  
                  hide-details="auto"
                  hint="Ingrese su número de documento sin espacios o puntos"
                  persistent-hint
                  maxlength="20"
                ></v-text-field>
              </v-col>
              <v-col 
                cols="12"
                sm="6"
                >
                <v-text-field
                  label="Email*"
                  v-model="dataForms.correoElectronico"
                  hint="Generado Automáticamente"
                  persistent-hint
                  disabled
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="6"
                
              >
              <v-autocomplete
                 v-model="dataForms.area"
                 :items="dataAreas"
                 item-value="id"
                 item-text="nombre"
                  dense
                  
                 filled
                 hint="Seleccione el Area"
                  persistent-hint
                  hide-details="auto"                 
                  required
                 label="Area de Trabajo*"
              ></v-autocomplete>
              </v-col>
             
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click.stop="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="guardarNuevoEmpleado"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  
  <v-data-table
    :headers="headers"
    :items="dataPeople"
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
        { text: 'Primer Apellido', value: 'primer_apellido' },
        { text: 'Segundo Apellido', value: 'segundo_apellido' },
        { text: 'Primer Nombre', value: 'primer_nombre' },
        { text: 'Otros Nombres', value: 'otros_nombres' },
        { text: 'País de Empleo', value: 'pais_empleo' },
        { text: 'Tipo de Identificación', value: 'tipo_identificación' },
        { text: 'Numero de Identificacón', value: 'numero_identificacion' },
        { text: 'Correo Electrónico', value: 'correo_electronico' },
        { text: 'Área', value: 'area' }],
//Instanciamos las variables
      dataPeople:[],
      dataDocument:[],
      dataRegistros:[],
      dataCountry:[],
      dataDocument:[],
      dataAreas:[],
      dialog:false,
      
      dataForms:{
        primerApellido:"",
        segundoApellido:"",
        primerNombre:"",
        otrosNombres:"",
        paisEmpleo:0,
        tipoIdentificacion:"",
        numeroIdentificacion:"",
        correoElectrónico:"",
        area:""
        }
      
    }
  },
  mounted(){
    this.getDataEmpleados()
    this.getDataPaises()
    this.getDataDocumentos()
    this.getDataAreas()
    this.getDataEstados()
    this.getDataRegistros()
    console.log(this.dataDocument)
  },

  methods:{
    
    guardarNuevoEmpleado(){
      var data = new FormData();
      data.append('getpApellido',this.dataForms.primerApellido);
      data.append('getsApellido',this.dataForms.segundoApellido);
      data.append('getpNombre',this.dataForms.primerNombre);
      data.append('getsNombre',this.dataForms.otrosNombres);
      data.append('getpaise',this.dataForms.paisEmpleo);
      data.append('gettipoid',this.dataForms.tipoIdentificacion);
      data.append('getnumid',this.dataForms.numeroIdentificacion);
      data.append('getcorreoe',this.dataForms.correoElectrónico);
      data.append('getareatr',this.dataForms.area);

      axios.post('/nuevoempleado',data).then((response)=>{

        if (response.status == 200){
           this.getDataEmpleados()
          console.log('Respuesta Correcta')
          this.dialog=false
        }
          console.log('Respuesta Fallida')
          this.dialog=false
      })
    },
    
   
   //Leemos los datos ingresados en el formulario y pasamos la función en el botón save
    readForm(){
      
      console.log(
                  this.dataForms.primerApellido+
                  this.dataForms.segundoApellido+
                  this.dataForms.primerNombre+
                  this.dataForms.otrosNombres+
                  this.dataForms.paisEmpleo+
                  this.dataForms.tipoIdentificacion+
                  this.dataForms.numeroIdentificacion+
                  this.dataForms.correoElectrónico+
                  this.dataForms.area
                  )
    },
//Obtenemos los datos de las funciones de las consultas para llevarlos al formilario con axios.
    getDataRegistros(){
      axios.get("/consultaregistros").then((response)=>{
        if(response.status==200){
          this.dataRegistros = response.data.data
        }else{
          this.dataRegistros = []
        }
      });
    },
    getDataEstados(){
      axios.get("/consultaestados").then((response)=>{
        if(response.status==200){
          this.dataEstados = response.data.data
        }else{
          this.dataEstados = []
        }
      })
    },
    getDataAreas(){
      axios.get("/consultaareas").then((response)=>{
        if(response.status==200){
          this.dataAreas = response.data.data
        }else{
          this.dataAreas=[]
        }
      });
    },

    getDataDocumentos(){
      axios.get("/consultadocumentos").then((response)=>{
        if (response.status ==200){
          this.dataDocument = response.data.data
        }else{
          this.dataDocument=[]
        }
      });
    },

    getDataPaises(){
      axios.get("/consultapaises").then((response)=>{
        if(response.status ==200){
          this.dataCountry = response.data.data
        }else{
          this.dataCountry =[]
        }
      });
    },
    //Llena la tabla con los empleados registrados
    getDataEmpleados()
    {
      axios.get("/dataarray").then((response) =>{
        if(response.status == 200){
          this.dataPeople = response.data.data
        }else{
          this.dataPeople = []
        }

      });
    }

  }
}

 /* export default {
    data: () => ({
      dialog: false,
      dialogDelete: false,
      headers: [
        {
          text: 'Primer Apellido',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        
        { text: 'Segundo Apellido', value: 'fat' },
        { text: 'Primer Nombre', value: 'primer_nombre' },
        { text: 'Otros Nombres', value: 'carbs' },
        { text: 'País de Empleo', value: 'protein' },
        { text: 'Tipo de Identificación', value: 'tipo_identificación' },
        { text: 'Numero de Identificacón', value: 'numero_identificación' },
        { text: 'Correo Electrónico', value: 'email' },
        { text: 'Área', value: 'area' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
      },
      defaultItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
      dialogDelete (val) {
        val || this.closeDelete()
      },
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize () {
        this.desserts = [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
          },
          {
            name: 'Eclair',
            calories: 262,
            fat: 16.0,
            carbs: 23,
            protein: 6.0,
          },
          {
            name: 'Cupcake',
            calories: 305,
            fat: 3.7,
            carbs: 67,
            protein: 4.3,
          },
          {
            name: 'Gingerbread',
            calories: 356,
            fat: 16.0,
            carbs: 49,
            protein: 3.9,
          },
          {
            name: 'Jelly bean',
            calories: 375,
            fat: 0.0,
            carbs: 94,
            protein: 0.0,
          },
          {
            name: 'Lollipop',
            calories: 392,
            fat: 0.2,
            carbs: 98,
            protein: 0,
          },
          {
            name: 'Honeycomb',
            calories: 408,
            fat: 3.2,
            carbs: 87,
            protein: 6.5,
          },
          {
            name: 'Donut',
            calories: 452,
            fat: 25.0,
            carbs: 51,
            protein: 4.9,
          },
          {
            name: 'KitKat',
            calories: 518,
            fat: 26.0,
            carbs: 65,
            protein: 7,
          },
        ]
      },
       
      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
      },

      deleteItemConfirm () {
        this.desserts.splice(this.editedIndex, 1)
        this.closeDelete()
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      closeDelete () {
        this.dialogDelete = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
    },
  }*/
</script>