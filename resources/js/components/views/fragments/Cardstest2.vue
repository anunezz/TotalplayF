<template>
<div class="card text-center animated fadeIn fast"
    style="background-color: #3B4559; margin:0px auto;" :class="pack.colorText">
    <div class="card-body text-white">
        carta2
        <h4 style="height: 100%;" class="card-title font-weight-bold" :class="pack.colorText" v-html="pack.title"></h4>

        <hr class="text-white" style="color: #666; background-color: #FFFFFF;">

        <div>
            <img class="img-fluid" loading="lazy" src="/img/totalplaytv.svg" alt="totalplaytv">
        </div>

        <hr class="text-white" style="color: #666; background-color: #FFFFFF;">

        <div style="width: 50%;" class="mx-auto py-3 d-flex justify-content-between">
            <img loading="lazy" class="img-fluid" src="/img/iconos/4k.svg" alt="4k">
            <img loading="lazy" class="img-fluid" src="/img/iconos/appsintegradas.svg" alt="appsintegradas">
            <img loading="lazy" class="img-fluid" src="/img/iconos/repetidorwifi.svg" alt="repetidorwifi">
            <img loading="lazy" class="img-fluid" src="/img/iconos/replay.svg" alt="replay">
            <img loading="lazy" class="img-fluid" src="/img/iconos/tv.svg" alt="tv">
        </div>

        <div style="width: 100%; height: 50px; font-size: 19px;">
            <p class="card-text" v-html="pack.description"></p>
        </div>

        <hr class="text-white" style="color: #666; background-color: #FFFFFF;">

    </div>

    <div class="card-body text-white" :style="'background-color: #212121; border-radius:5%; border-width: 6px; border-style: solid; border-color:'+ pack.colorHex+';'">
        <div style="margin: 0 auto; width: 65%; background-color: #F44336; border-radius: 5%;">PROMOCIÓN ESPECIAL</div>
        <h4 class="card-title" :class="pack.colorText" style="font-weight: 700; font-style: italic;" v-html="pack.cost"></h4>
        <span v-html="pack.costDescription"></span>
    </div>

    <div class="card-body" :class="pack.colorText" style="width: 100%; height: 130px;">
            <span :style="'font-weight: 700; font-size: 25px; color: '+pack.colorHex"> + Descuento de por vida</span>
            <br>
            <span v-if="pack.descuento" class="text-white" v-text="pack.descuento"></span>
        <br>
        <h4 class="text-white" v-text="pack.prontopago"></h4>
    </div>

    <div class="card-footer py-3">
        <button
        type="button"
        data-toggle="modal"
        data-target="#staticBackdrop"
        @click="openModal(pack)"
        style="width: 100%;"
        class="btn btn-lg d-block text-white btn-info">  Contrata ahora</button>
    </div>
    <!-- @click="getInfoModal(pack),openModal()" -->
</div>
</template>

<script>
export default {
    props: {
        pack: {
            type: Object,
            // default:{},
            // validator:(val)=>{
            //     console.log("Prueba: ",val);
            //     return Object;
            // }
        },
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
    methods:{
        openModal(pack){
            this.$emit("openModal",pack);
        },
        getInfoModal(pack){
            $("#idPhone").removeClass('is-invalid');
            this.textForm = null;
            this.dataForm.phone = null;
            this.getInfPack = pack;
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

<style scoped>

</style>
