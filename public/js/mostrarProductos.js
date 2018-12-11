var app = new Vue({
    el: '#app',
    data:{
    	Productos:[],
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
    	getProductos(page){
    		var urlProductos = 'in-shopping-cart?page=' + page;
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
		crearCarrito(id){
			console.log(id);
			var producto_id = id;
            var shopping = 'in-shopping-cart';
            axios.post(shopping,{product_id:producto_id}).then(response => {
                toastr.success('Agregado al carrito'); 
                

            }).catch(error => {
                this.errors = error.response.data
            });
		}
    }
})
