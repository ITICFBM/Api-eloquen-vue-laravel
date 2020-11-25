<script>

import axios from 'axios';

    export default {
        data (){
            return{
                pokemons: []
            }
        },
        mounted() {
            this.getPokemons();
            console.log('se carga la función o el array getPokemons y el axios')
        },

        methods: {
            getPokemons: function () {
                 axios.get('http://127.0.0.1:8001/api/materias').then(response => {
                    this.pokemons = response.data.materias
                    console.log (this.pokemons);
                });
            }
        }
    }
</script>
