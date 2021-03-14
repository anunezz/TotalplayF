<template>
<div class="col-md-12">
    <el-dialog
        :visible.sync="modal"
        :width="mediaWidth"
        class="formDialog"
        :show-close="true"
        :close-on-click-modal="false"
        :close-on-press-escape="false">
        <div class="text-light">
            <el-row :gutter='20'>
                <el-col :span='24'>
                    <div style='width:100%; padding: 5px 0px; display:flex; justify-content: center;'>
                        <div style="width:100%; height: 320px;">
                            <form-component style="top: 700px;"  v-if="modal" :modal="true" :promotion_id="promotion_id" @closeModalForm="closeModalForm" />
                        </div>
                    </div>
                </el-col>
            </el-row>
        </div>
    </el-dialog>
    <div class="row">
        <div class="d-flex justify-content-center flex-wrap" v-if="items.page !== 'home'">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 py-3 px-4" v-for="(item,index) in items" :key="index">
                <div class="card card-shadow" style="width: 100%; border-radius: 23px; overflow:hidden;">
                    <img class="card-img-top" :src="item.imgpromotion.fileNameHash" :alt="item.imgpromotion.fileName">
                    <div class="card-body text-center"
                    :style="'cursor:pointer; background:'+item.color+';'">
                        <div>
                            <el-button plain @click="clickPromotion(item)" type="primary" style="width: 100%;" >Contratar ya</el-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {Globals} from "../../../mixins/Globals";
import Form from '../fragments/Form';
export default {
mixins:[Globals],
props: {
    items: Array
},
    components:{
        'form-component': Form
    },
data() {
    return {
        btn_double_triple: true,
        modal: false,
        promotion_id: null
    }
},
computed:{
    mediaWidth() {
        let aux = '45%';
        if(this.$screen.width < 950){
            aux = '95%';
        }
        return aux;
    },
    mediaForm() {
        let aux = '45%';
        if(this.$screen.width < 950){
            aux = '95%';
        }
        return aux;
    }
},
    methods:{
        closeModalForm(modal){
            this.modal = modal;
            this.$store._modules.root.state.totalplay.modalForm = this.modal;
            this.promotion_id = null;
        },
        clickPromotion(data){
            this.modal = true;
            this.$store._modules.root.state.totalplay.modalForm = this.modal;
            this.promotion_id = data.id;
            $(".el-dialog__title").css({"color":"white"});
            $(".formDialog > .el-dialog__header").remove();
            $(".formDialog > div").css({"background":"url("+data.imgpromotionmodal.fileNameHash+")","background-size": "100% 100%"});
        }
    }
}
</script>

<style scope>
.card-shadow{
    -webkit-box-shadow: 5px 5px 47px 5px rgba(0,0,0,0.91);
    box-shadow: 5px 5px 47px 5px rgba(0,0,0,0.91);
}
</style>
