@extends('principal')
@section('layout')
  {!!Form::open(['class' =>'form-horizontal form-label-left input_mask','url' =>'guardarResultadosExamen','method' =>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data'])!!}
  @php
    $fecha = Carbon\Carbon::now();
  @endphp
  @include('SolicitudExamenes.Barra.show')
  <div class="col-md-10">
    <div class="x_panel">
      <div class="flex-row">
        <span class="font-weight-light text-monospace">
          Paciente
        </span>
      </div>
      <div class="flex-row">
        <h6 class="font-weight-bold">
          {{$solicitud->paciente->nombre." ".$solicitud->paciente->apellido}}
          @if ($solicitud->paciente->sexo)
            <span class="badge badge-pill badge-primary">
          @else
            <span class="badge badge-pill badge-pink">
          @endif
            {{$solicitud->paciente->fechaNacimiento->age.' años' }}
          </span>
        </h6>
      </div>
    </div>

    <input type="hidden" name="solicitud" value={{$solicitud->id}}>
    <input type="hidden" name="idExamen" value={{$solicitud->f_examen}}>
    @foreach ($espr as $esp)
      <input type="hidden" name="espr[]" value={{$esp->id}}>
    @endforeach
    @if ($solicitud->examen->imagen)
      <div class="x_panel">
        <div class="col-md-12">
          <div class="">
            <center>
              <output id="listExamen" style="height:400px; width: 400px; object-fit: scale-down">
                  <img onmouseover="zoom()" id="imgZoom" src={{asset(Storage::url($resultado->imagen))}} style="height: 400px; width: 400px; object-fit: scale-down">
              </output>
            </center>
          </div>
        </div>
      </div>
    @endif
    @foreach ($secciones as $variable)
      <div class="x_panel">
        @php
        $contadorParametros = 1;
        @endphp
        <div class="flex-row">
          <center>
            <h5>
              <i class="fa fa-flask"></i>
              {{$espr->first()->nombreSeccion($variable)}}
            </h5>
          </center>
        </div>
        <table class="table table-sm table-hover table-stripped">
          <thead>
            <th style="width: 5%">#</th>
            <th style="width: 25%">Parametro</th>
            <th style="width: 20%">Resultado</th>
            <th style="width: 10%" title="Valor Normal mínimo">VNm</th>
            <th style="width: 10%" title="Valor Normal Máximo">VNM</th>
            <th style="width: 15%">Unidades</th>
            <th style="width: 10%">DC</th>
          </thead>
          <tbody>
            @if ($espr!=null)
              @foreach ($espr as $esp=>$valor)
                @if ($valor->f_seccion==$variable)
                  <tr>
                    <td>{{$contadorParametros}}</td>
                    <td>{{$valor->nombreParametro($valor->f_parametro)}}</td>
                    <td>{{$detallesResultado[$esp]->resultado}}</td>
                    @if(strlen($valor->parametro->valorMinimo)>0)
                      <td>
                        <span class="badge border border-primary text-primary col-12">
                          @if ($solicitud->paciente->sexo==0)
                                {{number_format($valor->parametro->valorMinimoFemenino, 2, '.', ',')}}
                              @else
                                {{number_format($valor->parametro->valorMinimo, 2, '.', ',')}}
                              @endif
                        </span>
                      </td>
                      <td>
                        <span class="badge border border-danger text-danger col-12">
                          @if ($solicitud->paciente->sexo==0)
                          {{number_format($valor->parametro->valorMaximoFemenino, 2, '.', ',')}}
                        @else
                          {{number_format($valor->parametro->valorMaximo, 2, '.', ',')}}
                        @endif
                        </span>
                      </td>
                    @else
                      <td>
                        <span class="badge border border-secondary text-secondary">Ninguno</span>
                      </td>
                      <td>
                        <span class="badge border border-secondary text-secondary">Ninguno</span>
                      </td>
                    @endif
                    <td>
                      @if ($valor->nombreUnidad($valor->parametro->unidad) == "-")
                        <span class="badge border border-secondary text-secondary">Ninguna</span>
                      @else
                        {{$valor->nombreUnidad($valor->parametro->unidad)}}
                      @endif
                    </td>
                    @if ($valor->f_reactivo)
                      <td>{{$detallesResultado[$esp]->dato_controlado}}</td>
                    @else
                      <td>
                        <span class="badge border border-secondary text-secondary">Ninguno</span>
                      </td>
                    @endif
                  </tr>
                @endif
                @php
                  $contadorParametros++;
                @endphp
              @endforeach
            @else
              <tr>
                <td colspan="7">
                  <center>
                    No hay registros
                  </center>
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    @endforeach

    @if ($resultado->observacion!=null)
      <div class="x_panel">
        <div class="flex-row">
          <center>
            <h5>Observación</h5>
          </center>
        </div>
        <div class="flex-row">
          <center>
            <span>
              {{$resultado->observacion}}
            </span>
          </center>
        </div>
      </div>
    @endif
    <div class="x_panel">
      <div class="flex-row">
        <center>
          <h5>Evaluó:</h5>
        </center>
      </div>
      <div class="flex-row">
        <center>
          <span>
            Lic. {{$resultado->laboratorista->nombre}} {{$resultado->laboratorista->apellido}}
          </span>
        </center>
      </div>
    </div>
    <div class="x_panel">
      <center>
          <a href={!! asset('/examenesEntregados?vista=paciente&tipo=examenes') !!} class="btn btn-light btn-sm">Atras</a>
      </center>
    </div>
  </div>

{!!Form::close()!!}

<script type="text/javascript">
  function zoom(){
  		$("#imgZoom").imgViewer();
  };
</script>
@endsection
