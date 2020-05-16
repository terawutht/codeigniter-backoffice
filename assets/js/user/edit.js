new Vue({
    el: '#edit',
    data: {
        isErrorName:false,
        full_name: "",
        status: "disabled",
        group_id:"2",
        url: window.url,
        id: window.id,
    },
    created: function () {
		this.fetchData();
	},
    methods: {
        fetchData: async function () {
			let response = await fetch(`${this.url}get_row?id=${this.id}`, {
				method: "GET",
			}).then((response) => response.json());
			if (response.status === 200) {
                this.full_name = response.data.full_name
                this.group_id = response.data.group_id
                this.status = response.data.status
                this.email = response.data.email
			} else {
				alert("เกิดข้อผิดพลาด ไม่สามารถดึงข้อมุลได้!");
			}
		},
        checkForm: function(e) {
            if (this.full_name) return true
            this.isErrorName = !this.full_name
            e.preventDefault();
        },

    }


})