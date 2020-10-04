<template>
    <Master>
        <div class="container col-md-10 col-sm-12">
            <v-simple-table dark>
                <template v-slot:default>
                    <thead>
                        <tr>
                            <th class="text-left">Name</th>
                            <th class="text-left">Email</th>

                            <th class="text-right">
                                <inertia-link :href="route('profile.edit')"
                                    class="btn btn-sm btn-info rounded-bl-pill text-white"
                                >
                                    {{ $page.auth_user.name }}
                                </inertia-link>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users" :key="user.id">
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>

                            <!-- for action edit || delete -->
                            <td>
                                <!-- <inertia-link :href="route('user.profile.show',user.id)">
                                <v-icon class="text-warning">mdi-account-edit</v-icon>
                            </inertia-link>
                            &nbsp;&nbsp;&nbsp; -->
                                <inertia-link
                                    @click="deleteUser(index, user.id)"
                                >
                                    <v-icon class="text-danger"
                                        >mdi-delete-outline</v-icon
                                    >
                                </inertia-link>
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </div>
    </Master>
</template>
<script>
import Master from "../Layout/Master";
import axios from "axios";
export default {
    name: "UserProfile",
    components: { Master },

    data() {
        return {
            users: []
        };
    },
    created() {
        this.users = this.$page.users;
    },
    methods: {
        deleteUser(index, user_id) {
            axios.get(this.route("user.delete", user_id)).then(res => {
                if (res.data.success) {
                    this.users.splice(index, 1);
                    this.$toastr.s("User Deleted!");
                }
            });
        }
    }
};
</script>
