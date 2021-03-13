<template>
<el-row :gutter='20'>

    <el-col :span='24' class='animated fadeIn fast'>
        <el-form :model="ruleForm" ref="ruleForm">
            <el-row :gutter='20'>
                <el-col :span='8'>
                    <el-switch
                        style="margin-top: 30px;"
                        v-model="ruleForm.isColor"
                        active-color="#13ce66"
                        inactive-color="#ff4949"
                        active-text="Activar fonde de color"
                        inactive-text="Activar fondo de imagen">
                    </el-switch>
                </el-col>
                <el-col :span='8'>
                    <el-form-item label="Selecciona un color" prop="color" :rules="[{ required: true, message: message.ruleForm.required },
                                        { pattern: color, message: message.ruleForm.special_characters, trigger: ['blur','change']},
                                        { max: 7, message: message.ruleForm.max_characters+' 7.', trigger: ['blur','change'] }]">
                            <br>
                            <el-color-picker v-model="ruleForm.color"></el-color-picker>
                    </el-form-item>
                </el-col>
                <el-col :span="8">
                    <el-form-item prop="filesWallpaper"
                    :rules="[{ type:'file', value:filesWallpaper, validator: ValidatorImg, trigger: ['blur','change']}]">
                        <el-upload
                            style="width: 100%;"
                            class="upload-demo"
                            :limit="1"
                            list-type="picture"
                            action="/api/fileWallpaper"
                            accept=".jpg, .png, .jpeg"
                            name="document"
                            :file-list="filesWallpaper"
                            :auto-upload="true"
                            :before-upload="beforeUploadFile"
                            :headers="{Authorization: apiToken}"
                            :on-remove="removeFile"
                            :on-success="uploadedFile"
                            :on-error="onError">
                            <button type="button" class="btn btn-primary btn-sm btn-block" :disabled="(filesWallpaper.length > 0 ?true : false )"><i class="el-icon-picture-outline"></i> Subir imagen de ventana modal de promoción</button>
                            <div slot="tip" class="el-upload__tip">Solo imagenes jpg/jpeg/png con un tamaño menor de 500kb</div>
                        </el-upload>
                    </el-form-item>
                </el-col>
                <el-col :span='24' class='animated fadeIn fast'>
                    <div style='width:100%; padding: 5px 0px; display:flex; justify-content: flex-end;'>
                        <div>
                            <button type="button" class="btn btn-success btn-sm" @click="saveWallpaper()" > <i class="el-icon-check"></i> Guardar</button>
                        </div>
                    </div>
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
            filesWallpaper:[],
            deleteFile:[],
        }
    },
    created(){
        this.getWallpaper();
    },
    methods: {
        getEdit(wallpaper){
            setTimeout(() => {
                this.ruleForm={
                    isColor: (wallpaper.isColor === 0? true: false),
                    color: wallpaper.color
                };
                this.filesWallpaper = [{ id: wallpaper.id, name: wallpaper.fileName ,url: wallpaper.fileNameHash }];
                this.deleteFiles = [];

            }, 500);
        },
        getWallpaper(){
            this.$store._modules.root.state.totalplay.loading = true;
            axios.get('/api/getWallpaper').then(response => {
                if(response.data.success){
                    console.log('axios.get -> ',response.data.lResults);
                    this.getEdit(response.data.lResults.Wallpaper);
                    this.getCats();
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
                            this.getWallpaper();
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
        removeFile(file,filelist) {
            console.log("remove: ", this.filesWallpaper,file);
            this.filesWallpaper = [];
        },
        uploadedFile(data) {
            if (data.success) this.filesWallpaper.push(data.documentId);
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
