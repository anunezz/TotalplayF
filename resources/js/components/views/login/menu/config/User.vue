<template>
<div class="row">

    <el-dialog
    :close-on-click-modal="false"
    :close-on-press-escape="false"
    :show-close="false"
    :title="titleModal"
    class="modalUser"
    :visible.sync="modalVisible"
    width="70%">
        <span v-if="titleModal === 'Deshabilitar usuario' || titleModal ==='Activar usuario'" v-text="messageModal"></span>

        <span slot="footer" class="dialog-footer" v-if="titleModal === 'Deshabilitar usuario' || titleModal ==='Activar usuario'">
            <el-button-group>
                <el-button size="mini" @click="modalVisible = false">Cancelar</el-button>
                <el-button v-if="titleModal === 'Deshabilitar usuario'" size="mini" type="danger" @click="activeUser()">Deshabilitar</el-button>
                <el-button v-if="titleModal === 'Activar usuario'" size="mini" type="success" @click="activeUser()"> Activar</el-button>
            </el-button-group>
        </span>
        <new-user-component
        v-if="titleModal === 'Nuevo usuario' || titleModal === 'Actualizar usuario'"
        :items="user"
        @responseUser="responseUser" />
    </el-dialog>


    <div class="col-md-12 py-2">
        <div class="row justify-content-md-between flex-wrap">
            <div class="col-md-6">
                <h4>Bandeja de entrada usuarios Totalplay.</h4>
            </div>
            <div class="col-md-6">
                <router-link to="/login/configuracion">
                    <button class="btn btn-danger btn-sm float-right"> <i class="el-icon-arrow-left"></i> Regresar</button>
                </router-link>
            </div>
        </div>
    </div>
    <div class="col-md-12 py-2">
        <div class="text-left float-left">
            <strong>Total:</strong> {{ pagination.total }}
        </div>
        <div class="btn-group float-right">
            <button class="btn btn-secondary btn-sm"> <i class="el-icon-search"></i> Búsqueda avanzada</button>
            <button class="btn btn-primary btn-sm" @click="modal(['new',[]])"> <i class="el-icon-plus"></i> Nuevo usuario</button>
        </div>
    </div>
    <div class="col-md-12">
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
                <th scope="col">Estatus</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item,index) in users" :key="index">
                <th scope="row" v-text="item.idx"></th>
                <td v-text="item.full_name"></td>
                <td v-text="item.username"></td>
                <td v-text="item.email"></td>
                <td v-text="item.profile.name"></td>
                <td v-text="(item.isActive === 1?'Activo':'Desactivado')"></td>
                <td>
                    <div class="btn-group float-center">
                        <button :disabled="$store.state.user.profile === 1?false:true" v-if="item.isActive === 1" class="btn btn-danger btn-sm" @click="modal(['active',[item,false]])"> <i class="el-icon-close"></i></button>
                        <button :disabled="$store.state.user.profile === 1?false:true" v-else class="btn btn-warning btn-sm" @click="modal(['active',[item,true]])"> <i class="el-icon-check"></i></button>
                        <button :disabled="$store.state.user.profile === 1?false:true" class="btn btn-success btn-sm" @click="modal(['edit',item])" > <i class="el-icon-edit"></i></button>
                    </div>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <div class="" style="width:100%; padding: 5px 0px;">
            <el-pagination
                @size-change="handleSizeChange"
                @current-change="handleCurrentChange"
                :current-page.sync="pagination.currentPage"
                :page-sizes="[10, 20, 30, 40]"
                :page-size="parseInt(pagination.perPage)"
                layout="sizes, ->, prev, pager, next"
                :total="pagination.total">
            </el-pagination>
        </div>
    </div>
</div>
</template>

