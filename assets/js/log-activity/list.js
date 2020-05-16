var list = new Vue({
	el: "#list",
	data: {
		items: [],
		url: window.url,
	},
	created: function () {
		this.fetchData();
	},
	mounted: function () {
		// console.log(this.items)
	},
	methods: {
		fetchData: async function () {
			let response = await fetch(`${this.url}list`, {
				method: "GET",
            }).then((response) => response.json());
            console.log(response)
			if (response.status === 200) {
				this.items = response.data;
			} else {
				alert("เกิดข้อผิดพลาด ไม่สามารถดึงข้อมุลได้!");
			}
        },
        exportExcel : async function () {
             alert('EXCEL')
        }
	},
});