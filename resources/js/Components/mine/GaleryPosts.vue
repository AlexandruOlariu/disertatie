<template>
<div>
    <v-row>
        <v-col class="col-md-6" v-for="post in posts" :key="post.id">
             <v-card>
                    <div class="featured-item">
                         <a :href="getPost(post.id)">
                                 <img :src="getAddress(post.url)" alt="">
                         </a>
                         <div class="down-content">
                                 <h4>{{ post.title }}</h4>
                                 <h6>{{post.description}}</h6>
                         </div>
                     </div>
            </v-card>
        </v-col>
    </v-row>
 </div>
</template>

<script>
export default {
name: "GaleryPosts",
    data(){
    return{
        posts:[]
        }
    },
    created() {
        axios.get("./post").then(res=>{
            this.posts=res.data;
            console.log(this.posts);
        }).catch(err=>{
            console.log(err);
        })
    },
    mounted() {
    console.log('montat');
    },
    methods:{
        getPost(value){
            return "./post/"+value;
        },
        getAddress(value){
            return "./storage/"+value;
        }
    }
}
</script>

<style scoped>

</style>
