<template>
    <div class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Titulo del modal</h4>
<!--             <button
              @click="cerrarModal()"
              type="button"
              class="close"
              data-dismiss="modal"
            >
              &times;
            </button> -->
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group my-2">
              <label for="nombre">Nombre</label>
<!--               <input
                v-model="articulo.nombre"
                type="text"
                class="form-control"
                placeholder="Nombre del producto"
              /> -->
              <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
            </div>
            <div class="form-group my-2">
              <label for="nombre">Descripción</label>
<!--               <input
                v-model="articulo.descripcion"
                type="text"
                class="form-control"
                placeholder="Descripcion del articulo"
              /> -->
              <!-- <span class="text-danger" v-if="errores.descripcion">{{errores.descripcion[0]}}</span> -->
            </div>
            <div class="form-group my-2">
              <label for="nombre">Stock</label>
<!--               <input
                v-model="articulo.stock"
                type="number"
                class="form-control"
                placeholder="Stock"
              /> -->
              <!-- <span class="text-danger" v-if="errores.stock">{{errores.stock[0]}}</span> -->
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <!-- <button
              @click="guardar()"
              type="button"
              class="btn btn-success"
              data-dismiss="modal"
            >
              Guardar
            </button>
            <button
              @click="cerrarModal()"
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
            >
              Cerrar
            </button> -->
          </div>
        </div>
      </div>
    </div>
</template>

<script>

</script>
