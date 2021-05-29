<template>
<div>
    <button @click="showMyData=!showMyData">Insert new data</button>
    <br>
    <div v-if="showMyData">
    <div class="form-group">
    <form @submit.prevent="submit" enctype="multipart/form-data">
        <div>
            <input class="form-control" name="name" placeholder="Title" type="text" v-model="post.title">
        </div>
        <br/>
        <div>
            <input class="form-control" name="description" placeholder="Description" type="text" v-model="post.description">
        </div>
        <br/>
        <div>
            <input @change="getimage($event)" class="img-thumbnail" name="url" type="file">
        </div>
        <div>

        </div>
        <br/>
        <div>
            <button class="btn btn-primary" type="submit">Insert</button>
        </div>
    </form>
    </div>
    </div>
</div>
</template>

<script>
export default {
    name: "NewPost",
    data(){
        return{showMyData:false,
            post: {
                title: "Rusu",
                url: "url",
                description: "acilea",
                tag:"",
                hashtags:"",
                category:"",
            }
        }
    },
    methods:{
        getimage(event) {
            this.url = event.target.files[0];
            //console.log(event.target.files[0])
        },
        submit(){
           const data=new FormData();
           data.append('title',this.post.title);
           data.append('description',this.post.description);
            data.append('tag',this.post.tag);
            data.append('hashtags',this.post.hashtags);
            data.append('category',this.post.category);
           if(this.url){
               if(this.url.size>=0){
                   data.append('url',this.url);
               }
           }
           data.append('_method','POST');
           axios.post("./post",data).then(res=>{
               if(res.data[0]=="ok"){
               console.log(res.data);
               this.showMyData = false;
               location.reload();}
               else{
                   console.log(res.data.err);
               }
           }).catch(err=>{
               console.log(err);
           })
        }
    }
}
</script>

<style scoped>

</style>
