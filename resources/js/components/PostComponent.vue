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
                 axios.get('https://pokeapi.co/api/v2/pokemon').then(response => {
                    this.pokemons = response.data.results
                    console.log (this.pokemons);
                });
            }
        }
    }
</script>
