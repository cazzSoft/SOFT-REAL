<div class="modal fade" id="formModaAcabado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
          <h4 class="modal-title" id="headerAcabado" ></h4>
      </div>
     <form id="formAcabado" method="POST" action="{{url('admin/construccion/acabado/piso')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
         {{csrf_field() }}
         <input id="method_acabado" type="hidden" name="_method" value="POST">
        <div class="modal-body ">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Detalle</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Detalle" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Indice</label>
                <div class="col-sm-10">
                  <input type="number" step="0.00001" class="form-control" id="indice" name="indice" value="{{ old('indice') }}" placeholder="Indice" required>
                </div>
              </div>
               <div class="form-group" hidden>
                <label for="inputEmail3" class="col-sm-2 control-label">Estaddo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado') }}" placeholder="estado" required>
                </div>
              </div>
              <div class="form-group" hidden>
                <label for="inputEmail3" class="col-sm-2 control-label">Peso</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="peso" name="peso" value="{{ old('peso') }}" placeholder="peso" required>
                </div>
              </div>
            </div>
        </div>
        <!--modal foofer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Salir</button>
          <button type="submit" class="btn btn-info" id="btnAcabado"><i class="fa fa-save"></i> Guardar</button>
        </div>
        <!--modal foofer -->
      </form>
    </div>
  </div>
</div>