<template>
    <div>
        <!-- Modal -->
        <div class="modal" :class="{ mostrar: estadoModal }">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }}</h4>
                        <button  @click="cerrarModal()" type="button" class="close" data-dismiss="modal">
                        &times;
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="nombre">Nombres</label>
                            <input v-model="cliente.nombres" type="text" class="form-control" placeholder=""  :disabled="{ disabled: read }" />
                            <!-- <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span> -->
                        </div>
                        <div class="form-group my-2">
                            <label for="apellido">Apellidos</label>
                            <input v-model="cliente.apellidos" type="text" class="form-control" placeholder="" :disabled="{ onlectura: read }"/>
                            <!-- <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span> -->
                        </div>
                        <div class="form-group my-2">
                            <label for="telefono">Telefono</label>
                            <input v-model="cliente.telefono" type="text" class="form-control" placeholder="" :disabled="{ onlectura: read }"/>
                            <!-- <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span> -->
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button @click="guardar()" type="button" class="btn btn-success" data-dismiss="modal">
                        Guardar
                        </button>
                        <button @click="cerrarModal()" type="button" class="btn btn-danger" data-dismiss="modal">
                        Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Clientes</h2>
                    <a href="#" class="btn-table">Ver todo</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Acciones</td>
                            <td>Código</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Telefono</td>
                            <td>Email</td>
                            <td>F. Registro</td>
                            <td>Estado</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cli in clientes" :key="cli.idcliente">
                            <td><!-- <acciones-tabla :rowData="cli" @accionItemTabla="accionItemTabla" :activeEdit="true" :activeDelete="false" :activeShow="true"> -->
                                <div class="d-flex no-block flex-nowrap align-items-center">
                                    <button type="button" :title="cli.isactive ? 'Desactivar':'Activar'" @click="abrirModal(cli)"
                                        class="btn btn-sm btn-outline-info waves-effect waves-light border-0  mr-1"
                                        :class="cli.isactive ? 'btn-outline-info':'btn-outline-success'">
                                        <i class="fas fa-lg" :class="cli.isactive ? 'fa-eye':'fa-check-circle'"></i>
                                    </button> 
                                    <button type="button" :title="cli.isactive ? 'Desactivar':'Activar'" @click="abrirModal(cli)"
                                        class="btn btn-sm btn-outline-success waves-effect waves-light border-0  mr-1"
                                        :class="cli.isactive ? 'btn-outline-success':'btn-outline-success'">
                                        <i class="fas fa-lg" :class="cli.isactive ? 'fa-marker':'fa-check-circle'"></i>
                                    </button> 
                                    <button type="button" :title="cli.isactive ? 'Desactivar':'Activar'" @click="cambiarEstado(cli)"
                                        class="btn btn-sm  waves-effect waves-light border-0 mr-1"
                                        :class="cli.isactive ? 'btn-outline-danger':'btn-outline-success'">
                                        <i class="fas fa-lg" :class="cli.isactive ? 'fa-trash':'fa-check-circle'"></i>
                                    </button>                                    
                                </div>
                            </acciones-tabla></td>
                            <td v-text="cli.idcliente"></td>
                            <td v-text="cli.nombres"></td>
                            <td v-text="cli.apellidos"></td>
                            <td v-text="cli.telefono"></td>
                            <td v-text="cli.email"></td>
                            <td v-text="cli.fecha"></td>
                            <td>
                                
                                <span class="badge badge-pill rounded-pill py-2 px-3"
                                :class="cli.isactive ? 'bg-success':'bg-danger'" v-text="cli.statename">
                            </span>
                            </td>
                        </tr>                            

                    </tbody>
                </table>
            </div>
        </div>    
    </div>    
</template>

<script>
import AccionesTabla from './../../utils/AccionesTabla';

export default {
    data(){
        return{
            data:[],
            cliente:{
                idcliente: "",
                nombres: "",
                nombres: "",
                telefono: 1,
                email:"",
            },
            clientes:[], //contiene toda la data en un array desde la api interna
            estadoModal:0,
            tituloModal:'Titulo',
            editar:true,
            verdetalle:true,
            read:0,
        };
    },
    //metodos:
    methods:{
        async listar(){
            const res = await axios.get('/clientes');
            this.clientes = res.data;
        },
        accionItemTabla(event) {
            switch (event.action) {
                case 'show':
                    this.estadoModal = 1;
                    this.editar = false;
                break;
                case 'edit':
                    this.abrirModal();
                    /* this.tituloModal = 'Detalle Cliente';
                    this.estadoModal = 1;
                    this.editar = true; */ 
                break
                /* case 'delete':
                    this.cambiarEstado(event.data);
                break;  */
            }                
        },
        abrirModal(data = {}){
            if (this.editar) {
                this.tituloModal = 'Editar Cliente';
                this.estadoModal = 1;
                this.editar = true;
                this.verdetalle = false
                this.read = 0;
                (this.idcliente = data.idcliente);
                (this.cliente.nombres = data.nombres);
                (this.cliente.apellidos = data.apellidos);
                (this.cliente.telefono = data.telefono);
                (this.cliente.email = data.email);
            } else if (this.verdetalle) {
                this.tituloModal = 'Detalle Cliente';
                this.verdetalle = true;
                this.editar = false;
                this.read = 1;
                (this.idcliente = data.idcliente);
                (this.cliente.nombres = data.nombres);
                (this.cliente.apellidos = data.apellidos);
                (this.cliente.telefono = data.telefono);
                (this.cliente.email = data.email);
            } {
                
            }
        },
        cerrarModal(){
            this.estadoModal = 0;
        }

    },

    //Inicializar los metodos:
    created(){
        this.listar();
    },
    components:{
        AccionesTabla,        
    }, 
    
}
</script>

<style>
.mostrar {
  display: list-item;
  opacity: 1;
  background: rgba(0, 0, 0, 0.541);
}
.onlectura{
    
}
</style>