@extends('principal') 
@section('layout') 
	@include('Empresa.Barra.index')
	@if (Auth::check())
		<div class="col-sm-8">
			<div id="accordion">
				<div class="card">
					<div class="card-header p-0" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								PromeSalud
							</button>

							@if (Auth::user()->administrador)	
								<a href={{asset('/grupo_promesa/'.$empresa->id.'-1/edit')}} class="btn btn-link float-right">
									<i class="fa fa-edit"></i>
								</a>
							@endif
						</h5>
					</div>

					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body p-2">
							@include('Empresa.Partes.hospital')
						</div>
					</div>
				</div>

				<div class="card">
          <div class="card-header p-0" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Laboratorio Clínico
							</button>
							
							@if (Auth::user()->administrador)	
								<a href={{asset('/grupo_promesa/'.$empresa->id.'-2/edit')}} class="btn btn-link float-right">
									<i class="fa fa-edit"></i>
								</a>
							@endif
							</a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body p-2">
              @include('Empresa.Partes.laboratorio')
            </div>
          </div>
				</div>
					
			
		<div class="card">
			<div class="card-header p-0" id="headingSix">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
				  Sello de laboratorio
							  </button>
			  </h5>
			</div>
			<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
			  <div class="card-body p-2">
				@include('Empresa.Partes.sello_laboratorio')
			  </div>
			</div>
		  </div>
			</div>	
		</div>
	@endif
@endsection