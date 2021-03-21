<template>
<el-form :model="ruleForm" ref="ruleForm">
    <el-row :gutter='20'>
        <el-col :span='12'>
            <el-form-item prop="message" label="Mensaje del footer"
            :rules="[{ required: true, message: message.ruleForm.required },
                    { pattern: alphanumeric, message: message.ruleForm.special_characters, trigger: ['blur','change']},
                    { max: 100, message: message.ruleForm.max_characters+' 100.', trigger: ['blur','change'] }]">
                <el-input size="mini" style="width: 100%;" placeholder="Mensaje del footer"
                v-model="ruleForm.message"></el-input>
            </el-form-item>
        </el-col>
        <el-col :span='12'>
            <el-form-item prop="cellPhone"  label="Número telefonico de contacto" :rules="[
                    { validator: validatorPhone, trigger: ['blur','change'] },
                    { min:10 ,max: 10, message: message.ruleForm.max_characters_phone , trigger: ['blur','change'] }]">
                <el-input size="mini" style="width: 100%;" placeholder="Número telefonico"
                v-model="ruleForm.cellPhone"></el-input>
            </el-form-item>
        </el-col>
        <el-col :span='6'>
            <el-form-item label="Selecciona un color" prop="color" :rules="[{ required: true, message: message.ruleForm.required },
                                { pattern: color, message: message.ruleForm.special_characters, trigger: ['blur','change']},
                                { max: 7, message: message.ruleForm.max_characters+' 7.', trigger: ['blur','change'] }]">
                    <br>
                    <el-color-picker :predefine="predefineColors" v-model="ruleForm.color"></el-color-picker>
            </el-form-item>
        </el-col>
        <el-col :span='6'>
            <el-switch
                style="margin-top: 30px;"
                v-model="ruleForm.isActive"
                active-color="#13ce66"
                inactive-color="#ff4949"
                active-text="Activar"
                inactive-text="Desactivar">
            </el-switch>
        </el-col>
        <el-col :span='24'>
            <div style='width:100%; display:flex; justify-content: center;'>
                <div>
                    <el-button type="primary" @click="submit()" size="mini" > Guardar </el-button>
                </div>
            </div>
        </el-col>
    </el-row>
</el-form>
</template>

<script>
import {Globals} from "../../../mixins/Globals";
export default {
mixins:[Globals],
    data() {
        return {
            ruleForm: {
                message: null,
                color:null,
                cellPhone:null,
                isActive:false
            },
            predefineColors: [
                '#59CBE8',
                '#DBE442',
                '#F7EA48',
                '#FFBF3F',
                '#E4002B',
                '#F04E98',
                '#8246AF',
                '#3B4559',
                '#75787B',
                '#FFFFFF']
        }
    },
    created(){
        this.getFooter2();
    },
    methods:{
        getFooter2(){
            axios.get('/api/getFooter2').then(response => {
                if(response.data.success){
                    console.log('axios.get -> ',response.data.lResults.footer2);

                        this.ruleForm.message = response.data.lResults.footer2.message;
                        this.ruleForm.color = response.data.lResults.footer2.background;
                        this.ruleForm.cellPhone = response.data.lResults.footer2.cellPhone;
                        this.ruleForm.isActive = response.data.lResults.footer2.isActive;

                }
            }).catch(error => {
                this.$message({
                    message: 'No se pudo completar la acción.',
                    type: 'warning'
                });
            });
        },
        validatorPhone(rule, value, callback){
            this.ruleForm.cellPhone = value ? value.match(/(\d+)/g): null;
            this.ruleForm.cellPhone = ( this.ruleForm.cellPhone !== null )? this.ruleForm.cellPhone.join(''): '';
            this.ruleForm.cellPhone = this.ruleForm.cellPhone.length > 10? this.ruleForm.cellPhone.slice(0,10 ) : this.ruleForm.cellPhone;

            if (this.ruleForm.cellPhone) {
                callback();
            } else {
                callback(new Error( this.message.ruleForm.required ));
            }
        },
        submit(){
            this.$refs['ruleForm'].validate((valid) => {
                if (valid) {
                    axios.post('/api/footer2',this.ruleForm).then(response => {
                        if(response.data.success){
                            this.getFooter2();
                            this.$message({
                                message: 'El pie de pagina se actualizo exitosamente.',
                                type: 'success'
                            });
                        }
                    }).catch(error => {
                        this.$message({
                            message: 'No se pudo completar la acción.',
                            type: 'warning'
                        });
                    });
                } else {
                    this.$store._modules.root.state.totalplay.loading = false;
                    this.$message({
                        message: 'El revisa los campos del formulario.',
                        type: 'warning'
                    });
                    return false;
                }
            });
        }
    }
}
</script>

<style>

</style>
