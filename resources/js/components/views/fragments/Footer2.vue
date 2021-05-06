<template>
<div class="row no-gutters footer2 d-flex justify-content-center flex-wrap text-center" style="background-color: #1e1e28; width: 100%; height: 100px;">
    <div class="col-md-6 color-text tel" v-if="mediaWidthCarousel">
        <a href="tel:8005129092"> CONTRATACIÓN PERSONALIZADA LLAMANDO <br> <span class="text-info"><i class="fa fa-phone phone-icon"></i> 800 5129092</span></a>
    </div>
    <div :class="(mediaWidthCol?'col-md-12':'col-md-5')">
        <form class="form-inline form-row" style="padding-top: 22px; margin: 0 auto; width:95%;">
            <div class="input-group input-group-lg">
                <input required max="3" v-model="dataForm.phone" class="idPhone form-control form-control-lg" type="number" placeholder="Deja tu número">
                <div class="input-group-prepend">
                    <button type="button" @click="callPhone()" class="btn text-white btn-info" id="inputGroup-sizing-lg">Enviar</button>
                </div>
                <div id="idPhone" class="invalid-feedback" v-text="textForm"></div>
            </div>
        </form>
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
            getInfPack:{},
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
    methods:{
        clearInput(){
            $(".idPhone").removeClass('is-invalid');
            this.textForm = null;
            this.dataForm.phone = null;
        },
        callPhone(){
            if(this.dataForm.phone){
                let exp = /^[0-9]{10}$/;
                if( exp.test(this.dataForm.phone) ){
                    $(".idPhone").removeClass('is-invalid');
                    this.textForm = null;
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
                                this.clearInput();
                                console.log("Los datos fueron enviados exitosamente....",response);
                            }
                        }).catch(error => {
                            console.error(error);
                        });
                }else{
                    $(".idPhone").addClass('is-invalid');
                    this.textForm = 'Este campo debe contener 10 números.';
                }
            }else{
                $(".idPhone").addClass('is-invalid');
                this.textForm = 'Este campo es requerido';
            }
        }
    }
}
</script>

<style scoped>
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

