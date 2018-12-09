<ul class="pagination">
        <li v-if="pagination.current_page > 1" class="page-item">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
            <span>Atras</span>
          </a>
        </li>
        
        <!--numero de paginas que se estan paginando y la que esta activa-->
				<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']" class="page-item">
          <a class="page-link" href="#" @click.prevent="changePage(page)">
             @{{ page }}
          </a>
        </li>

                            
        <li v-if="pagination.current_page < pagination.last_page" class="page-item">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
            <span>Siguiente</span>
          </a>
        </li>
</ul>