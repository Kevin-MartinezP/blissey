<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="ultras_m" data-backdrop="static">
  <div class="modal-dialog">
    <div class="row">
      <div class="col-sm-12">
        <div class="x_panel m_panel text-danger">
          <center>
            <h4 class="mb-1">
              <i class="fas fa-file-medical-alt"></i>
              Ultrasonografía
            </h4>
          </center>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="m_panel x_panel">
          <div class="row">
            <div class="form-group col-sm-12">
              <label class="" for="evaluacion">Evaluación</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-file-medical-alt"></i></div>
                </div>
                <select class="form-control form-control-sm" id="f_ultra">
                  @if ($ultras==null)
                      <option value="0" disabled>No hay examenes de Ultrasonografía registrados</option>
                  @else
                    @foreach ($ultras as $rayox)
                      <option value={{$rayox->id}}>{{$rayox->nombre}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    
    <div class="m_panel x_panel bg-transparent" style="border:0px !important">
      <center>
        <button type="button" class="btn btn-primary btn-sm col-2" onclick="ultra_rayos(1)">Guardar</button>
        <button type="button" class="btn btn-light col-2 btn-sm" onclick="location.reload()">Cerrar</button>
      </center>
    </div>
  </div>
</div>