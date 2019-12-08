<div class="modal fade" id="formModaInformacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
          <h4 class="modal-title" id="headerInformacion" ></h4>

      </div>
     <form id="formInformacion" method="POST" action="{{url('admin/informacion')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
         {{csrf_field() }}
         <input id="method_informacion" type="hidden" name="_method" value="POST">
         <div class="modal-body " style="font-weight: normal;">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="nombre" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Dirección</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control" id="direccion" name="direccion" value="" placeholder="direccion" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-10">
                  <input type="number"  class="form-control" id="telefonos" name="telefonos" value="" placeholder="telefono" required>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Canton</label>
                <div class="col-sm-10">
                  <select  class="form-control" id="idcanton" name="idcanton">
                     @foreach($canton as $n)
                    <option value="{{ $n->id }}">{{ $n->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
        </div>
        <!--modal foofer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Salir</button>
          <button type="submit" class="btn btn-info" id="btnInformacion"  ><i class="fa fa-save"></i> Guardar</button>
        </div>
        <!--modal foofer -->
      </form>
    </div>
  </div>
</div>