<template>
<div class="row no-gutters footer2 d-flex justify-content-center flex-wrap text-center" style="background-color: #1e1e28; width: 100%; height: 100px;">
    <div class="col-md-6 color-text tel" v-if="mediaWidthCarousel">
        <a href="tel:8005129092"> CONTRATACIÓN PERSONALIZADA LLAMANDO <br> <span class="text-info"><i class="fa fa-phone phone-icon"></i> 800 5129092</span></a>
    </div>
    <div :class="(mediaWidthCol?'col-md-12':'col-md-5')">
        <div class="row pt-3 px-3">
            <div class="col-12">
                <form class="form-row" @submit.prevent="callPhone">
                    <div class="input-group input-group-lg">
                        <input :class="{'is-invalid':inputPhoneValid,'form-control':true}"
                        autocomplete="off" :disabled="disabledField" v-on:keyup.13="callPhone" v-model="dataForm.phone" placeholder="Deja tu número">
                        <div class="input-group-prepend">
                            <button :disabled="disabledField" @click="callPhone" class="btn btn-primary text-white">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div :class="{'text-danger':inputPhoneValid,'text-success':inputPhoneValidSuccess,'col-12 animated fadeIn fast': true,}"
            v-if="textForm" v-text="textForm"></div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
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
        'dataForm.phone':function(val) {
            if(val !== null){
                if (val.length > 10) {
                    val = val.slice(0,10);
                }
            }
            return this.dataForm.phone = val;
        }
    },
    computed:{
        mediaWidthCarousel() {
            return this.$screen.width > 1038? true: false;
        },
        mediaWidthCol() {
            return this.$screen.width > 801? false: true;
        },
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

<style scoped>
.footer2{
    margin-top: 119px;
    z-index: 500;
}

.tel a{
    text-decoration: none;
    color: white;
    font-size: 24px;
    font-weight: 500;
    cursor:pointer;
}
.color-text{
    display: flex;
    justify-content: center;
    align-items: center;
}
@media screen and (min-width: 0px) and (max-width: 1054px) {
    .color-text{
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        font-weight: 900;
    }
}
</style>>

