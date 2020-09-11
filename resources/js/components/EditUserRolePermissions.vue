<template>
    <div>
        <li class="nav-item dropdown" style="list-style-type: none">
            <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"
               v-text="roleText">
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <button class="dropdown-item" href="#" @click="editPermissions('general')">
                    General
                </button>
                <button class="dropdown-item" href="#" @click="editPermissions('admin')">
                    Admin
                </button>
            </div>
        </li>
    </div>
</template>

<script>
export default {
    props: ['userId', 'userRole'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function () {
        return {
            status: this.userRole,
        }
    },

    methods: {
        editPermissions(role) {
            const json = '{ role: "' + role + '"]';
            axios.post('/role/' + this.userId, {
                role,
            })
                .then(response => {
                    this.status = response.data;
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
        roleText() {
            return this.status;
        }
    }
}
</script>
