<form action="POST" v-on:submit.prevent="createProductos">
    <div id="create" class="modal fade">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title">Agregar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" class="form-control" v-model="add_titulo">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>    
                    <input type="textarea" name="descripcion" class="form-control" v-model="add_descripcion">
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>    
                    <input type="text" name="precio" class="form-control" v-model="add_precio">
                </div>    
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
              </div>
              <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" value="Guardar" class="btn btn-primary">Guardar</button>
              </div>
        </div>
      </div>
    </div>
</form>