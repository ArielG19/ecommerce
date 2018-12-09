var app = new Vue({
    el: '#app',
    data:{
    	Productos:[],
    	errors:[], //para mostrar errores
    	llenarInput:{'id':'','titulo':'','descripcion':'','precio':''},
    	add_titulo:'',
    	add_descripcion:'',
    	add_precio:'',
    	pagination:{
                	'total': 0,
		            'current_page': 0,
		            'per_page': 0,
		            'last_page': 0,
		            'from': 0,
		            'to': 0
        },
        offset:3,//nos sirve para el numero de paginacion
    },
    created(){
    	//llamamos el metodo para listar
    	this.getProductos();
    },
    computed: {
			isActived() {
				return this.pagination.current_page;
			},
			pagesNumber() {
				if(!this.pagination.to){
					return [];
				}

				var from = this.pagination.current_page - this.offset; 
				if(from < 1){
					from = 1;
				}

				var to = from + (this.offset * 2); 
				if(to >= this.pagination.last_page){
					to = this.pagination.last_page;
				}

				var pagesArray = [];
				while(from <= to){
					pagesArray.push(from);
					from++;
				}
				return pagesArray;
			}
	},
    methods:{
    	createProductos(){
    		var url = 'productos';
    		//llenamos los campos con los datos de los input
            axios.post(url,{titulo: this.add_titulo,descripcion:this.add_descripcion,precio:this.add_precio})
            .then(response => {
                
                this.getProductos();
                this.add_titulo ='';
                this.add_descripcion =''; 
                this.add_precio ='';                
                //ocultamos el modal
                $('#create').modal('hide');
                toastr.success('Producto Registrado');
                                      
            }).catch(error => {
                console.log(this.errors = error.response.data);
            });
    	},
    	getProductos(page){
    		var urlProductos = 'productos?page=' + page;
			axios.get(urlProductos).then(response => {
				//console.log(response.data);
				//pasamos la propiedad productos como esta en el controlador
				this.Productos = response.data.productos.data
				//paginamos
				this.pagination = response.data.pagination
				//console.log(response.data.pagination);
				
			})
			.catch(error =>{
                console.log(error);
            });
    	},
		changePage(page) {
			//metodo para cambiar de pagina 
			this.pagination.current_page = page;
			this.getProductos(page);
		},
		editProductos(productos){
			//console.log(productos);
			//llenamos los input con los datos obtenidos
			this.llenarInput.id = productos.id;
			this.llenarInput.titulo = productos.titulo;
			this.llenarInput.descripcion = productos.descripcion;
			this.llenarInput.precio = productos.precio;
			//$('#edit').modal('show');

		},
		updateProductos(id){ //recibimos el id
			var update = 'productos/'+id;
			axios.put(update,this.llenarInput).then(response => {
				//actualizamos la vista
				this.getProductos();
				//limpiamos el modal
				this.llenarInput = {'id':'','titulo':'','descripcion':'','precio':''};
				this.errors = [];
				$('#editar').modal('hide');
				toastr.info('Producto actualizado');
			}).catch(error => {
				this.errors = error.response.data
			});

		},
		eliminarProductos(id){
			//console.log(id);
			var eliminar = 'productos/'+id;
			axios.delete(eliminar).then(response => {
				this.getProductos();
				toastr.error('Producto eliminado');
			});
		}
    }
})
