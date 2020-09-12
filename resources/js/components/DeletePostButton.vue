<template>
    <div>
        <button class="btn btn-outline-danger ml-4" @click="deletePost">Delete Post</button>
    </div>
</template>

<script>
export default {
    props: ['post', 'userid'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function () {
        return {
        }
    },

    methods: {
        deletePost() {
            axios.delete('/p/' + this.post)
                .then(response => {
                    window.location = ('/profile/' + this.userid);
                })
                .catch(errors => {
                    if (errors.response.status == 401) {
                        // user was not logged in, ask them to be logged in
                        window.location = '/login';
                    }
                });
        }
    },

    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>
