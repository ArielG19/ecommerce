@extends('layouts.app')
@section('content')
	<div class="big-padding text-center blue-grey white-text">
				<h1>Todos los Productos</h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div v-for="producto in Productos" class="col-md-3">
			<!-- Inicio de lista de datos-->
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src="/images/morat.jpg" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title"> @{{producto.titulo}} </h5>
			    <p class="card-text">@{{producto.precio}}</p>
			    <p class="card-text">@{{producto.descripcion}}</p>
			    <a :href="`/in-shopping-cart/${producto.id}`" class="btn btn-primary">Ver más</a>
			    
			    	<a href="/mostrar-productos" class="btn btn-success" v-on:click="crearCarrito(producto.id)">Añadir
			    	<i class="fas fa-shopping-cart"></i>
			    	</a>
				
			  </div>
			</div>
			</div>
		</div>
			<!-- Fin de lista de datos-->

		<!-- Modal editar-->
		

		<!--Inicio paginacion-->
		
		<!--Fin paginacion-->        
	</div>
@endsection
@section('script')
<script src="{{asset('js/mostrarProductos.js')}}"></script>
@endsection