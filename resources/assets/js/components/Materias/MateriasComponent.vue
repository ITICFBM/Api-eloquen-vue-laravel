<template>
    <div>
          <div class="row justify-content-between">
                <div class="col-4">
                            <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center btn btn-primary"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>

            <table class="table">
                            <thead class="thead-dark">

                            <tr>
                                <th scope="col">Clave</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="materia in materias" :key="materia.id">
                                <td v-text="materia.id"></td>
                                <td v-text="materia.nombre"></td>
                                <td>
                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-secondary" v-on:click="updateid(materia)"><i class="fas fa-pen"></i></button>
                                <button data-toggle="modal" data-target="#deletemateria" type="button" class="btn btn-danger" v-on:click="deleteid(materia)"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>
            </table>
            <!-- Modal para editar materia -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificación De Materia Desde un componente de vue</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="editarMateria()" >
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Materia:</label>
                                    <input type="text"  v-model="materiaedit.nombre" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button ttype="submit" name="action" class="btn btn-primary">Actualizar</button>
                                    <!--{{materiaedit}} -->                                 
                                </div>
                                </form>
                            </div>
                        
                            </div>

                        </div>

                </div>
            <!-- Modal para agrer materia -->
                <div class="modal fade" id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Alta De Materia Desde un componente de vue</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="CrearMateria()">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Materia:</label>
                                    <input type="text" v-model="nuevamateria.nombre" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="action" class="btn btn-primary">Guardar</button>
                                </div>
                                </form>
                            </div>
                        
                            </div>

                        </div>

                </div>
                <!-- delete materia -->
                <div class="modal fade" id="deletemateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Materia</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>¿Esta seguro que quieres eliminar la materia <span class="badge badge-pill badge-warning">{{materiadelete.nombre}}</span>?</h4>
                                <!--{{materiadelete}}-->                            
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" @click="deleteMateria(materiadelete.id)">Eliminar</button>
                            </div>
                            </div>
                        </div>
                        </div>
    </div>
</template>

<script>

    export default {
        data (){
            return{
                //array para obtener todos las materias
                materias: [],
                //array para obtener eliminar una materia materia
                materiadelete: [],
                //array para modificar una materia en especifico
                materiaedit: [],
                //guardar la materia
                nuevamateria:{
                    nombre:""
                }
             
            }
        },
        mounted() {
            this.getMaterias();
        },
        methods: {
            //función para obtener todas las materias de /api/materia con axios
            getMaterias: function(){
                 axios.get('materias').then(response => {
                    this.materias = response.data.materias
                });
            },
            //función para obtener el id de la materia
            updateid(id){
                this.materiaedit = id;
            },
            //función para editar Materia
            editarMateria(){
                //obtenemos el id de la materia
                let urlUpdate='materias/'+ this.materiaedit.id;
                //actualizamos la materia
                axios.put(urlUpdate,this.materiaedit).then(response =>{
                    //si hay un error se ejecuta el error
                if(response.data.error){
                    toastr.error("ocurrio un error");
                }else{
                    //se guarda  la materia y se manda mensaje de succes con toastr
                    toastr.info('La materia se actualizo'); // se ejecuta la alerta
                    //Se cierra el Modal
                    $('#exampleModal').modal('hide')

                }
                }).catch(error=>{

                });
            },
            //se obtiene el id para elimanar la materia
            deleteid(id){
                this.materiadelete =id; 
            },
            //metodo para eleminar la materia
            deleteMateria(id){
                //enpoint con el id de la materia
                let urldeleteMateria = 'materias/' + id;
                //eliminamos la materia
                axios.delete(urldeleteMateria,this.materiadelete).then (response=>{
                    if(response.data.error){
                    //mensaje de error si existe un errror
                    toast.error('ocurrio un error');
                }else{
                // se elimina la materia
                    toastr.info('La materia se elimino con exito '); // se ejecuta la alerta
                // se cierrra el modal 
                $('#deletemateria').modal('hide');

            }
            }).catch(error =>{
                toastr.error('error al actualizar');

            });
        },
        CrearMateria(){
            //declaramos la url
            let url="materias";
            //genermos el post para guardar la materia
            axios.post(url,this.nuevamateria).then(response=>{
               //pasamos el nombrela materia y guardamos 
                this.nuevamateria.nombre="";
                //cerramos el modal
                $('#guardarModal').modal('hide');
                toastr.success('La materia se guardo con exito'); // se ejecuta la alerta
                this.getMaterias();
            }).catch(error=>{
                toastr.error('error al guardar');
            });
         }
        },

    }
</script>
