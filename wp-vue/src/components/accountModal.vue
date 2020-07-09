<template>
    <div>
        <!-- Init our modal -->
        <modal 
            name="accountModal"
            classes="vpup-modal"
            height="75%"
            width="40%"
        >
            <!-- Slot in our header -->
            <slot name="header"></slot>

            <!-- Accoutn title -->
            <div class="vpup-account-modal-title">
                <h4>What is an admin account?</h4>
                <p>The admin account is best suited for practice and team leaders who wish to register two or more team members for any of the Fear Free Certification Programs. The admin account is intended to serve as a purchasing and management tool for the individual overseeing their team's progress with Fear Free. Please note what limitations the admin account will have below.</p>
            </div>

            <!-- Account content -->
            <div class="vpup-account-modal-content">
                <!-- First column -->
                <div class="vpup-account-column">
                    <p><strong>What the admin account can do:</strong></p>
                    <p>Purchase registrations and renewals for team members</p>
                    <p>Add and manage team members</p>
                    <p>Apply purchase renewals to current team members</p>
                </div>
                <!-- Second column -->
                <div class="vpup-account-column">
                    <p><strong>What the admin acount cannot do</strong></p>
                    <p>Enroll in or complete any courses</p>
                    <p>Access all member benfits</p>
                    <p>Become certified</p>
                </div>
            </div>

            <!-- Modal footer -->
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
        // Listen for emitter to open modal
        openAccountModal: function( value ) {
            if( value ) {
                this.show();
            } 
        },
        // Listen for emitter to close modal
        shouldClose: function( value ) {
            if( value ) {
                this.close = false;
                this.hide();
            } 
        }
    },
    methods: {
        // Shows our modal when called
        show () {
            this.$modal.show('accountModal');
        },
        // Hides our modal when called
        hide () {
            this.$modal.hide('accountModal');
        },
        // Emits bool to open next modal
        openProductModal () {
            this.$emit( 'openProductModal', true );
            this.hide();
        }
    }
}
</script>
