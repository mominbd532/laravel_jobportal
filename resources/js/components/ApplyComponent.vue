<template>
    <form @submit="formSubmit">

        <button v-if="show"  class="btn btn-primary  py-2 px-4">Apply</button>
        <div v-else class="alert alert-success">
            <p>Job Applied Successfully</p>

        </div>

    </form>
</template>

<script>
    export default {
        props: ['jobid'],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                show: true
            }
        },
        methods: {
            formSubmit(e){
                e.preventDefault();
                axios.post(/application/+this.jobid,{
                }).then((response)=>{
                    this.show=false
                });
            }


        }
    }
</script>
