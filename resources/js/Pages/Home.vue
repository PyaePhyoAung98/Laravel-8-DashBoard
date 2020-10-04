<template>
    <Master>
        <v-container>
            <v-row>
                <v-col cols="12" sm="12" md="6">
                    <v-card>
                        <v-card-title>Sparkline</v-card-title>

                        <v-sparkline
                            :value="value"
                            :gradient="gradient"
                            :smooth="radius || false"
                            :padding="padding"
                            :labels="value"
                            :line-width="width"
                            :stroke-linecap="lineCap"
                            :gradient-direction="gradientDirection"
                            :fill="fill"
                            :type="type"
                            :auto-line-width="autoLineWidth"
                            auto-draw
                        ></v-sparkline>
                    </v-card>
                </v-col>
                <v-col cols="12" sm="12" md="6">
                    <v-card>
                        <v-card-title>Sparkline</v-card-title>

                        <v-sparkline
                            :value="value"
                            :gradient="gradient"
                            :smooth="radius || false"
                            :padding="padding"
                            :labels="value"
                            :line-width="width"
                            :stroke-linecap="lineCap"
                            :gradient-direction="gradientDirection"
                            :fill="fill"
                            :type="type"
                            :auto-line-width="autoLineWidth"
                            auto-draw
                        ></v-sparkline>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </Master>
</template>
<script>
import Master from "../Layout/Master";
const gradients = [
    ["#222"],
    ["#42b3f4"],
    ["red", "orange", "yellow"],
    ["purple", "violet"],
    ["#00c6ff", "#F0F", "#FF0"],
    ["#f72047", "#ffd200", "#1feaea"]
];

export default {
    name: "Home",
    components: { Master },
    data: () => ({
        width: 2,
        radius: 10,
        padding: 8,
        lineCap: "round",
        gradient: gradients[5],
        value: [0, 2, 5, 9, 5, 10, 3, 5, 0, 0, 1, 8, 2, 9, 0],
        gradientDirection: "top",
        gradients,
        fill: false,
        type: "trend",
        autoLineWidth: false
    }),
       created() {
        if (this.$page.flash.success) {
            this.$toastr.s(this.$page.flash.success);
        }
    },
};
</script>
