<template>
<div>
    <button @click="showMyData=!showMyData">Insert new data</button>
    <br>
    <div v-if="showMyData">
    <div class="form-group">
    <form @submit.prevent="submit" enctype="multipart/form-data">
        <br/>
        <div>
            <label>Title</label>
            <input class="form-control" name="name" placeholder="Title" type="text" v-model="post.title">
        </div>
        <br/>
        <div>
            <label>Description</label>
            <input class="form-control" name="description" placeholder="Description" type="text" v-model="post.description">
        </div>
        <br/>
        <div>
            <label>Tag</label>
            <input class="form-control" name="tag" placeholder="Tag" type="text" v-model="post.tag">
        </div>
        <br/>
        <div>
            <label>Alt</label>
            <input class="form-control" name="alt" placeholder="Alt" type="text" v-model="post.alt">
        </div>
        <br/>
        <div>
            <label>Category</label>
            <input class="form-control" name="category" placeholder="Category" type="text" v-model="post.category">
        </div>
        <br/>
        <div>
            <input @change="getimage($event)" class="img-thumbnail"  name="url" type="file">
        </div>
        <div>

        </div>
        <br/>
        <div>
            <button class="btn btn-primary" type="submit" :disabled="this.uploadInProgress">Insert</button>
        </div>
    </form>
    </div>
    </div>
</div>
</template>

<script>
import Label from "../Label";
export default {
    name: "NewPost",
    components: {Label},
    data(){
        return{showMyData:false,
            uploadInProgress:false,
            post: {
                title: "Rusu",
                url: "url",
                description: "acilea",
                tag:"",
                alt:"Image with ",
                category:"astrofotografie",
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
            data.append('alt',this.post.alt);
            data.append('category',this.post.category);
           if(this.url){
               if(this.url.size>=0){
                   this.uploadInProgress=true;
                   data.append('url',this.url);
               }
           }
           data.append('_method','POST');
           axios.post("./post",data).then(res=>{
               if(res.data=="ok"){
               console.log(res.data);
               this.showMyData = false;
                   this.uploadInProgress=false;
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
