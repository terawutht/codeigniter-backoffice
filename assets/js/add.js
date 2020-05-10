new Vue({
    el: '#add',
    data: {
        isErrorName:false,
        full_name: "",
        isErrorEmail:false,
        email: "",
        status: "enable",
        url: window.url,
    },
    methods: {
        checkForm: function(e) {
            if (this.full_name && this.email) {
                return true;
            }

            this.errors = [];

            if (!this.full_name) {
                this.isErrorName = true
            
            }
            if (!this.email) {
                this.isErrorEmail = true
            }

            e.preventDefault();
        },

    }


})