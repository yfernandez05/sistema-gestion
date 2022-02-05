<template>
    <div class="d-flex no-block flex-nowrap align-items-center">
        <button type="button" title="Ver Detalle" @click="onAccionItemTabla('show',rowData)" v-if="activeShow"
            class="btn btn-sm btn-outline-info waves-effect waves-light border-1 mx-1 mr-1">
            <i class="fas fa-eye fa-lg"></i>
        </button>

        <button type="button" title="Editar" @click="onAccionItemTabla('edit',rowData)" v-if="activeEdit"
            class="btn btn-sm btn-outline-success waves-effect waves-light border-1 mx-1 mr-1">
            <i class="fas fa-marker fa-lg"></i>
        </button>

        <button type="button" title="Eliminar" @click="onAccionItemTabla('delete',rowData)" v-if="activeDelete"
            class="btn btn-sm btn-outline-danger waves-effect waves-light border-1 mx-1 mr-1">
            <i class="fas fa-trash fa-lg"></i>
        </button>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props:{
            rowData: {
                type: Object,
                required: true
            },
            activeShow: {
                type: Boolean,
                default: true
            },
            activeDelete: {
                type: Boolean,
                default: true
            },
            activeEdit: {
                type: Boolean,
                default: true
            }
        },
        methods:{
            onAccionItemTabla(action, data){
                this.$emit('accionItemTabla', {action:action, cliente:data})
            }
        }
}
</script>

<style>

</style>