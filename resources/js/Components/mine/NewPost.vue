<template>
<div>
    <v-input
    v-model:>

    </v-input>
</div>
</template>

<script>
export default {
    name: "NewPost",
    data(){
        return{
            post: {
                title: "",
                url: "",
                description: "",
                tag:"",
                hashtags:"",
            }
        }
    }
}
</script>

<style scoped>

</style>
