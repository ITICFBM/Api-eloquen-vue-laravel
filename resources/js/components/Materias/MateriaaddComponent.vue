<script>
//import { Bus } from "../../app.js"
export default {
  data(){
    return{
    nuevamateria:{
      nombre:""
    },
  }
},
 
  mounted() {
  //this.cargarDias();
},

  methods:{
    CrearMateria(){
      //this.iniciarPreloader();
      let url="api/materias";
      //let nuevodia=this.nuevodia;
      axios.post(url,this.nuevamateria).then(resp=>{
        if(resp.data.error){
          //manejo de error
            toast.warnig('No se encontraron registro para la tabla Materias');
        }else{
          this.nuevamateria.nombre=""; 
          //this.ocultarLoader();
          toastr.success('Materia Guardado Correctamente','OK');
          //Bus.$emit('cargarLista');
        }
      }).catch(error=>{
          console.log(error);
        /** this.ocultarLoader();
        console.log(error.response);
        if(error.response.status == 422){
          $.each(error.response.data,function(key,value){
            toastr.warning(value,{timeOut:10000});
          });
        }**/
      });

    }
  }
}
</script>