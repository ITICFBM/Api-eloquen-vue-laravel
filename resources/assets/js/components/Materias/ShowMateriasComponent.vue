
<template>
    <div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modificación De Materia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Materia:</label>
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Actualizar</button>
                                            </div>
                                            </div>
                                        </div>
                            </div>
    </div>
</template>


<script>
import axios from 'axios';
//import { Bus } from '../../app.js';

    export default {
        data (){
            return{
                materia: [],
            }
        },
        mounted() {
            this.getPokemons();
            console.log('se carga la función o el array Cargar Materias y el axios')
        },

        methods: {
        cargarMateria(materiaid){
          //let programaid = this.programa.id;
          let url = 'materias/' + materiaid;
          axios.get(url).then(response=>{
            if(response.data.error){
              //manejo de error
            }else{
              this.materia=reponse.data.materia;
            }
          });
        }  
            
    }
}
</script>
