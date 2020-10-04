<template>
    <div>
        <v-navigation-drawer
            class="nav"
            app
            v-model="drawer"
           
        >
        <!-- 
            //for mini-variant use in the v-navigation-drawer
             :mini-variant.sync="mini"
            expand-on-hover
            @mouseover="hover = true"
         -->
            <v-list-item class="" style="height:64px;background-color:#363B56;">
                <v-list-item-avatar style="margin-left:-8px;">
                    <v-img :src="$page.auth_user.image"></v-img>
                </v-list-item-avatar>
                <v-list-item-title style="color:#fff;"
                    >{{ $page.auth_user.name }}
                    <br />
                    <small style="color:#fff;">{{
                        $page.auth_user.email
                    }}</small>
                </v-list-item-title>
            </v-list-item>

            <v-list nav dense flat >
                <v-list-item link v-for="(item, index) in items" :key="index" >
                    <v-list-item-icon>
                        <v-icon style="color:#fff;">{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title style="color:#fff;">
                        <inertia-link
                            class="text-white"
                            :href="route(item.route)"
                            >{{ item.text }}</inertia-link
                        >
                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar
            app
            dark
            style="color:#fff;background-color:#121212;"
            sm="12"
        >
            <v-app-bar-nav-icon
                style="color:#fff;"
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>

            <v-toolbar-title>DashBoard</v-toolbar-title>
            <v-spacer></v-spacer>
           

            <v-badge color="green" content="6" style="margin-right:18px;">
                <v-icon style="color:#fff;">mdi-bell</v-icon>
            </v-badge>

            <v-btn icon style="color:#fff;">
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
        </v-app-bar>
    </div>
</template>
<script>
export default {
    data() {
        return {
            drawer: true,
            mini: true,

            items: [
                { icon: "mdi-home", text: "Home", route: "home" },

                {
                    icon: "mdi-account-edit",
                    text: "Edit Profile",
                    route: "profile.edit"
                },
                {
                    icon: " mdi-account-group",
                    text: "User Profile",
                    route: "users.profile"
                },
                { icon: "mdi-cog", text: "Settings", route: "settings" },
                {
                    icon: " mdi-account-group",
                    text: "About",
                    route: "about"
                },

                { icon: " mdi-logout-variant", text: "Logout", route: "logout" }
            ]
        };
    }
};
</script>
<style lang="scss" scoped></style>
