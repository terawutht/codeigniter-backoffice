var list = new Vue({
    el: '#list',
    data: {
        items: [],
        url: window.url,
    },
    created: function() {
        this.fetchData()
    },
    mounted:function() {
       // console.log(this.items)
    },
    methods: {
        fetchData: function() {
            fetch(`${this.url}list`).then(response => response.json()).then(data => this.items = data);
        },
        handleDelete: async function(id) {
            let response = await fetch(`${this.url}destroy/${id}`, {
                method: 'DELETE',
            }).then(response => response.json());
            if(response.status === 200){
                this.items = this.items.filter(function(value, index, arr){ return value.id !== response.id});
                alert('Delete success!')
            }else{
                alert('Delete fail!')
            }
        },
        updateStatus:async function(id){
            let response = await fetch(`${this.url}updateStatus`, {
                method: 'PUT',
                body: JSON.stringify({id:12}),
            }).then(response => response.json());
            console.log(response)
        },
        toAddPage:function() {
            window.location.href = `${this.url}add`;
        },
    }
})