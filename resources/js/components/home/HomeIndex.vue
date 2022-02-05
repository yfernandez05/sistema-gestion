<template>
    <div>
         <!-- Cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Registros Nuevos</div>
                    </div>
                    <div class="iconBx">
                        <i class="fas fa-sort-numeric-up-alt"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">150</div>
                        <div class="cardName">Total Registros</div>
                    </div>
                    <div class="iconBx">
                        <i class="far fa-calendar-check"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">200</div>
                        <div class="cardName">Ventas</div>
                    </div>
                    <div class="iconBx">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">800</div>
                        <div class="cardName">Comentarios</div>
                    </div>
                    <div class="iconBx">
                        <i class="far fa-comments"></i>
                    </div>
                </div>
            </div>            
            
            <!-- Order details list -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Nuevos Registros {{fechaDay}}</h2>
                        <a href="#" class="btn-table">Ver todo</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
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
                                <td v-text="cli.idcliente">{{}}</td>
                                <td v-text="cli.nombres">{{}}</td>
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
import moment from 'moment';
import 'moment/locale/es';
export default {
    data() {
        return {
            clientes:[], //contiene la data que se recorrera en la tabla
            fechaDay:"",
        };        
    },
    //metodos:
    methods:{
        async listar(){
            const res = await axios.get('/clientes');
            this.clientes = res.data;
        }, 

        fechaActual(){   
            var fecha = moment().format('dddd');         
            this.fechaDay = fecha;

        },
    },


    //inicializar los metodos:
    created() {
        this.listar(); 
        this.fechaActual();
    },
}
</script>

<style>

</style>