<script>
    class Policy extends BaseClass {
        no_set = [];

        before(form) {
        }

        after(form) {
        }


        get submit_data() {
            let data = {
                title: this.title,
                status: this.status,
                home_status: this.home_status,
                content: this.content,
            }

            data = jsonToFormData(data);

            return data;
        }
    }
</script>
