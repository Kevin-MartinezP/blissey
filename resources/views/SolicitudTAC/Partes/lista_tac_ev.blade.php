<div id="accordion">
  @foreach ($examenes as $k => $examen)
      
    <div class="card">
      <div class="card-header p-0" id={{"heading".$k}}>
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target={{"#collapse".$k}} aria-expanded="true" aria-controls={{"collapse".$k}}>
            
            {{$examen->tac->nombre}}
            
          </button>
        </h5>
      </div>

      <div id={{"collapse".$k}} class="collapse" aria-labelledby={{"heading".$k}} data-parent="#accordion">
        <div class="card-body">
          
          <table class="table table-hover table-striped table-sm">
            <thead>
              <th>Fecha</th>
              <th>Paciente</th>
              <th>Opciones</th>
            </thead>
            <tbody>
              @foreach($solicitudes as $solicitud)
                @if($solicitud->f_tac == $examen->f_tac)
                  <tr>
                    <td>{{$solicitud->created_at->format('d/m/y')}}</td>
                    <td>
                      {{$solicitud->nombrePaciente($solicitud->f_paciente)}}
                    </td>
                    <td>
                      <center>
                        <div class="btn-group">
                          @if (Auth::user()->tipoUsuario == "TAC")
														<a id="editar" href= {!! asset('/solicitudex/'.$solicitud->id.'/edit')!!} class="btn btn-dark btn-sm" title="Editar"/>
															<i class="fa fa-edit"></i>
														</a>
													@endif
                          <a id="entregar" href={!! asset('/entregarExamen/'.$solicitud->id.'/'.$solicitud->f_tac.'/tac')!!} class="btn btn-primary btn-sm" title="Entregar" target="_blank"/>
                            <i class="fa fa-envelope"></i>
                          </a>
                        </div>
                      </center>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
  @endforeach
</div>