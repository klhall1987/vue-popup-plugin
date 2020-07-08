<template>
    <div>
        <modal 
            name="productModal"
            classes="vpup-modal"
            height="70%"
            width="50%"
        >
            <slot name="header"></slot>
            <div class="vpup-account-title">
                <h4>Select your membership(s)</h4>
                <p>Select the membership(s) you would like to purchase for yourself and/or your team members. all pricing is reflected in cart. <a href="#">View pricing page.</a></p>
            </div>

            <!-- Vet Cert Section -->
            <div class="vpup-vet-cert">
                <div class="vpup-vet-title">
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

                <!-- Start First Product -->
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
                <!-- End First Product -->
                <div class="vpup-vet-total">
                    <p>{{ totalQuantity }}</p>
                </div>
            </div>

   


            <div class="vpup-account-footer">
                <FormulateInput
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
    props: [ 'openProductModal', 'shouldClose' ],
    data () {
        return {
            close: false,
            vetCertQuantity: 0,
            vetCertAvianQuantity: 0,
        }
    },
    computed: {
        totalQuantity() {
            return this.vetCertQuantity + this.vetCertAvianQuantity;
        }
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
        show () {
            this.$modal.show('productModal');
        },
        hide () {
            this.$modal.hide('productModal');
        },
    }
}
</script>
