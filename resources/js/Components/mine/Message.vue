<template>
<div>
    <h1>Mesaje de la fani</h1>
    <v-data-table
    :headers="header"
    class="elevation-1"
    :items="messages"
    >
    </v-data-table>
</div>
</template>

<script>
export default {
    name: "Message",
    data(){
        return {
            messages: [],
            header:[
                {
                    text: "Nr Crt",
                    align: 'start',
                    sortable: true,
                    value: 'id',
                    class: 'subtitle-1 font-weight-bold secondary'
                },
                {
                    text: "Nume",
                    align: 'start',
                    sortable: true,
                    value: 'name',
                    class: 'subtitle-1 font-weight-bold secondary'
                },
                {
                    text: "Email",
                    align: 'start',
                    sortable: true,
                    value: 'email',
                    class: 'subtitle-1 font-weight-bold secondary'
                },
                {
                    text: "Message",
                    align: 'start',
                    sortable: true,
                    value: 'message',
                    class: 'subtitle-1 font-weight-bold primary'
                },
            ]
        }

    },
    mounted() {
        axios.get('./messages').then(res=>{
            this.messages=res.data;
        })
    }
}
</script>

<style scoped>

</style>
