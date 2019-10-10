<template>
    <transition name="modal">
        <div>
            <div :class="'modal ' + modalClasses" tabindex="-1" role="dialog" aria-labelledby="Modal" style="display: block" @click.stop="closeBackdrop">
                <div :class="'modal-dialog ' + modalSizeClasses" role="document" @click.stop="">
                    <div class="modal-content">

                        <div class="modal-header" v-if="hasHeader">
                            <h5 class="modal-title">{{ title }}</h5>

                            <button type="button" class="close" aria-label="Close" @click="close">
                                <span aria-hidden="true">&times;</span>
                                
                            </button>
                        </div>
                         <div class="modal-body">
                         

                        <form @submit.prevent="addNote" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('password_updated')" />

      <!-- Password -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">{{ $t('note') }}</label>
        <div class="col-md-7">
        <textarea  v-model="form.note"  class="form-control " :class="{ 'is-invalid': form.errors.has('note') }"  name="note" rows="10"></textarea>
          <has-error :form="form" field="note" />
        </div>
      </div>

     

      <!-- Submit Button -->
      <div class="form-group row">
        <div class="col-md-9 ml-md-auto">
       <v-button :loading="form.busy" type="success" >
                                {{ $t('add') }}
                            </v-button>
        </div>
      </div>
    </form>


                        </div>

                       <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="close">Cancel</button>
                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-backdrop show"></div>
        </div>
    </transition>
</template>


<script type="text/babel">
import Form from 'vform';
const axios = require('axios').default;
    export default {
        props: {
            "title": {default: ""},
            "modalClasses": {default: ""},
            "isLarge": {default: false},
            "isSmall": {default: false},
            "hasHeader": {default: true},
            "backdropClose": {default: true},
            "backdropCloseConfirm": {default: false},
            "backdropCloseConfirmText": {default: "Are you sure?"},
            "phoneId": {default: 1},
            "indexColumn":{default: 1},
          
        },
        data() {
            return {
                   form: new Form({note: ''}),
                   phone:{}
            }
        },
        methods: {
            close() {
                this.$emit("close");
            },
            closeBackdrop() {
                if (!this.backdropClose) {
                    return false;
                }
                if (this.backdropCloseConfirm && !confirm(this.backdropCloseConfirmText)) {
                    return false;
                }
                this.close();
            },
        
         addNote () {
              this.form.post('api/phones/add_action_note/'+this.phoneId)
                .then(({ data }) => { console.log(data) })
            this.form.reset();
             this.$emit("close");
        },
        getResult(){
            	axios.get('api/phones/get_action_data/'+this.phoneId)
				.then(response => {
					 this.phone = response.data.data;
                      if(this.phone !=null   ){
                        this.form.note=this.phone.note; 
                         console.log("this.form.note",this.form.note) 
                        }
                     
				}).catch(function (error) {
            // handle error
            
              console.log(error);
          });

          
        }
            
        },
        computed: {
            modalSizeClasses() {
                if (this.isLarge) {
                    return "modal-lg";
                }
                if (this.isSmall) {
                    return "modal-sm";
                }
                return "";
            }
        },
        mounted() {
            this.getResult();
        },
        destroyed() {
        }
    }
</script>


<style lang="scss" scoped>
    .modal {
        overflow-x: hidden;
        overflow-y: auto;
    }
    button.close {
        cursor: pointer;
    }
    /* Transitions */
    .modal-enter-active, .modal-leave-active {
        transition: opacity .3s linear;
    }
    .modal-enter-active .modal, .modal-leave-active .modal,
    .modal-enter-active .modal-backdrop, .modal-leave-active .modal-backdrop {
        transition: opacity .15s linear;
    }
    .modal-enter .modal, .modal-leave-to .modal, .modal-leave-active .modal,
    .modal-enter .modal-backdrop, .modal-leave-to .modal-backdrop, .modal-leave-active .modal-backdrop {
        opacity: 0
    }
    .modal-enter-active .modal-dialog, .modal-leave-active .modal-dialog {
        transition: transform .3s ease-out;
    }
    .modal-enter .modal-dialog, .modal-leave-to .modal-dialog, .modal-leave-active .modal-dialog {
        transform: translate(0, -25%);
    }
</style>

