<template>
    <v-app fixed>
        <Appbar/>
        <v-content>
            <v-container fluid>
                <slot/>
            </v-container>
        </v-content>
        
    </v-app>
</template>
<script>
import Appbar from './Appbar'
export default {
    name:"Master",
    components:{Appbar}
}
</script>