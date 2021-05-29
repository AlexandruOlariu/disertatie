<template>
    <div>
        <div>Hellowwwwwwwww</div>
        <v-img
        :src="getAddress(post.url)"></v-img>
        <v-text-field v-model="post.title"></v-text-field>
        <v-text-field v-model="post.description"></v-text-field>
    </div>
</template>

<script>
export default {
    props:["ids"],
    name: "ViewAPost",
    data() {
        return {
            post_id: this.ids,
            post: {}
        }
    },
    methods:{
        getMyPost(){
            axios.post("./post/"+this.post_id).then(res=>{
                this.post=res.data;
            }).catch(err=>{
                console.log(err);
            })
        },
        getAddress(value){
            return "./storage/"+value;
        }
    },
    created(){
        this.getMyPost();
    }

}
</script>

<style scoped>

</style>
