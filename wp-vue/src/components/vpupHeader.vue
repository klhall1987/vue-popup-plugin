<template>
    <div class="vpup-header">
        <img :src="logoURL" />
        <div class="vpup-login">
            <p v-if="showLogin">Already have an account? <a href="#">Login.</a></p>
            <a href="#" @click="closeModal"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
    </div>
</template>

<script>

export default {
    name: 'vpupHeader',
    props: [ 'atts', 'showLogin' ],
    methods: {
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
