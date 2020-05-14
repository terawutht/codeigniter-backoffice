new Vue({
    el: '#add',
    data: {
        isErrorName:false,
        full_name: "",
        isErrorEmail:false,
        email: "",
        password: "",
        confirmPassword: "",
        isErrorPassword:false,
        status: "disabled",
        group_id:"2",
        url: window.url,
    },
    methods: {
        checkForm: function(e) {
            if (this.full_name && this.email && this.password && !this.isErrorPassword) return true
            this.isErrorPassword = this.password !== this.confirmPassword
            this.isErrorPassword = !this.password
            this.isErrorName = !this.full_name
            this.isErrorEmail = !this.email
            e.preventDefault();
        },

    }


})