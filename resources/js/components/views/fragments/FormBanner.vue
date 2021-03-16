<template>
<el-row :gutter='20'>

    <el-col :span='24' class='animated fadeIn fast'>
        <el-form :model="ruleForm" ref="ruleForm">
            <el-row :gutter='20'>
                <el-col :span="8">
                    <el-form-item prop="filesWallpaper"
                    :rules="[{ type:'file', value:filesBannersNetflix, validator: ValidatorImg, trigger: ['blur','change']}]">
                        <el-upload
                            style="width: 100%;"
                            class="upload-demo"
                            :limit="1"
                            list-type="picture"
                            action="/api/ImgWrallpapersNetflix"
                            accept=".jpg, .png, .jpeg"
                            name="document"
                            :file-list="filesBannersNetflix"
                            :auto-upload="true"
                            :before-upload="beforeUploadFile"
                            :headers="{Authorization: apiToken}"
                            :on-remove="removeFileNetflix"
                            :on-success="uploadedFileNetflix"
                            :on-error="onError">
                            <button type="button" class="btn btn-primary btn-sm btn-block" :disabled="(filesBannersNetflix.length > 0 ?true : false )"><i class="el-icon-picture-outline"></i> Subir imagen para banner netflix</button>
                            <div slot="tip" class="el-upload__tip">Solo imagenes jpg/jpeg/png con un tamaño menor de 500kb</div>
                        </el-upload>
                    </el-form-item>
                </el-col>
                <el-col :span="8">
                    <el-form-item prop="filesWallpaper"
                    :rules="[{ type:'file', value:filesBannersAmazon, validator: ValidatorImg, trigger: ['blur','change']}]">
                        <el-upload
                            style="width: 100%;"
                            class="upload-demo"
                            :limit="1"
                            list-type="picture"
                            action="/api/ImgWrallpapersAmazon"
                            accept=".jpg, .png, .jpeg"
                            name="document"
                            :file-list="filesBannersAmazon"
                            :auto-upload="true"
                            :before-upload="beforeUploadFile"
                            :headers="{Authorization: apiToken}"
                            :on-remove="removeFileAmazon"
                            :on-success="uploadedFileAmazon"
                            :on-error="onError">
                            <button type="button" class="btn btn-primary btn-sm btn-block" :disabled="(filesBannersAmazon.length > 0 ?true : false )"><i class="el-icon-picture-outline"></i> Subir imagen para banner amazon</button>
                            <div slot="tip" class="el-upload__tip">Solo imagenes jpg/jpeg/png con un tamaño menor de 500kb</div>
                        </el-upload>
                    </el-form-item>
                </el-col>
                <el-col :span="8">
                    <el-form-item prop="filesWallpaper"
                    :rules="[{ type:'file', value:filesBannersMain, validator: ValidatorImg, trigger: ['blur','change']}]">
                        <el-upload
                            style="width: 100%;"
                            class="upload-demo"
                            :limit="1"
                            list-type="picture"
                            action="/api/ImgWrallpapersMain"
                            accept=".jpg, .png, .jpeg"
                            name="document"
                            :file-list="filesBannersMain"
                            :auto-upload="true"
                            :before-upload="beforeUploadFile"
                            :headers="{Authorization: apiToken}"
                            :on-remove="removeFileMain"
                            :on-success="uploadedFileMain"
                            :on-error="onError">
                            <button type="button" class="btn btn-primary btn-sm btn-block" :disabled="(filesBannersMain.length > 0 ?true : false )"><i class="el-icon-picture-outline"></i> Subir imagen para banner home formulario</button>
                            <div slot="tip" class="el-upload__tip">Solo imagenes jpg/jpeg/png con un tamaño menor de 500kb</div>
                        </el-upload>
                    </el-form-item>
                </el-col>
            </el-row>
        </el-form>
    </el-col>
</el-row>
</template>

<script>
import { Globals } from "../../../mixins/Globals";
export default {
    mixins:[Globals],
    data(){
        return {
            ruleForm:{
                color: null,
                isColor:false,
            },
            apiToken: "Bearer " + sessionStorage.getItem("access_token"),
            filesBannersNetflix:[],
            filesBannersAmazon:[],
            filesBannersMain:[]
        }
    },
    created(){
        this.getBanners();
    },
    methods: {
        getBanners(){
            this.$store._modules.root.state.totalplay.loading = true;
            axios.get('/api/getBanner').then(response => {
                if(response.data.success){
                    this.filesBannersNetflix = [];
                    this.filesBannersAmazon = [];
                    this.filesBannersNetflix = this.filesArrayImg(response.data.lResults.netflix);
                    this.filesBannersAmazon = this.filesArrayImg(response.data.lResults.amazon);
                    this.filesBannersMain = this.filesArrayImg(response.data.lResults.main);
                    this.$store._modules.root.state.totalplay.loading = false;
                }
            }).catch(error => {
                console.error(error);
                this.$message({
                    message: 'No se pudo completar la acción.',
                    type: 'warning'
                });
                this.$store._modules.root.state.totalplay.loading = false;
            });
        },
        saveWallpaper(){
            this.$store._modules.root.state.totalplay.loading = true;
            this.$refs['ruleForm'].validate((valid) => {
                if (valid) {
                    let data = this.ruleForm;
                    data.files = this.filesWallpaper[0];

                    axios.post('/api/saveWallpaper',data).then(response => {
                        if(response.data.success){
                            this.$store._modules.root.state.totalplay.loading = false;
                            this.getBanners();
                            this.$message({
                                message: 'El fondo de pantalla fue actualizado exitosamente.',
                                type: 'success'
                            });
                        }
                    }).catch(error => {
                        this.$store._modules.root.state.totalplay.loading = false;
                        console.error(error);
                        this.$message({
                            message: 'No se pudo completar la acción.',
                            type: 'warning'
                        });
                    });
                }else{
                    this.$store._modules.root.state.totalplay.loading = false;
                    this.$message({
                        message: 'El revisa los campos del formulario.',
                        type: 'warning'
                    });
                    return false;
                }
            });
        },
        ValidatorImg(rule, value, callback){
            if(rule.value.length > 0 ){
                callback();
            }else{
                return callback(new Error("Este campo es requerido."));
            }
        },
        beforeUploadFile(file) {
            if (file.size / 1024 / 1024 > 6) {
                this.$message.error(
                    "El archivo seleccionado excede el limite permitido"
                );
                return false;
            }

            if (
                file.type !== "image/jpeg" &&
                file.type !== "image/jpg" &&
                file.type !== "image/png"
            ) {
                this.$message.error("Tipo de Archivo no permitido");
                return false;
            }

            return true;
        },
        removeFileNetflix(file,filelist) {
            this.filesBannersNetflix = [];
        },
        removeFileAmazon(file,filelist) {
            this.filesBannersAmazon = [];
        },
        removeFileMain(file,filelist) {
            this.filesBannersMain = [];
        },
        uploadedFileNetflix(data) {
            if (data.success) this.filesBannersNetflix.push(data.documentId);
            else this.$message.error("Archivo no permitido");
        },
        uploadedFileAmazon(data) {
            if (data.success) this.filesBannersAmazon.push(data.documentId);
            else this.$message.error("Archivo no permitido");
        },
        uploadedFileMain(data) {
            if (data.success) this.filesBannersMain.push(data.documentId);
            else this.$message.error("Archivo no permitido");
        },
        onError(err, file, fileList) {
            this.$message({
                type: "warning",
                message: "No fue posible leer el archivo, inténtelo nuevamente."
            });
        },
    }
}
</script>

<style>

</style>
