<template>
    <div>
        <modal 
            name="productModal"
            classes="vpup-modal"
            height="98%"
            width="50%"
        >
            <slot name="header"></slot>
            <div class="vpup-account-title">
                <h4>Select your membership(s)</h4>
                <p>Select the membership(s) you would like to purchase for yourself and/or your team members. all pricing is reflected in cart. <a href="#">View pricing page.</a></p>
            </div>

            <!-- Vet Cert Section -->
            <div class="vpup-product-container">
                <div class="vpup-product-title">
                    <i class="fa fa-gg-circle" aria-hidden="true"></i>
                    <p>Veterinary Professional Membership(includes all Veterinary Program</p>
                </div>
                <!-- Start First Product -->
                <div class="vpup-product">
                    <p>Team members start with Veterinary Certification Program</p>
                    <span class="vpup-minus-button">
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceVetCertQuantity"
                            >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                    
                    <span class="vpup-number-field">
                        <FormulateInput
                            type="text"
                            name="product 1"
                            inputmode="numeric"
                            :wrapper-class="[ 'productInput' ]"
                            placeholder="0"
                            min="0"
                            max="100"
                            v-model="vetCertQuantity"
                            >
                        </FormulateInput>
                    </span>

                    <span class="vpup-plus-button">
                        <FormulateInput
                            type="button"
                            @click="vetCertQuantity++"
                            >
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                </div>
            <!-- End First Product -->

                <!-- Start Second Product -->
                <div class="vpup-product">
                    <p>Team members start with Veterinary Certification Program - Avian</p>
                    <span class="vpup-minus-button">
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceVetCertAvianQuantity"
                            >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                
                    <span class="vpup-number-field">
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

                    <span class="vpup-plus-button">
                        <FormulateInput
                            type="button"
                            @click="vetCertAvianQuantity++"
                            >
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                </div>
                <!-- End Second Product -->
                <div class="vpup-vet-total">
                    <p>Total Veterinary Memberships: {{ totalQuantity }}</p>
                </div>
            </div>

            <!-- Groomer Cert Section -->
            <div class="vpup-product-container">
                <div class="vpup-product-title">
                    <i class="fas fa-paw"></i>
                    <p>Groomer Pet Professional Membership</p>
                </div>
                <!-- Start First Product -->
                <div class="vpup-product">
                    <p>Includes Groomer Cerification</p>
                    <span class="vpup-minus-button">
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceGroomerQuantity"
                            >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                    
                    <span class="vpup-number-field">
                        <FormulateInput
                            type="text"
                            name="product 3"
                            inputmode="numeric"
                            :wrapper-class="[ 'productInput' ]"
                            placeholder="0"
                            min="0"
                            max="100"
                            v-model="groomerQuantity"
                            >
                        </FormulateInput>
                    </span>

                    <span class="vpup-plus-button">
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
                <div class="vpup-product-title">
                    <i class="fas fa-paw"></i>
                    <p>Animal Trainer Membership</p>
                </div>
                <!-- Start First Product -->
                <div class="vpup-product">
                    <p>Includes Animal Trainer Program</p>
                    <span class="vpup-minus-button">
                        <FormulateInput
                            type="button"
                            min="0"
                            @click="reduceTrainerQuantity"
                            >
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </FormulateInput>
                    </span>
                    
                    <span class="vpup-number-field">
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

                    <span class="vpup-plus-button">
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

            <div class="vpup-account-footer">
                <FormulateInput
                @click="redirectToCart"
                type="button"
                label="Checkout"
                />
            </div>
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
        totalQuantity() {
            return this.vetCertQuantity + this.vetCertAvianQuantity;
        }, 
    },
    watch: {
        openProductModal: function( value ) {
            if( value ) {
                this.show();
            } 
        },
        shouldClose: function( value ) {
            if( value ) {
                this.close = false;
                this.hide();
            } 
        },
    },
    methods: {
        redirectToCart() {
            let url = this.atts.url + '?vetCertQuantity=' + this.vetCertQuantity + '&vetCertAvianQuantity=' + this.vetCertAvianQuantity + '&groomerQuantity=' + this.groomerQuantity + '&trainerQuantity=' + this.trainerQuantity;
            window.location.href = url; 
        },
        reduceVetCertQuantity() {
            if( Math.sign( this.vetCertQuantity ) ) {
                this.vetCertQuantity--
            }
        },
        reduceVetCertAvianQuantity() {
            if( Math.sign( this.vetCertAvianQuantity ) ) {
                this.vetCertAvianQuantity--
            }
        },
        reduceGroomerQuantity() {
            if( Math.sign( this.groomerQuantity ) ) {
                this.groomerQuantity--
            }
        },
        reduceTrainerQuantity() {
            if( Math.sign( this.trainerQuantity ) ) {
                this.trainerQuantity--
            }
        },
        show () {
            this.$modal.show('productModal');
        },
        hide () {
            this.$modal.hide('productModal');
        },
    }
}
</script>