<script>
import newUsercomponent from '../../../fragments/FormNewUser';
import { Globals } from "../../../../../mixins/Globals";
export default {
    components:{
        'new-user-component': newUsercomponent,
    },
    mixins:[Globals],
    data(){
        return {
            users:[],
            modalVisible:false,
            titleModal: null,
            messageModal: null,
            user:{
                type: false,
                data: {}
            },
            pagination: {
                currentPage: 1,
                total: 0,
                perPage: 10
            },
            from:0,
            to:0
        }
    },
    created(){
        this.getUsers();
    },
    methods: {
        handleSizeChange(sizePerPage) {
            this.pagination.perPage = sizePerPage;
            this.getUsers(this.pagination.currentPage);
        },
        handleCurrentChange(currentPage) {
            this.pagination.currentPage = currentPage;
            this.getUsers(currentPage);
        },
        modal(data){
            $(".el-dialog__title").css({"color":"black"});
            this.messageModa = null;
            switch (data[0]) {
                case 'new':{
                    this.modalVisible = true;
                    this.titleModal = 'Nuevo usuario';
                    this.user = {
                        type:false,
                        data:[]
                    };
                break;
                }
                case 'edit':{
                    this.modalVisible = true;
                    this.titleModal = 'Actualizar usuario';
                    this.user = {
                        type: true,
                        data: data[1]
                    };
                break;
                }
                case 'active':{
                    this.modalVisible = true;
                    this.titleModal = ( data[1][1] )? 'Activar usuario':'Deshabilitar usuario';
                    this.messageModal =( data[1][1] )? '¿Estas completamente seguro de activar este usuario?':'¿Estas completamente seguro de eliminar este usuario?';
                    this.user = {
                        type: true,
                        data: data[1]
                    };
                break;
                }
                default:{
                    this.modalVisible = false;
                    this.titleModal = null;
                    this.user = {
                        type: false,
                        data: {}
                    };
                    break;
                }
            }
        },
        responseUser(res){
                if(res){
                    this.modalVisible = false;
                    this.titleModal = '';
                    this.messageModal = null;
                    this.getUsers();
                }
                this.$store._modules.root.state.totalplay.loading = false;
        },
        activeUser(){
            this.$store._modules.root.state.totalplay.loading = true;
            console.log(this.user);
            axios.post('/api/activeUser',{
                userid: this.user.data[0].hash,
                active: this.user.data[1]
            }).then(response => {
                if(response.data.success){
                    this.getUsers();
                    this.modalVisible = false;
                    this.titleModal = '';
                    this.messageModal = null;
                    this.$store._modules.root.state.totalplay.loading = false;
                    this.$message({
                        message: 'El usuario fue desactivado correctamente.',
                        type: 'success'
                    });
                }
            }).catch(error => {
                this.$store._modules.root.state.totalplay.loading = false;
                this.$message({
                    message: 'No se pudo completar la acción.',
                    type: 'warning'
                });
            });
        },
        getUsers(currentPage = 1){
            this.$store._modules.root.state.totalplay.loading = true;
            axios.post('/api/getUsers',{
                page: currentPage,
                perPage: this.pagination.perPage,
            }).then(response => {
                if(response.data.success){
                    this.users = [];
                    this.users = this.idx(
                        response.data.lResults.Users.data,
                        response.data.lResults.Users.from
                    );
                    this.pagination.currentPage = response.data.lResults.Users.current_page;
                    this.pagination.perPage = response.data.lResults.Users.per_page;
                    this.pagination.total = response.data.lResults.Users.total;
                    this.from = response.data.lResults.Users.from;
                    this.to = response.data.lResults.Users.to;
                    this.$store._modules.root.state.totalplay.loading = false;
                }
            }).catch(error => {
                console.log(error);
                this.$message({
                    message: 'No se pudo completar la acción.',
                    type: 'warning'
                });
                this.$store._modules.root.state.totalplay.loading = false;
            });
        }
    }
}
</script>

<style scoped>
    .nolink{
        text-decoration: none;
        color: black;
    }
</style>
