<template>
    <div>
        <el-row :gutter='20'>
            <el-col :span='24'>
                <el-form :model="ruleForm" ref="ruleForm" label-position="top" >
                    <el-row :gutter='20'>
                        <el-col :span='24'>
                            <el-form-item prop="phone" :rules="[
                                    { validator: validatorPhone, trigger: ['blur','change'] },
                                    { min:10 ,max: 10, message: message.ruleForm.max_characters_phone , trigger: ['blur','change'] }]">
                                <el-input :clearable="true" size="mini" placeholder="Número telefonico"
                                v-model="ruleForm.phone">
                                    <el-button slot="append" type="success" plain @click="SubmitForm" icon="el-icon-phone-outline" size="mini">Te llamamos</el-button>
                                </el-input>
                            </el-form-item>
                        </el-col>
                    </el-row>
                </el-form>
            </el-col>
        </el-row>
    </div>
</template>

<script>
import {Globals} from "../../../mixins/Globals";

export default {
    mixins:[Globals],
    props: {
        promotion_id: Number,
        modal: Boolean
    },
    data() {
        return {
            ruleForm: {
                name: null,
                city_id: null,
                phone: null,
            },
        }
    },
    computed:{
        clearModal(){
            //this.clearInputs();
            return this.$store._modules.root.state.totalplay.modalForm;
        },
        mediaForm() {
            let aux = true;
            if(this.$screen.width < 950){
                aux = false;
            }
            return aux;
        },
        mediaFormFields() {
            let aux = { input: 'width: 600px;' ,button: 'width: 150px;' }; //escritorio
            if(this.$screen.width < 950){
                aux = { input: 'width: 700px;' ,button: 'width: 150px;' }; //celular
            }
            return aux;
        }
    },
    methods:{
        validatorPhone(rule, value, callback){
            this.ruleForm.phone = value ? value.match(/(\d+)/g): null;
            this.ruleForm.phone = ( this.ruleForm.phone !== null )? this.ruleForm.phone.join(''): '';
            this.ruleForm.phone = this.ruleForm.phone.length > 10? this.ruleForm.phone.slice(0,10 ) : this.ruleForm.phone;

            if (this.ruleForm.phone) {
                callback();
            } else {
                callback(new Error( this.message.ruleForm.required ));
            }
        },
        clearInputs(){
                this.$emit('closeModalForm',false);
                this.ruleForm.name  =null;
                this.ruleForm.city_id  =null;
                this.ruleForm.phone = null;
                this.ruleForm.promotion_code = null;
                this.$store._modules.root.state.totalplay.promotion_id = null;
                this.$refs['ruleForm'].resetFields();
        },
        SubmitForm(){
            this.$refs['ruleForm'].validate((valid) => {
                this.$store._modules.root.state.totalplay.loading = true;
                if (valid) {
                    axios.post('/api/setContact',{
                        name : this.ruleForm.name,
                        city_id : ( parseInt( localStorage.getItem('selectCity') )? localStorage.getItem('selectCity') : 9),
                        promotion_id: null,
                        phone : parseInt(this.ruleForm.phone),
                        promotion_code : null
                    },{
                                        headers:
                                            {
                                                'X-Requested-With': 'XMLHttpRequest',
                                                'Accept': 'application/json',
                                                'Accept-C': window.acceptC
                                            }
                    }).then(response => {
                        if(response.data.success){
                            setTimeout(() => {
                                this.$message({ type: 'success', message: this.message.ruleForm.find_contact_succes });
                                this.clearInputs();
                                this.$store._modules.root.state.totalplay.loading = false;
                            }, 2000);
                        }
                    }).catch(error => {
                        this.$store._modules.root.state.totalplay.loading = false;
                        this.$message({ type: "warning", message: this.message.ruleForm.submit_error });
                    });

                } else {
                    setTimeout(() => {
                        this.$store._modules.root.state.totalplay.loading = false;
                        this.$message({ type: "warning", message: this.message.ruleForm.submit_error });
                    }, 800);
                }
            });
        },
    }
}
</script>

