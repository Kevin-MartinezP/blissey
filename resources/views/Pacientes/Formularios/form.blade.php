<div class="alert alert-danger" id="mout">
  <center>
    <p class="mb-1">El campo marcado con un * es <b>obligatorio</b>.</p>
  </center>
</div>
<div class="x_panel">
  <center>
    <h5 class="mb-1">Datos Personales</h5>
  </center>
  <div class="ln_solid mb-1 mt-1"></div>
  <div class="form-group col-sm-6">
    <label class="" for="nombre">Nombre *</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-user"></i></div>
      </div>
      {!! Form::text(
        'nombre',
        null,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Nombre del paciente']
      ) !!}
    </div>
  </div>
  
  <div class="form-group col-sm-6">
    <label class="" for="apellido">Apellido *</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-user"></i></div>
      </div>
      {!! Form::text(
        'apellido',
        null,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Apellido del paciente']
      ) !!}
    </div>
  </div>
  
  <div class="form-group col-sm-6">
    <label class="" for="nombre">Sexo *</label>
    <div class="input-group mb-2 mr-sm-2">
      @if ($create)    
        <div id="radioBtn" class="btn-group col-sm-12">
          <a class="btn btn-primary btn-sm active col-sm-6" data-toggle="sexo" data-title="1">Masculino</a>
          <a class="btn btn-primary btn-sm notActive col-sm-6" data-toggle="sexo" data-title="0">Femenino</a>
        </div>
        <input type="hidden" name="sexo" id="sexo" value="1">
      @else
        @if ($pacientes->sexo)
          <div id="radioBtn" class="btn-group col-sm-12">
            <a class="btn btn-primary btn-sm active col-sm-6" data-toggle="sexo" data-title="1">Masculino</a>
            <a class="btn btn-primary btn-sm notActive col-sm-6" data-toggle="sexo" data-title="0">Femenino</a>
          </div>
          <input type="hidden" name="sexo" id="sexo" value="1">
        @else
          <div id="radioBtn" class="btn-group col-sm-12">
            <a class="btn btn-primary btn-sm notActive col-sm-6" data-toggle="sexo" data-title="1">Masculino</a>
            <a class="btn btn-primary btn-sm active col-sm-6" data-toggle="sexo" data-title="0">Femenino</a>
          </div>
          <input type="hidden" name="sexo" id="sexo" value="0">
        @endif
      @endif
    </div>
  </div>
  
  <div class="form-group col-sm-6">
    <label class="" for="fechaNacimiento">Fecha de nacimiento *</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
      </div>
      @php
        $ahora = Carbon\Carbon::now();
      @endphp
      {!! Form::date(
        'fechaNacimiento',
        $fecha,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Nombre del paciente',
          'max'=>$ahora->format('Y-m-d'),
          'id' => 'fecha_paciente']
      ) !!}
    </div>
  </div>
  
  @if ($create)
    <div class="form-group col-sm-6" id="dui_paciente" style="display:none">
      <label class="" for="dui">DUI *</label>
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-credit-card"></i></div>
        </div>
        {!! Form::text(
          'dui',
          null,
          ['class'=>'form-control form-control-sm',
            'placeholder'=>'DUI del paciente',
            'data-inputmask'=>"'mask' : '99999999-9'"]
        ) !!}
      </div>
    </div>
  @else
    @if ($pacientes->fechaNacimiento->age >= 18)
      <div class="form-group col-sm-6" id="dui_paciente">
    @else
      <div class="form-group col-sm-6" id="dui_paciente" style="display:none">
    @endif
      <label class="" for="dui">DUI *</label>
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-credit-card"></i></div>
        </div>
        {!! Form::text(
          'dui',
          null,
          ['class'=>'form-control form-control-sm',
            'placeholder'=>'DUI del paciente',
            'data-inputmask'=>"'mask' : '99999999-9'"]
        ) !!}
      </div>
    </div>
  @endif
  
  <div class="form-group col-sm-6">
    <label class="" for="telefono">Tel??fono *</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-phone"></i></div>
      </div>
      {!! Form::text(
        'telefono',
        null,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Tel??fono del paciente',
          'data-inputmask'=>"'mask' : '9999-9999'"]
      ) !!}
    </div>
  </div>

  <div class="form-group col-sm-6">
    <label class="" for="alergia">Alergia a</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-medkit"></i></div>
      </div>
      {!! Form::textarea(
        'alergia',
        null,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Alergias del paciente',
          'rows'=>'2']
      ) !!}
    </div>
  </div>
</div>

