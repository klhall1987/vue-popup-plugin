<template>
    <div>
        <FormulateInput
        @click="show"
        type="button"
        label="Buy it now"
        />
        <modal 
            name="login"
            classes="vpup-modal"
            height="48%"
            width="42%"
            >
            <slot name="header"></slot>
            <div class="vpup-content">
                <h3>Ready To Get Started?</h3>
                <p>Help us understand what you're looking for so we can point you in the right direction.</p>
            </div>
            <div class="vpup-button-footer">
                <FormulateInput
                type="button"
                label="I am signing up myself"
                />
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
        shouldClose: function( value ) {
            if( value ) {
                this.hide();
            } 
        }
    },
    methods: {
        show () {
            this.$modal.show('login');
        },
        hide () {
            this.$modal.hide('login');
        },
        openNextStep () {
            this.$emit( 'nextStep', true )
            this.hide();
        }
    }
}
</script>
