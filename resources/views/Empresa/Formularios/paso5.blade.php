<div class="row">
	<div class="col-3">
		<div class="form-group">
			<label class="col-md-12 col-sm-12 col-xs-12">Logo de PromeSalud *</label>
		</div>
		<div class="">
			<center>
				<output id="list" class="col-sm-12 col-xs-12">
					@if ($create)
					<img src={{asset(Storage::url( 'noImgen.jpg'))}} style="height : 200px; width: 200px; object-fit: contain;"> @else
					<img src={{asset(Storage::url($empresa->logo_hospital))}} style="height : 200px; width: 200px; object-fit: contain;"> @endif
				</output>
			</center>
		</div>
		<div class="form-group">
			<div class="input-group mb-2 mr-sm-2">
				<div class="custom-file input-group">
					<input type="file" name="logo_hospital" class="custom-file-input" id="logo_hospital" lang="es">
					<label class="form-control-sm custom-file-label " for="customFileLang">Seleccionar Archivo</label>
				</div>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			<label class="col-md-12 col-sm-12 col-xs-12">Logo de Laboratorio *</label>
		</div>
		<div class="">
			<center>
				<output id="list2">
					@if ($create)
					<img src={{asset(Storage::url( 'noImgen.jpg'))}} style="height : 200px; width: 200px; object-fit: contain;"> @else
					<img src={{asset(Storage::url($empresa->logo_laboratorio))}} style="height : 200px; width: 200px; object-fit: contain;"> @endif
				</output>
			</center>
		</div>
		<div class="form-group">
			<div class="input-group mb-2 mr-sm-2">
				<div class="custom-file input-group">
					<input type="file" name="logo_laboratorio" class="custom-file-input" id="logo_laboratorio" lang="es">
					<label class="form-control-sm custom-file-label " for="customFileLang">Seleccionar Archivo</label>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<div class="col-3">
		<div class="form-group">
			<label class="col-md-12 col-sm-12 col-xs-12">Sello de laboratorio *</label>
		</div>
		<div class="">
			<center>
				<output id="list6">
					@if ($create)
					<img src={{asset(Storage::url('noImgen.jpg'))}} style="height : 200px; width: 200px; object-fit: contain;"> @else
					<img src={{asset(Storage::url($empresa->sello_laboratorio))}} style="height : 200px; width: 200px; object-fit: contain;"> @endif
				</output>
			</center>
		</div>
		<div class="form-group">
			<div class="input-group mb-2 mr-sm-2">
				<div class="custom-file input-group">
					<input type="file" name="sello_laboratorio" class="custom-file-input" id="sello_laboratorio" lang="es">
					<label class="form-control-sm custom-file-label " for="customFileLang">Seleccionar Archivo</label>
				</div>
			</div>
		</div>
	</div>
</div>