<template>
    
    <div class="container mt-3">
        <div class="alert alert-success" v-show="$page.flash.error">
            {{ $page.flash.error }}
        </div>
        <div class="col-md-4 offset-4">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                id="email"
                                type="email"
                                :class="[
                                    'form-control',
                                    errors.email ? 'border-danger' : ''
                                ]"
                                v-model="email"
                                placeholder="Enter Email"
                            />
                            <small class="text text-danger">{{
                                errors.email
                            }}</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input
                                id="password"
                                type="password"
                                :class="[
                                    'form-control',
                                    errors.password ? 'border-danger' : ''
                                ]"
                                v-model="password"
                                placeholder="Enter Password"
                            />
                            <small class="text text-danger">{{
                                errors.password
                            }}</small>
                        </div>
                        <inertia-link
                            :href="route('register')"
                            class="btn btn-sm btn-danger float-left"
                            >Register</inertia-link
                        >
                        <button class="btn btn-sm btn-danger float-right">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
export default {
    name: "Login",
    props: { errors: Object },
    data() {
        return {
            email: "",
            password: ""
        };
    },

    methods: {
        login() {
            var data = new FormData();
            data.append("email", this.email);
            data.append("password", this.password);
            this.$inertia.post("/login", data).then(() => {
              
            });
           
        }
    }
};
</script>
