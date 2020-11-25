<script>

import axios from 'axios';

    export default {
        data (){
            return{
                materias: []
            }
        },
        mounted() {
            this.getMaterias();
            console.log('se carga la función o el array geMaterias y el axios')
        },

        methods: {
            getMaterias: function () {
                 axios.get('https://pokeapi.co/api/v2/pokemon').then(response => {
                    this.materias = response.data.results
                    console.log (this.materias);
                });
            }
        }
    }
</script>
