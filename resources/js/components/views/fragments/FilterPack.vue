<template>
<el-row :gutter='20'>
    <el-form :model="ruleForm" ref="ruleForm">
        <el-col :span='12'>
            <el-form-item prop="name" label="Selecciona un paquete">
                <el-select
                    size="mini" style="width: 100%;"
                    v-model="ruleForm.types"
                    multiple
                    filterable
                    allow-create
                    placeholder="Selecciona un paquete">
                    <el-option
                    v-for="item in catTypes"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>
        <el-col :span='12'>
            <el-form-item prop="name" label="Nombre"
            :rules="[{ required: false, message: message.ruleForm.required },
                    { pattern: alphanumeric, message: message.ruleForm.special_characters, trigger: ['blur','change']},
                    { max: 100, message: message.ruleForm.max_characters+' 100.', trigger: ['blur','change'] }]">
                <el-input size="mini" style="width: 100%;" placeholder="Nombre"
                v-model="ruleForm.name"></el-input>
            </el-form-item>
        </el-col>
        <el-col :span='8'>
            <el-form-item prop="name" label="Selecciona una residencia">
                <el-select
                    size="mini" style="width: 100%;"
                    v-model="ruleForm.frontiers"
                    multiple
                    filterable
                    allow-create
                    placeholder="Selecciona una residencia">
                    <el-option
                    v-for="item in frontiers"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>
        <el-col :span='8'>
            <el-form-item prop="name" label="Seleccionar tipos de promoción">
                <el-select
                    size="mini" style="width: 100%;"
                    v-model="ruleForm.tripleDouble"
                    multiple
                    filterable
                    allow-create
                    placeholder="Seleccionar tipos de promoción">
                    <el-option
                    v-for="item in CattripleDouble"
                    :key="item.id"
                    :label="item.name"
                    :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
        </el-col>
        <el-col :span='8'>
            <el-form-item prop="name" label="Selecciona un estatus del paquete">
                <el-checkbox-group
                    v-model="ruleForm.isActive"
                    :min="1"
                    :max="2">
                    <el-checkbox v-for="(item,index) in isActives" :label="item" :key="index">{{item.name}}</el-checkbox>
                </el-checkbox-group>
            </el-form-item>
        </el-col>
        <el-col :span='24'>
            <el-form-item label="Busacr por descripción" prop="description" :rules="[{ required: false, message: message.ruleForm.required },
                                { pattern: alphanumeric, message: message.ruleForm.special_characters, trigger: ['blur','change']},
                                { max: 100, message: message.ruleForm.max_characters+' 100.', trigger: ['blur','change'] }]">
                <el-input type="textarea" v-model="ruleForm.description" placeholder="Buscar por descripción" size="mini" style="width: 100%;"></el-input>
            </el-form-item>
        </el-col>
        <el-col :span='24' class='animated fadeIn fast'>
            <div style='width:100%; padding: 5px 0px; display:flex; justify-content: flex-end;'>
                <div class="btn-group">
                    <button @click="searchPack()" type="button" class="btn btn-primary btn-sm"><i class="el-icon-search"></i> Búscar registros</button>
                </div>
            </div>
        </el-col>
    </el-form>
</el-row>
</template>

<script>
import {Globals} from "../../../mixins/Globals";
export default {
    mixins:[Globals],
    data(){
        return {
            catTypes:[],
            frontiers:[],
            CattripleDouble:[],
            isActives:[],
            ruleForm:{
                types:[],
                name:null,
                frontiers:[],
                tripleDouble:[],
                isActive: [],
                description:null
            }
        }
    },
    created(){
        this.getCats();
    },
    methods: {
        getCats(){
            axios.get('/api/getCatsPacksForm').then(response => {
                if(response.data.success){
                    this.catTypes = response.data.lResults.packNames;
                    this.frontiers = response.data.lResults.frontiers;
                    this.isActives = response.data.lResults.actives;
                    this.CattripleDouble = response.data.lResults.triple_double;
                }
            }).catch(error => {
                this.$store._modules.root.state.totalplay.loading = false;
                this.$message({
                    message: 'No se pudo completar la acción.',
                    type: 'warning'
                });
            });
        },
        searchPack(){
            this.$refs['ruleForm'].validate((valid) => {
            if (valid) {
                this.$emit('responseFormFilters',this.ruleForm);
            } else {
                this.$message({
                    message: 'Error verifica los campos del formulario.',
                    type: 'warning'
                });
                return false;
            }
            });
        }
    },
}
</script>

<style>
.el-select .el-input {
    width: 100% !important;
}
.el-select .el-input {
    width: 180px;
}
.input-with-select .el-input-group__prepend {
    background-color: #fff;
}
</style>
