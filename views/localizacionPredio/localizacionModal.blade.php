<div class="modal fade" id="formModaLocalizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
          <h4 class="modal-title" id="headerLocalizacion" ></h4>

      </div>
     <form id="formLocalizacion" method="POST" action="{{url('admin/parametrizacion/suelo/localizacionpredio')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
         {{csrf_field() }}
         <input id="method_localizacion" type="hidden" name="_method" value="POST">
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
            </div>
        </div>
        <!--modal foofer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Salir</button>
          <button type="submit" class="btn btn-info" id="btnLocalizacion"  ><i class="fa fa-save"></i> Guardar</button>
        </div>
        <!--modal foofer -->
      </form>
    </div>
  </div>
</div>