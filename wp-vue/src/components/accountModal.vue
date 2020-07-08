<template>
    <div>
        <modal 
            name="accountModal"
            classes="vpup-modal"
            height="73%"
            width="45%"
        >
            <slot name="header"></slot>
            <div class="vpup-account-modal-title">
                <h4>What is an admin account?</h4>
                <p>The admin account is best suited for practice and team leaders who wish to register two or more team members for any of the Fear Free Certification Programs. The admin account is intended to serve as a purchasing and management tool for the individual overseeing their team's progress with Fear Free. Please note what limitations the admin account will have below.</p>
            </div>
            <div class="vpup-account-modal-content">
                <div class="vpup-account-column">
                    <p><strong>What the admin account can do:</strong></p>
                    <p>Purchase registrations and renewals for team members</p>
                    <p>Add and manage team members</p>
                    <p>Apply purchase renewals to current team members</p>
                </div>
                <div class="vpup-account-column">
                    <p><strong>What the admin acount cannot do</strong></p>
                    <p>Enroll in or complete any courses</p>
                    <p>Access all member benfits</p>
                    <p>Become certified</p>
                </div>
            </div>
            <div class="vpup-account-footer">
                <FormulateInput
                @click="openProductModal"
                type="button"
                label="Next"
                />
            </div>
        </modal>
    </div>
</template>

<script>

export default {
    name: 'accountModal',
    props: [ 'openAccountModal', 'shouldClose' ],
    data () {
        return {
            close: false,
        }
    },
    watch: {
        openAccountModal: function( value ) {
            if( value ) {
                this.show();
            } 
        },
        shouldClose: function( value ) {
            if( value ) {
                this.close = false;
                this.hide();
            } 
        }
    },
    methods: {
        show () {
            this.$modal.show('accountModal');
        },
        hide () {
            this.$modal.hide('accountModal');
        },
        openProductModal () {
            this.$emit( 'openProductModal', true );
            this.hide();
        }
    }
}
</script>
