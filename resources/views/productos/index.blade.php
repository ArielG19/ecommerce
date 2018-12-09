@extends('layouts.app')
@section('content')
	<div class="big-padding text-center blue-grey white-text">
				<h1>Productos</h1>
	</div>

	<div class="container">
		<!-- Btn modal create-->
			<a href="#" class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#create">Agregar Producto</a>
		<!-- include del modal create-->
			@include('productos.modalCreate')
		<!-- fin modal create-->

		<!-- Inicio de lista de datos-->
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Titulo</th>
		      <th scope="col">Descripción</th>
		      <th scope="col">Precio</th>
		      <th scope="col">Opciones</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr v-for="producto in Productos">
		      <th scope="row">@{{producto.id}}</th>
		      <td>@{{producto.titulo}}</td>
		      <td>@{{producto.descripcion}}</td>
		      <td>@{{producto.precio}}</td>
		      <td>
		      		<a href="#" class="btn btn-danger" v-on:click.prevent="eliminarProductos(producto.id)">Eliminar</a>

                  	<a href="#" data-toggle="modal" data-target="#editar" class="btn btn-warning" v-on:click.prevent="editProductos(producto)">Editar</a>
		      </td>
		    </tr>
		  </tbody>
		</table>
		<!-- Fin de lista de datos-->

		<!-- Modal editar-->
		@include('productos.modalEditar')

		<!--Inicio paginacion-->
		@include('productos.paginacion')
		<!--Fin paginacion-->        
	</div>
@endsection
@section('script')
<script src="{{asset('js/productos.js')}}"></script>
@endsection