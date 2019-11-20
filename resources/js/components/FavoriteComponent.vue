<template>
    <div>

        <button v-if="show" @click.prevent="unsave()" style="width: 100%" class="btn btn-dark">UnSave Job</button>
        <button v-else @click.prevent="save()" style="width: 100%" class="btn btn-success">Save Job</button>
    </div>


</template>

<script>
    export default {
        props: ['jobid','favorited'],

        data(){
            return{
                show: true
            }
        },
        mounted() {
            this.show= this.favorited ? true:false
        },
        methods: {
          save(){
              axios.post('/save/'+this.jobid)
                  .then((response)=>this.show=true)
                  .catch(error=>alert('Error'))
          },
            unsave(){
                axios.post('/unSave/'+this.jobid)
                    .then((response)=>this.show=false)
                    .catch(error=>alert('Error'))
            }

        }

    }
</script>
