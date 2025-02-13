<aside id="secondary" class="widget-area">
  <?php
  $terms = get_terms(array(
    'taxonomy' => 'tipo_de_academia',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => true,
  )); ?>
  <?php if ($terms && !is_wp_error($terms)): ?>
    <section id="block-6" class="widget widget_block">
      <div class="wp-block-group">
        <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
          <h2 class="wp-block-heading">Categorías</h2>
          <ul class="wp-block-categories-list wp-block-categories">
            <?php foreach ($terms as $term): ?>
              <li class="cat-item cat-item-<?php echo $term->term_id; ?>">
                <a href="<?php echo esc_url(get_term_link($term)); ?>">
                  <?php echo $term->name; ?>
                </a>
              </li>
              <?php
            endforeach; ?>
          </ul>
        </div>
      </div>
    </section>
  <?php endif; ?>
</aside>

<!-- <section id="block-2" class="widget widget_block widget_search">
        <form role="search" method="get" action="https://arguz.pe/"
              class="wp-block-search__button-outside wp-block-search__text-button wp-block-search"><label
                class="wp-block-search__label" for="wp-block-search__input-1">Buscar</label>
              <div class="wp-block-search__inside-wrapper "><input class="wp-block-search__input"
                  id="wp-block-search__input-1" placeholder="" value="" type="search" name="s" required=""><button
                  aria-label="Buscar" class="wp-block-search__button wp-element-button" type="submit">Buscar</button>
              </div>
            </form>
          </section> -->
<!-- <section id="block-3" class="widget widget_block">
            <div class="wp-block-group">
              <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                <h2 class="wp-block-heading">Publicaciones recientes</h2>

                <ul class="wp-block-latest-posts__list wp-block-latest-posts">
                  <li><a class="wp-block-latest-posts__post-title"
                      href="https://arguz.pe/crece-con-arguz/empresa/4-claves-como-lider-para-fomentar-el-compromiso-laboral/">4
                      claves como líder para fomentar el compromiso laboral</a></li>
                  <li><a class="wp-block-latest-posts__post-title"
                      href="https://arguz.pe/crece-con-arguz/salud-bienestar/los-4-imperios-interiores-transforma-tu-mundo-empezando-por-ti/">Los
                      4 Imperios Interiores: Transforma tu mundo empezando por ti</a></li>
                </ul>
              </div>
            </div>
          </section> -->
<!-- <section id="block-6" class="widget widget_block">
            <div class="wp-block-group">
              <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                <h2 class="wp-block-heading">Categorías</h2>
                <ul class="wp-block-categories-list wp-block-categories">
                  <li class="cat-item cat-item-2">
                    <a href="https://arguz.pe/crece-con-arguz/category/empresa/">Empresa</a>
                  </li>
                  <li class="cat-item cat-item-40">
                    <a href="https://arguz.pe/crece-con-arguz/category/liderazgo/">Liderazgo</a>
                  </li>
                  <li class="cat-item cat-item-3">
                    <a href="https://arguz.pe/crece-con-arguz/category/salud-bienestar/">Salud y Bienestar</a>
                  </li>
                </ul>
              </div>
            </div>
          </section> -->