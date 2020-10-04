<template>
    <div class="container mt-5">
        <div class="col-md-4 offset-4">
                            <div class="alert alert-success" v-show="$page.flash.success">{{$page.flash.success}}</div>
            <div class="card">
                <div class="card-header">Register User</div>
                <div class="card-body">
                    <form @submit.prevent="register">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                id="name"
                                type="text"
                                :class="[
                                    'form-control',
                                    errors.name ? 'border-danger' : ''
                                ]"
                                v-model="name"
                                placeholder="Enter User Name"
                            />
                            <small class="text text-danger">{{
                                errors.name
                            }}</small>
                        </div>
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
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input
                                id="image"
                                type="file"
                                @change="selectImage"
                                :class="[
                                    'form-control',
                                    errors.image ? 'border-danger' : ''
                                ]"
                                
                            />
                            <small class="text text-danger">{{
                                errors.image
                            }}</small>
                        </div>
                        <button class="btn btn-sm btn-danger float-right">
                            <div
                                class="spinner-border spinner-border-sm"
                                role="status"
                                v-show="loading"
                            >
                                <span class="sr-only"
                                    >Loading...</span
                                >
                            </div>
                           <span v-show="loading">wait...</span>
                           <span v-show="!loading">Reigster</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Register",
    props: { errors: Object },
    data() {
        return {
            name: "",
            email: "",
            password: "",
            image: "",
            loading: false
        };
    },
    methods: {
        selectImage(e) {
            this.image = e.target.files[0];
        },
        register() {
            this.loading = true;
            var data = new FormData();
            data.append("name", this.name);
            data.append("email", this.email);
            data.append("password", this.password);
            data.append("image", this.image);

            this.$inertia.post("/register", data).then(() => {
                this.loading = false;
            });
        }
    }
};
</script>
<style scoped>
#image{

  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  
  font-size: 10pt;
}
</style>