<div class="x_panel">
  <center>
    <h5 class="mb-1">Direcci??n</h5>
  </center>
  <div class="ln_solid mb-1 mt-1"></div>
  <div class="form-group col-sm-6">
    <label class="" for="residencia">Residencia</label>
    <div class="input-group mb-2 mr-sm-2">
      @if ($create)    
        <div id="radioBtn" class="btn-group col-sm-12">
            <a class="btn btn-primary btn-sm active radio-pais col-sm-6" data-toggle="residencia_paciente" data-title="1" >Nacional</a>
            <a class="btn btn-primary btn-sm notActive radio-pais col-sm-6" data-toggle="residencia_paciente" data-title="0" >Extranjera</a>
          </div>
          <input type="hidden" name="residencia_paciente" id="residencia_paciente" value="1">
      @else
        @if ($pacientes->pais != null)
            <div id="radioBtn" class="btn-group col-sm-12">
              <a class="btn btn-primary btn-sm notActive radio-pais col-sm-6" data-toggle="residencia_paciente" data-title="1" >Nacional</a>
              <a class="btn btn-primary btn-sm Active radio-pais col-sm-6" data-toggle="residencia_paciente" data-title="0" >Extranjera</a>
            </div>
            <input type="hidden" name="residencia_paciente" id="residencia_paciente" value="0">
          @else
            <div id="radioBtn" class="btn-group col-sm-12">
              <a class="btn btn-primary btn-sm active radio-pais col-sm-6" data-toggle="residencia_paciente" data-title="1" >Nacional</a>
              <a class="btn btn-primary btn-sm notActive radio-pais col-sm-6" data-toggle="residencia_paciente" data-title="0" >Extranjera</a>
            </div>
            <input type="hidden" name="residencia_paciente" id="residencia_paciente" value="1">
          @endif    
      @endif
    </div>
  </div>
  
  <div class="form-group col-sm-6" id="pais_div" style="display:none;">
    <label class="" for="pais">Pa??s</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-flag"></i></div>
      </div>
      {!! Form::text(
        'pais',
        null,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Pa??s del paciente']
      ) !!}
    </div>
  </div>
  
  <div class="form-group col-sm-6" id="departamento_div">
    <label class="" for="pais">Departamento</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-map-marked"></i></div>
      </div>
      <select class='form-control form-control-sm' id="departamento_select" name="departamento">
        @if (!$create && $pacientes->departamento == "San Salvador")
          <option value="San Salvador" selected>San Salvador</option>  
        @else
          <option value="San Salvador">San Salvador</option>
        @endif
        @if (!$create && $pacientes->departamento == "Santa Ana")
          <option value="Santa Ana" selected>Santa Ana</option>  
        @else
          <option value="Santa Ana">Santa Ana</option>
        @endif
        @if (!$create && $pacientes->departamento == "San Miguel")
          <option value="San Miguel" selected>San Miguel</option>  
        @else
          <option value="San Miguel">San Miguel</option>
        @endif
        @if (!$create && $pacientes->departamento == "La Libertad")
          <option value="La Libertad" selected>La Libertad</option>  
        @else
          <option value="La Libertad">La Libertad</option>
        @endif
        @if (!$create && $pacientes->departamento == "Usulut??n")
          <option value="Usulut??n" selected>Usulut??n</option>  
        @else
          <option value="Usulut??n">Usulut??n</option>
        @endif
        @if (!$create && $pacientes->departamento == "Sonsonate")
          <option value="Sonsonate" selected>Sonsonate</option>  
        @else
          <option value="Sonsonate">Sonsonate</option>
        @endif
        @if (!$create && $pacientes->departamento == "La Uni??n")
          <option value="La Uni??n" selected>La Uni??n</option>  
        @else
          <option value="La Uni??n">La Uni??n</option>
        @endif
        @if (!$create && $pacientes->departamento == "La Paz")
          <option value="La Paz" selected>La Paz</option>  
        @else
          <option value="La Paz">La Paz</option>
        @endif
        @if (!$create && $pacientes->departamento == "Chalatenango")
          <option value="Chalatenango" selected>Chalatenango</option>  
        @else
          <option value="Chalatenango">Chalatenango</option>
        @endif
        @if (!$create && $pacientes->departamento == "Cuscatl??n")
          <option value="Cuscatl??n" selected>Cuscatl??n</option>  
        @else
          <option value="Cuscatl??n">Cuscatl??n</option>
        @endif
        @if (!$create && $pacientes->departamento == "Ahuachap??n")
          <option value="Ahuachap??n" selected>Ahuachap??n</option>  
        @else
          <option value="Ahuachap??n">Ahuachap??n</option>
        @endif
        @if (!$create && $pacientes->departamento == "Moraz??n")
          <option value="Moraz??n" selected>Moraz??n</option>  
        @else
          <option value="Moraz??n">Moraz??n</option>
        @endif
        @if (!$create && $pacientes->departamento == "San Vicente")
          <option value="San Vicente" selected>San Vicente</option>  
        @elseif(!$create)
          <option value="San Vicente">San Vicente</option>
        @else
          <option value="San Vicente" selected>San Vicente</option>  
        @endif
        @if (!$create && $pacientes->departamento == "Caba??as")
          <option value="Caba??as" selected>Caba??as</option>  
        @else
          <option value="Caba??as">Caba??as</option>
        @endif
      </select>
    </div>
  </div>
  
  <div class="form-group col-sm-6" id="municipio_div">
    <label class="" for="municipio">Municipio</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-map-marked"></i></div>
      </div>
      <select class='form-control form-control-sm' id="municipio_select" name="municipio">
      </select>
      @if (!$create)
        <input type="hidden" value="{{$pacientes->municipio}}" id="municipio_edit">
      @endif
    </div>
  </div>
  
  <div class="form-group col-sm-6">
    <label class="" for="direccion">Direcci??n</label>
    <div class="input-group mb-2 mr-sm-2">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-map-marked"></i></div>
      </div>
      {!! Form::textarea(
        'direccion',
        null,
        ['class'=>'form-control form-control-sm',
          'placeholder'=>'Direcci??n del paciente',
          'rows'=>'2']
      ) !!}
    </div>
  </div>
</div>

<div class="x_panel">
  <center>
    {!! Form::submit('Guardar',['class'=>'btn btn-primary btn-sm']) !!}
    <button type="reset" name="button" class="btn btn-light btn-sm">Limpiar</button>
    <a href={!! asset('/pacientes') !!} class="btn btn-light btn-sm">Cancelar</a>
  </center>
</div>
