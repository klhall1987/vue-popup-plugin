<template>
    <div>
        <!-- Add inital button to page -->
        <FormulateInput
            @click="show"
            type="button"
            label="Buy it now"
        />
        <!-- Open our modal -->
        <modal 
            name="login"
            classes="vpup-modal"
            height="48%"
            width="42%"
        >
            <!-- Add a slot for our header -->
            <slot name="header"></slot>
            <!-- Content for the first modal -->
            <div class="vpup-content">
                <h3>Ready To Get Started?</h3>
                <p>Help us understand what you're looking for so we can point you in the right direction.</p>
            </div>
            <!-- Footer -->
            <div class="vpup-button-footer">
                <!-- button -->
                <FormulateInput
                type="button"
                label="I am signing up myself"
            />
                <!-- button -->
                <FormulateInput
                @click="openNextStep"
                type="button"
                label="I am signing up myself and others"
            />
            </div>
        </modal>
    </div>
</template>

<script>

export default {
    name: 'vpupLogin',
    props: [ 'atts', 'shouldClose' ],
    computed: {
        close: false
    },
    watch: {
        // Listens for an emiiter close modal
        shouldClose: function( value ) {
            if( value ) {
                this.hide();
            } 
        }
    },
    methods: {
        // Controller to open modal
        show () {
            this.$modal.show('login');
        },
        // Controller to hide modal
        hide () {
            this.$modal.hide('login');
        },
        // Emits bool to open next modal
        openNextStep () {
            this.$emit( 'nextStep', true )
            this.hide();
        }
    }
}
</script>
