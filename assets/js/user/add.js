new Vue({
	el: "#add",
	data: {
		isErrorName: false,
		isVerity: false,
		full_name: "",
		isErrorEmail: false,
		email: "",
		password: "",
		confirmPassword: "",
		isErrorPassword: false,
		status: "disabled",
		group_id: "2",
		url: window.url,
	},
	methods: {
		checkForm: function (e) {
            e.preventDefault();
			this.isErrorPassword = this.password !== this.confirmPassword
			this.isErrorPassword = !this.password
			this.isErrorName = !this.full_name
            this.isErrorEmail = !this.email
            if(this.isErrorPassword || this.isErrorPassword || this.isErrorName || this.isErrorEmail) return false
            this.isVerity = true;
            this.validationForm();
            //  if (this.full_name && this.email && this.password && !this.isErrorPassword) return true			
        },
		validationForm: async function () {
			try {
				let formData = new FormData();
				formData.append("email",  this.email);
				formData.append("full_name", this.full_name);
				const response = await fetch(`${this.url}verify_form_add`, {
					method: "POST",
					body: formData,
				}).then((res) => res.json());
				console.log(response);
				if (response.status === 200) {
                    this.isVerity = false;
                    if(response.data.email) alert('อีเมลซ้ำ')
                    if(response.data.full_name) alert('ชื่อ-นามสกุลซ้ำ')
				} else {
					alert("เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมุลได้!");
					this.isVerity = false;
				}
			} catch (error) {
				alert("เกิดข้อผิดพลาด ไม่สามารถเพิ่มข้อมุลได้!");
				this.isVerity = false;
				console.log("error:", error);
			}
		},
	},
});
