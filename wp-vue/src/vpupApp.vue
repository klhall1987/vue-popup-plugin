<template>
    <div id="vpup-app">
        <!-- Outputs our vpupLogin component -->
        <vpupLogin 
            :atts="atts"
            @nextStep="triggerAccountModal"
        >
            <!-- Slots in our header -->
            <template v-slot:header>
                <!-- Pass in our header component -->
                <vpup-header 
                :atts="atts"
                :showLogin="true"
                @clicked="triggerClose"
            />
            </template>
        </vpupLogin>

        <!-- Inits our account modal component -->
        <accountModal
            :atts="atts"
            :openAccountModal="openAccountModal"
            :shouldClose="closeModal"
            @openProductModal="triggerProductModal"
        >
            <!-- Slot in our header -->
            <template v-slot:header>
                <!-- Pass in our header component -->
                <vpup-header 
                :atts="atts"
                :showLogin="false"
                @clicked="triggerClose"
            />
            </template>
        </accountModal>

        <!-- Inits our product modal components -->
        <productModal
            :atts="atts"
            :openProductModal="openProductModal"
            :shouldClose="closeModal"
        >
            <!-- Slot in our header -->
            <template v-slot:header>
                <!-- Pass in our header component -->
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

// Get our localized php data
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
        // Listen for emitters and close modals
        triggerClose ( isTriggered ) {
            this.closeModal = isTriggered; 

            // This was to fix bug where emitters were only firing once. 
            // TODO: come up with better solution for this. 
            this.$modal.hide( 'login' )
            this.$modal.hide( 'accountModal' )
            this.$modal.hide( 'productModal' )
        },
        // Listen for emitter and open the account modal
        triggerAccountModal ( value ) {
            // TODO: possibly get rid of emitter value
            this.openAccountModal = value;
            this.$modal.show( 'accountModal' )
        },

        // Listen for emitter and open product modal
        triggerProductModal ( value ) {
            // TODO: possibly get ride of emitter value
            this.openProductModal = value
            this.$modal.show( 'productModal' );
        }
    }
}
</script>


