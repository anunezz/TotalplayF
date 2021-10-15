<template>
<div class="col-md-12">
    <form class="row" style="margin: 0 auto; width:95%;">
        <div class="col-12 form-group">
            <input v-model="dataForm.name" class="idPhone form-control form-control-lg" type="text" placeholder="Nombre">
        </div>
        <div class="col-12 form-group">
            <input required max="3" v-model="dataForm.phone" class="idPhone form-control form-control-lg" type="number" placeholder="Número telefónico">
            <div id="idPhone" class="invalid-feedback" v-text="textForm"></div>
        </div>
        <div class="col-12 form-group">
            <input v-model="dataForm.promotion_code" class="idPhone form-control form-control-lg" type="text" placeholder="Compañia actual">
        </div>
        <div class="col-12 form-group">
            <button type="button" @click="callPhone()" class="btn-lg btn-block btn text-white btn-info">Enviar</button>
        </div>
        <div class="col-12 animated fadeIn fast" v-if="success">
            <div class="alert alert-success" role="alert">
                Tus datos fueron enviados exitosamente, pronto te llamaremos.
            </div>
        </div>
    </form>
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
            success: false
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
    methods:{
        clearInput(){
            $(".idPhone").removeClass('is-invalid');
            this.textForm = null;
            this.dataForm.name = null;
            this.dataForm.phone = null;
            this.dataForm.promotion_code = null;
            this.success =  true;
            setInterval(() => {
                this.success =  false;
            }, 5000);
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

</style>
