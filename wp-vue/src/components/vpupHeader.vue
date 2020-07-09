<template>
    <!-- Header Div -->
    <div class="vpup-header">
        <!-- Img bound with our logoURL -->
        <img :src="logoURL" />
        <div class="vpup-login">
            <!-- Listens for prop and shows/hides based of value -->
            <p v-if="showLogin">Already have an account? <a href="#">Login.</a></p>
            <!-- Close button in right corner of modal -->
            <a href="#" @click="closeModal"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
    </div>
</template>

<script>

export default {
    name: 'vpupHeader',
    props: [ 'atts', 'showLogin' ],
    methods: {
        // Emits clicked and the value of the close property.
        closeModal: function() {
            this.$emit( 'clicked', this.close )
        },
    },
    data: function() {
        return {
            logoURL: this.atts.siteURL + '/wp-vue/src/assets/img/FF-Corporate-Logo-Small-copy.png', 
            close : true,
        }
    },
}
</script>
