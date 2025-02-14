<aside id="secondary" class="widget-area">
  <!-- <section id="block-2" class="widget widget_block widget_search">
    <form role="search" method="get" action="https://arguz.pe/"
      class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
      <label class="wp-block-search__label" for="wp-block-search__input-1">Buscar</label>
      <div class="wp-block-search__inside-wrapper ">
        <input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="" value="" type="search"
          name="s" required="">
        <button aria-label="Buscar" class="wp-block-search__button wp-element-button" type="submit">Buscar</button>
      </div>
    </form>
  </section> -->
  <section id="block-2" class="widget widget_block widget_search">
    <form role="search" method="get" action="<?php echo home_url('/'); ?>"
      class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
      <label for="search-academia" class="wp-block-search__label">Buscar en Academia</label>
      <div class="wp-block-search__inside-wrapper">
        <input type="search" id="search-academia" class="wp-block-search__input" name="s" placeholder="Buscar..."
          required>
        <input type="hidden" name="post_type" value="academia_arguz">
        <button type="submit" class="wp-block-search__button wp-element-button">Buscar</button>
      </div>
    </form>
  </section>
  <?php
  $args = array(
    'post_type' => 'academia_arguz',
    'posts_per_page' => 4,
    'post_status' => 'publish',
  );

  $query = new WP_Query($args); ?>
  <?php if ($query->have_posts()): ?>
    <section id="block-3" class="widget widget_block">
      <div class="wp-block-group">
        <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
          <h2 class="wp-block-heading">Publicaciones recientes</h2>
          <ul class="wp-block-latest-posts__list wp-block-latest-posts">
            <?php while ($query->have_posts()): ?>
              <?php $query->the_post(); ?>
              <li>
                <a class="wp-block-latest-posts__post-title" href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

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