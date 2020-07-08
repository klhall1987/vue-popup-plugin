<template>
    <div id="vpup-app">
        <vpupLogin 
            :atts="atts"
            @nextStep="triggerAccountModal"
        >
            <template v-slot:header>
                <vpup-header 
                :atts="atts"
                :showLogin="true"
                @clicked="triggerClose"
                />
            </template>
        </vpupLogin>

        <accountModal
            :atts="atts"
            :openAccountModal="openAccountModal"
            :shouldClose="closeModal"
            @openProductModal="triggerProductModal"
        >
            <template v-slot:header>
                <vpup-header 
                :atts="atts"
                :showLogin="false"
                @clicked="triggerClose"
                />
            </template>
        </accountModal>

        <productModal
            :atts="atts"
            :openProductModal="openProductModal"
            :shouldClose="closeModal"
        >
            <template v-slot:header>
                <vpup-header 
                :atts="atts"
                :showLogin="false"
                @clicked="triggerClose"
                />
            </template>
        </productModal>

    </div>
</template>

<script>

import vpupLogin from './components/vpupLogin.vue'
import accountModal from './components/accountModal.vue'
import vpupHeader from './components/vpupHeader.vue'
import productModal from './components/productModal.vue'


let  element  =  document.querySelectorAll('[data-vpup-atts]')
let atts = JSON.parse( element[ 0 ].getAttribute( 'data-vpup-atts' ) );


export default {
    name: 'vpupApp',
    data: function() {
        return {
            closeModal : false,
            openAccountModal: false,
            openProductModal: false
        }
    },
    created: function() {
        this.atts = atts;
    },
    components: {
        vpupLogin,
        accountModal,
        vpupHeader,
        productModal
    },
    methods: {
        triggerClose ( isTriggered ) {
            this.closeModal = isTriggered; 

            this.$modal.hide( 'login' )
            this.$modal.hide( 'accountModal' )
            this.$modal.hide( 'productModal' )
        },
        triggerAccountModal ( value ) {
            this.openAccountModal = value;
            this.$modal.show( 'accountModal' )
        },
        triggerProductModal ( value ) {
            this.openProductModal = value
            this.$modal.show( 'productModal' );
        }
    }
}
</script>


