<template>
    <Master>
        <div class="offset-md-1 col-md-10 rounded">
            <v-card class="p-4">
                <v-card-title>
                    <v-icon>mdi-account-edit</v-icon>
                    &nbsp;&nbsp;Edit Profile
                </v-card-title>

                <v-divider></v-divider>
                <v-container>
                    <form @submit.prevent="update" class="mr-md-4">
                        <div class="form-group row">
                            <label
                                for="name"
                                class="col-md-2 col-sm-4 pl-md-7 pl-0"
                                >Name</label
                            >

                            <input
                                type="name"
                                v-model="name"
                                class="form-control col-md-4 col-lg-4 col-sm-8 mb-5 text-field "
                            />

                            <label
                                for="email"
                                class="col-md-2 col-sm-4 pl-md-7 pl-0"
                                >Email</label
                            >

                            <input
                                type="email"
                                v-model="email"
                                class="form-control col-md-4 col-lg-4 col-sm-8 mb-5 text-field"
                            />

                            <label
                                for="password"
                                class="col-md-2 col-sm-4 pl-md-7 pl-0"
                                >Password</label
                            >

                            <input
                                type="password"
                                v-model="password"
                                class="form-control col-md-4 col-lg-4 col-sm-8 mb-5 text-field"
                            />

                            <label
                                for="image"
                                class="col-md-2 col-sm-4 pl-md-7 pl-0"
                                >Image</label
                            >

                            <input
                                type="file"
                                @change="selectImage"
                                class="form-control col-md-4 col-lg-4 col-sm-8 mb-5 text-field"
                            />
                            <img
                                class="col-md-2 col-sm-4 pl-md-7 pl-0"
                                :src="$page.auth_user.image"
                                width="20%"
                                alt=""
                            />
                            <div class="clearfix">
                                <button
                                    class="button float-right btn btn-sm btn-primary rounded-lg"
                                >
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </v-container>
            </v-card>
        </div>
    </Master>
</template>
<script>
import Master from "../Layout/Master";
export default {
    name: "EditUser",
    components: { Master },
    props:{edit_user:Object},
    data() {
        return {
            name: "",
            email: "",
            password: "",
            image: ""
        };
    },
    created() {
        const { name, email } = this.$page.auth_user;
        this.name = name;
        this.email = email;
        
        
    },
    methods: {
        selectImage(e) {
            this.image = e.target.files[0];
            console.log(this.image);
        },
        update() {
            var data = new FormData();
            data.append("name", this.name);
            data.append("email", this.email);
            data.append("password", this.password);
            data.append("image", this.image);
            this.$inertia.post("/profile/edit", data).then(value => {
             this.$toastr.s(this.$page.flash.success);
            });
        }
    }
};
</script>
