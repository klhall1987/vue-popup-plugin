<template>
    <div>
        <!-- Init our modal -->
        <modal 
            name="productModal"
            classes="vpup-modal"
            height="98%"
            width="50%"
        >
            <!-- Pass in the header -->
            <slot name="header"></slot>

            <!-- Set title section -->
            <div class="vpup-account-title">
                <h4>Select your membership(s)</h4>
                <p>Select the membership(s) you would like to purchase for yourself and/or your team members. all pricing is reflected in cart. <a href="#">View pricing page.</a></p>
            </div>

            <!-- Vet Cert Section -->
            <div class="vpup-product-container">

                <!-- Product title -->
                <div class="vpup-product-title">
                    <i class="fa fa-user-md" aria-hidden="true"></i>
                    <p>Veterinary Professional Membership(includes all Veterinary Program</p>
                </div>

                <!-- Start First Product -->
                <div class="vpup-product">
                    <p>Team members start with Veterinary Certification Program</p>
                    <!-- Minus button wrapper -->
                    <span class="vpup-minus-button">
                        <!-- Minus Button -->
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceVetCertQuantity"
                        >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                    
                    <!-- Number field wrapper -->
                    <span class="vpup-number-field">
                        <!-- Number field, bound to vetCertQuantity -->
                        <FormulateInput
                            type="text"
                            name="product 1"
                            inputmode="numeric"
                            placeholder="0"
                            min="0"
                            max="100"
                            v-model="vetCertQuantity"
                        >
                        </FormulateInput>
                    </span>

                    <!-- Plus button wrapper -->
                    <span class="vpup-plus-button">
                        <!-- Plus button element -->
                        <FormulateInput
                            type="button"
                            @click="vetCertQuantity++"
                        >
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>

                <!-- End First Product -->
                </div>
            

                <!-- Start Second Product -->
                <div class="vpup-product">
                    <p>Team members start with Veterinary Certification Program - Avian</p>
                    <!-- Minus button wrapper -->
                    <span class="vpup-minus-button">
                        <!-- Minus button element -->
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceVetCertAvianQuantity"
                        >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                
                    <!-- Number field wrapper -->
                    <span class="vpup-number-field">
                        <!-- Number field element bout to vetCertAvianQuantity -->
                        <FormulateInput
                            type="text"
                            name="product 1"
                            inputmode="numeric"
                            :wrapper-class="[ 'productInput' ]"
                            placeholder="0"
                            min="0"
                            max="100"
                            v-model="vetCertAvianQuantity"
                        >
                        </FormulateInput>
                    </span>

                    <!-- Plus button wrapper -->
                    <span class="vpup-plus-button">
                        <!-- Plus button element -->
                        <FormulateInput
                            type="button"
                            @click="vetCertAvianQuantity++"
                        >
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>

                <!-- End Second Product -->
                </div>
                
                <!-- Total quantity -->
                <div class="vpup-vet-total">
                    <p>Total Veterinary Memberships: {{ totalQuantity }}</p>
                </div>

            <!-- End of vet Cert section -->
            </div>

            <!-- Groomer Cert Section -->
            <div class="vpup-product-container">
                <!-- Product title -->
                <div class="vpup-product-title">
                    <i class="fa fa-scissors" aria-hidden="true"></i>
                    <p>Groomer Pet Professional Membership</p>
                </div>

                <!-- Start First Product -->
                <div class="vpup-product">
                    <p>Includes Groomer Cerification</p>

                    <!-- Minus button wrapper -->
                    <span class="vpup-minus-button">
                        <!-- Minus button element -->
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceGroomerQuantity"
                        >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                    
                    <!-- Number field wrapper -->
                    <span class="vpup-number-field">
                        <!-- Number field element -->
                        <FormulateInput
                            type="text"
                            name="product 3"
                            inputmode="numeric"
                            placeholder="0"
                            min="0"
                            max="100"
                            v-model="groomerQuantity"
                        >
                        </FormulateInput>
                    </span>

                    <!-- Plus button wrapper -->
                    <span class="vpup-plus-button">
                        <!-- Plus button element -->
                        <FormulateInput
                            type="button"
                            @click="groomerQuantity++"
                        >
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                </div>

            <!-- End Groomer Section -->
            </div>

            
            <!-- Trainer Cert Section -->
            <div class="vpup-product-container">

                <!-- Product title -->
                <div class="vpup-product-title">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <p>Animal Trainer Membership</p>
                </div>

                <!-- Start First Product -->
                <div class="vpup-product">
                    <p>Includes Animal Trainer Program</p>

                    <!-- Minus button wrapper -->
                    <span class="vpup-minus-button">
                        <!-- Minus button element -->
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceTrainerQuantity"
                        >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                    
                    <!-- Number field wrapper -->
                    <span class="vpup-number-field">
                        <!-- Number field element -->
                        <FormulateInput
                            type="text"
                            name="product 4"
                            inputmode="numeric"
                            placeholder="0"
                            min="0"
                            max="100"
                            v-model="trainerQuantity"
                        >
                        </FormulateInput>
                    </span>

                    <!-- Plus button wrapper -->
                    <span class="vpup-plus-button">
                        <!-- Plus button element  -->
                        <FormulateInput
                            type="button"
                            @click="trainerQuantity++"
                        >
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                </div>

            <!-- End Trainer Section -->
            </div>

            <!-- footer -->
            <div class="vpup-account-footer">
                <!-- Add to cart button -->
                <FormulateInput
                @click="setCart"
                type="button"
                label="Checkout"
            />
            </div>
        <!-- End modal -->
        </modal>
    </div>
</template>

<script>

export default {
    name: 'productModal',
    props: [ 'atts', 'openProductModal', 'shouldClose' ],
    data () {
        return {
            close: false,
            vetCertQuantity: 0,
            vetCertAvianQuantity: 0,
            groomerQuantity: 0, 
            trainerQuantity: 0
        }
    },
    computed: {
        // Keep track of our total quantity
        totalQuantity() {
            return this.vetCertQuantity + this.vetCertAvianQuantity;
        }, 
    },
    watch: {
        // Listen for our open modal emitter
        openProductModal: function( value ) {
            if( value ) {
                this.show();
            } 
        },
        // Listen for our close modal emiiter
        shouldClose: function( value ) {
            if( value ) {
                this.close = false;
                this.hide();
            } 
        },
    },
    methods: {
        // Build our cart url
        setCart() {
            let url = this.atts.url + '?vetCertQuantity=' + this.vetCertQuantity + '&vetCertAvianQuantity=' + this.vetCertAvianQuantity + '&groomerQuantity=' + this.groomerQuantity + '&trainerQuantity=' + this.trainerQuantity;
            window.location.href = url; 
        },
        // Reduct the quantity of our product
        reduceVetCertQuantity() {
            // Ensure the number doesn't go below 0
            if( Math.sign( this.vetCertQuantity ) ) {
                this.vetCertQuantity--
            }
        },
        // Reduce the quantity of our product
        reduceVetCertAvianQuantity() {
            // Ensure the number doesn't go below 0
            if( Math.sign( this.vetCertAvianQuantity ) ) {
                this.vetCertAvianQuantity--
            }
        },
        // Reduce the quantity of our product
        reduceGroomerQuantity() {
            // Ensure the number doesn't go below 0
            if( Math.sign( this.groomerQuantity ) ) {
                this.groomerQuantity--
            }
        },
        // Reduce the quantity of our product
        reduceTrainerQuantity() {
            // Ensure the number doesn't go below 0
            if( Math.sign( this.trainerQuantity ) ) {
                this.trainerQuantity--
            }
        },
        // Opens our modal when called
        show () {
            this.$modal.show('productModal');
        },
        // Hides our modal when called
        hide () {
            this.$modal.hide('productModal');
        },
    }
}
</script>
