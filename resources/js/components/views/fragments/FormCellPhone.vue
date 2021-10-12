<template>
<div class="row">
    <div :class="['col-12',(clearInp ? 'ok':'ok')]">
        <form class="form-row" @submit.prevent="callPhone">
            <div class="input-group input-group-lg">
                <input :class="{'is-invalid':inputPhoneValid,'form-control':true}"
                autocomplete="off" :disabled="disabledField" v-on:keyup.13="callPhone" v-model="dataForm.phone" placeholder="Deja tu número">
                <div class="input-group-prepend">
                    <button :disabled="disabledField" @click="callPhone" class="btn text-white" :class="pack.colorBtn">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <div :class="{'text-danger':inputPhoneValid,'text-success':inputPhoneValidSuccess,'col-12': true,}"
    v-if="textForm" v-text="textForm"></div>
</div>
</template>

<script>
export default {
    props: {
        pack:{
            type:Object,
            clearInput:Boolean
        }
    },
    data(){
        return {
            dataForm:{
                name: null,
                city_id: null,
                promotion_id: null,
                phone: null,
                promotion_code: null
            },
            textForm:null,
            disabledField: false,
            inputPhoneValid:false,
            inputPhoneValidSuccess: false
        }
    },
    watch : {
        'dataForm.phone':function(val){
            if(val !== null){
                let exp = new RegExp(/(\d)/, 'igm');
                if (val.length > 10) {
                    val = val.slice(0,10);
                }

                let mat = val.match(exp);
                val = ( mat)? mat.join("") : null;

            }
            return this.dataForm.phone = val;
        }
    },

    methods: {
        clearForm(){
            this.dataForm = {
                name: null,
                city_id: null,
                promotion_id: null,
                phone: null,
                promotion_code: null
            };
            this.textForm = null;
            this.disabledField = false;
            this.inputPhoneValid = false;
            this.inputPhoneValidSuccess = false;
        },
        callPhone(event){
            event.preventDefault();
            if(this.dataForm.phone){
                if( this.dataForm.phone.length === 10 ){
                        axios.post('/api/setContact',{
                            name : this.dataForm.name,
                            city_id :  9,
                            promotion_id: this.dataForm.promotion_id,
                            phone : this.dataForm.phone,
                            promotion_code : this.dataForm.promotion_code
                        },{headers:{
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'Accept-C': window.acceptC
                        }}).then(response => {
                            if(response.data.success){
                                this.disabledField = true;
                                this.inputPhoneValid = false;
                                this.inputPhoneValidSuccess = true;
                                this.textForm = "Tus datos han sido registrados exitosamente.";
                                setTimeout(() => {
                                    this.clearForm();
                                    $('.modal').modal('hide');
                                }, 2000);
                            }
                        }).catch(error => {
                            console.error(error);
                        });
                }else{
                    this.inputPhoneValid = true;
                    this.textForm = 'Este campo debe contener 10 números.';
                }
            }else{
                this.inputPhoneValid = true;
                this.textForm = 'Este campo es requerido';
            }
        }
    }
}
</script>

<style>

</style>
