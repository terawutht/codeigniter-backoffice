var list = new Vue({
	el: "#list",
	data: {
		items: [],
		num_rows: 0,
		url: window.url,
	},
	created: function () {
		this.fetchList()
			.then((response) => response.json())
			.then((response) => {
				if (response.status === 200) this.items = response.data;
			})
			.catch(() => console.log("Error occurred"));
		this.fetchNumRows()
			.then((response) => response.json())
			.then((response) => {
				if (response.status === 200) this.num_rows = response.data;
			})
			.catch(() => console.log("Error occurred"));
	},
	mounted: function () {
		console.log(this.num_rows);
	},
	methods: {
		fetchList: async function () {
			try {
				return await fetch(`${this.url}list`, { method: "GET" });
			} catch (error) {
				console.log("เกิดข้อผิดพลาด ไม่สามารถดึงข้อมุลได้!");
			}
		},
		fetchNumRows: async function (value) {
			try {
				return await fetch(`${this.url}num_rows`, { method: "GET" });
			} catch (error) {
				console.log("เกิดข้อผิดพลาด ไม่สามารถดึงข้อมุลได้!");
			}
		},
		exportExcel: function () {
			alert("EXCEL");
		},
	},
});
