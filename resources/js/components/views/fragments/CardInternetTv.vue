<template>
<div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-white" style="background-color: #1e1e28;">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="staticBackdropLabel" v-text="getInfPack.name"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h3> <strong>Llama GRATIS al <br>
                            <a href="tel:8005129092"
                            target="_blank">800 5129092</a> para más información</strong> </h3>
                            <p>o deja tu número y nosotros te llamamos. <br>
                            <i class="fa fa-phone phone-icon"></i> Ingresa tu número de teléfono.
                            </p>
                        <hr>
                        <div class="d-flex justify-content-cente py-4">
                            <div class="col-12">
                                <form class="form-inline form-row">
                                    <div class="input-group input-group-lg">
                                        <input required max="3" v-model="dataForm.phone" id="idPhone" class="form-control form-control-lg" type="number" placeholder="Deja tu número">
                                        <div class="input-group-prepend">
                                            <button type="button" @click="callPhone()" class="btn text-white" :class="getInfPack.colorBtn" id="inputGroup-sizing-lg">Enviar</button>
                                        </div>
                                        <div id="idPhone" class="invalid-feedback" v-text="textForm"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-3 p-3">
        <div class="row d-flex justify-content-center">
            <div class="px-1 col-12 col-sm-6 col-md-3 mb-3 animated fadeIn fast" v-for="(item,index) in packTotal" :key="index">
                <div class="p-2 card text-center" style="background-color: #3B4559;" :class="item.colorText">
                    <div class="card-header text-info">
                        <h4 style="margin: 0; padding: 0; height: 100%;" class="card-title font-weight-bold" :class="item.colorText" v-html="item.title"></h4>
                        <hr class="text-white" style="color: #666; background-color: #FFFFFF;">
                        <div class="py-1" v-if="item.type">
                            <img class="img-fluid" loading="lazy" src="/img/totalplaytv.svg" alt="totalplaytv">
                        </div>
                    </div>
                    <hr v-if="item.type" class="text-white" style="color: #666; background-color: #FFFFFF;">
                    <div class="card-body text-white">
                        <div v-if="item.type" style="width: 50%; margin: 0px auto;" class="py-3 d-flex justify-content-between">
                            <img loading="lazy" class="img-fluid" src="/img/iconos/4k.svg" alt="4k">
                            <img loading="lazy" class="img-fluid" src="/img/iconos/appsintegradas.svg" alt="appsintegradas">
                            <img loading="lazy" class="img-fluid" src="/img/iconos/repetidorwifi.svg" alt="repetidorwifi">
                            <img loading="lazy" class="img-fluid" src="/img/iconos/replay.svg" alt="replay">
                            <img loading="lazy" class="img-fluid" src="/img/iconos/tv.svg" alt="tv">
                        </div>
                        <div style="width: 100%;  font-size: 19px;">
                            <p class="card-text" v-html="item.description"></p>
                        </div>
                    </div>
                    <div class="card-body text-white" :style="'background-color: #212121; border-radius:5%; border-width: 6px; border-style: solid; border-color:'+ item.colorHex+';'">
                        <div style="margin: 0 auto; width: 65%; background-color: #F44336; border-radius: 5%;">PROMOCIÓN ESPECIAL</div>
                        <h4 class="card-title" :class="item.colorText" style="font-weight: 700; font-style: italic;" v-html="item.cost"></h4>
                        <span v-html="item.costDescription"></span>
                    </div>

                    <div class="card-body" :class="item.colorText" :style="'width: 100%; height: '+(item.img !== null?'350px;':(item.type?'150px;':'120px;'))">
                            <span v-if="item.type" :style="'font-weight: 700; font-size: 25px; color: '+item.colorHex"> + Descuento de por vida</span>
                            <br v-if="item.type">
                            <span class="text-white" v-text="item.descuento"></span>
                            <div style="margin: 0px auto; width: 50%;" v-if="item.img !== null">
                                <img class="img-fluid" height="50" loading="lazy" :src="item.img" :alt="item.img">
                            </div>
                        <br>
                        <h4 class="text-white" v-text="item.prontopago"></h4>
                    </div>

                    <div class="card-footer py-3">
                        <button
                        type="button"
                        data-toggle="modal"
                        data-target="#staticBackdrop"
                        @click="getInfoModal(item)"
                        style="width: 100%;"
                        class="btn btn-lg d-block text-white btn-info">  Contrata ahora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        packTotal: Array,
        typePack: Boolean
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
    computed:{
    },
    methods:{
        getInfoModal(item){
            $("#idPhone").removeClass('is-invalid');
            this.textForm = null;
            this.dataForm.phone = null;
            this.getInfPack = item;
        },
        closeModal(){
            $("#idPhone").removeClass('is-invalid');
            $('.modal').modal('hide');
            this.textForm = null;
        },
        callPhone(){
            if(this.dataForm.phone){
                let exp = /^[0-9]{10}$/;
                if( exp.test(this.dataForm.phone) ){
                    $("#idPhone").removeClass('is-invalid');
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
                                this.closeModal();
                                console.log("Los datos fueron enviados exitosamente....",response);
                            }
                        }).catch(error => {
                            console.error(error);
                        });
                }else{
                    $("#idPhone").addClass('is-invalid');
                    this.textForm = 'Este campo debe contener 10 números.';
                }
            }else{
                $("#idPhone").addClass('is-invalid');
                this.textForm = 'Este campo es requerido';
            }
        }
    }
}
</script>

