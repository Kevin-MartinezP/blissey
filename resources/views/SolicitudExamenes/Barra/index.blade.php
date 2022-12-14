<nav class="navbar navbar-expand-lg navbar-light  sticky-top mb-2" style="background-color: #e3f2fd;">
  @if (isset($bacteriologia))
  <a class="navbar-brand" href={!! asset('/solicitudesBacteriologia?tipo=examenes&vista=examenes') !!}>
    @else
    <a class="navbar-brand" href={!! asset('/solicitudex?tipo=examenes&vista=paciente') !!}>      
    @endif
    @if (isset($bacteriologia))
    Bacteriología
    @else
    Laboratorio Clínico
    @endif
    @if ($est =="evaluados")
      <span class="badge badge-success">
        Evaluados
      </span>
    @elseif($est == "entregados")
      <span class="badge badge-info">
        Entregados
      </span>
    @elseif($est == "historial")
      <span class="badge badge-info">
        HISTORIAL
      </span>
    @elseif($est == "busqueda")
      <span class="badge badge-info">
        BUSQUEDA EN HISTORIAL
      </span>
    @else
      <span class="badge badge-primary">
        Solicitudes
      </span>
    @endif
    @if ($vista == "paciente")
      <span class="badge border-info border text-info">
        Paciente
      </span>  
    @else
      @if(isset($bacteriologia))
        <span class="badge border-primary border text-primary">
          Bacteriología
        </span>
      @else
        <span class="badge border-primary border text-primary">
          Exámenes
        </span>
      @endif
    @endif
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href={!! asset('/solicitudex/create?tipo=examenes') !!}>Nuevo</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ver
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if (isset($bacteriologia))
          <a class="dropdown-item" href={!! asset('/solicitudesBacteriologia?vista='.$vista.'&tipo=examenes') !!}>
            Solicitudes
          </a>
          <a class="dropdown-item" href={!! asset('/historialExamenes?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"").'&bacteriologia=1') !!}>
            Historial
          </a>
          @else
          @if ($est == "solicitudes")
            <a class="dropdown-item" href={!! asset('/examenesEvaluados?vista='.$vista.'&tipo=examenes') !!}>
              Evaluados
            </a>
            <a class="dropdown-item" href={!! asset('/examenesEntregados?vista='.$vista.'&tipo=examenes') !!}>
              Entregados
            </a>
            <a class="dropdown-item" href={!! asset('/historialExamenes?vista='.$vista.'&tipo=examenes') !!}>
              Historial
            </a>
          @elseif($est == "entregados")
            <a class="dropdown-item" href={!! asset('/solicitudex?vista='.$vista.'&tipo=examenes') !!}>
              Solicitudes
            </a>
            <a class="dropdown-item" href={!! asset('/examenesEvaluados?vista='.$vista.'&tipo=examenes') !!}>
              Evaluados
            </a>
            <a class="dropdown-item" href={!! asset('/historialExamenes?vista='.$vista.'&tipo=examenes') !!}>
              Historial
            </a>
          @else
            <a class="dropdown-item" href={!! asset('/solicitudex?vista='.$vista.'&tipo=examenes') !!}>
              Solicitudes
            </a>
            <a class="dropdown-item" href={!! asset('/examenesEvaluados?vista='.$vista.'&tipo=examenes') !!}>
              Evaluados
            </a>
            <a class="dropdown-item" href={!! asset('/examenesEntregados?vista='.$vista.'&tipo=examenes') !!}>
              Entregados
            </a>
            <a class="dropdown-item" href={!! asset('/historialExamenes?vista='.$vista.'&tipo=examenes') !!}>
              Historial
            </a>
          @endif
          @endif  
          <div class="dropdown-divider"></div>
            @if ($est == "evaluados")
              <a class="dropdown-item" href={!! asset('/examenesEvaluados?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"")) !!}>
            @elseif($est == "entregados")
              <a class="dropdown-item" href={!! asset('/examenesEntregados?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"")) !!}>
            @elseif($est == "historial")
            @if (isset($bacteriologia))
              <a class="dropdown-item" href={!! asset('/historialExamenes?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"").'&bacteriologia=1') !!}>
              @else
              <a class="dropdown-item" href={!! asset('/historialExamenes?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"")) !!}>
              @endif
            @else
              @if (isset($bacteriologia))
              <a class="dropdown-item" href={!! asset('/solicitudesBacteriologia?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"")) !!}>
              @else
                <a class="dropdown-item" href={!! asset('/solicitudex?tipo=examenes&vista='.(($vista!="paciente")?"paciente":"")) !!}>
              @endif
            @endif
            @if ($vista != "paciente")
              Por Paciente
            @else
              Por Exámenes
            @endif
          </a>  
        </div>
      </li>
      
    </ul>
    @include('Dashboard.boton_salir')
  </div>
</nav>