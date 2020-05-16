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
			let response = await fetch(`${this.url}get_list`, {
				method: "GET",
			}).then((response) => response.json());
			console.log(response.data)
			if (response.status === 200) {
				this.items = response.data;
			} else {
				alert("เกิดข้อผิดพลาด ไม่สามารถดึงข้อมุลได้!");
			}
		},
		handleDelete: async function (id) {
			if (!confirm("ยืนยันการลบ ?")) return false;
			let response = await fetch(`${this.url}destroy/${id}`, {
				method: "DELETE",
			}).then((response) => response.json());
			if (response.status === 200) {
				this.items = this.items.filter(function (value, index, arr) {
					return value.id !== response.id;
				});
				alert("Delete success!");
			} else {
				alert("Delete fail!");
			}
		},
		updateStatus: async function (id) {
			let response = await fetch(`${this.url}status`, {
				method: "PUT",
				body: JSON.stringify({ id: 12 }),
			}).then((response) => response.json());
			console.log(response);
		},
		toAddPage: function () {
			window.location.href = `${this.url}add`;
		},
		toEditPage: function (id) {
			window.location.href = `${this.url}edit/${id}`;
		},
	},
});
