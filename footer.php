<?php
global $solute_opt;
?>

<footer id="colophon" class="site-footer site-footer--joan">
  <div class="footer-top" style="background-color: #222429">
    <div class="container">
      <div class="row text-white py-5">
        <div class="col-md-4 mt-4 mt-md-0">
          <a href="https://arguz.pe/">
            <img src="https://arguz.pe/wp-content/uploads/2024/07/arguz-logotipo-alterno-68.png" alt="Logo Footer" />            
          </a>
          <p class="text-white" style="font-size: 14px;">Creemos firmemente que cada persona es una estrella que brilla con su propia luz y que, con ella, puede iluminar el camino de quienes la rodean.</p>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <h3 class="text-white">Navegación</h3>
          <hr />
          <ul class="ms-0 mb-0">
            <li>
              <a class="text-white" href="https://arguz.pe/funcionalidad/facturacion-electronica/">
                Facturación Electrónica
              </a>
            </li>
            <li>
              <a class="text-white" href="https://arguz.pe/">
                Conócenos
              </a>
            </li>
            <li>
              <a class="text-white" href="https://arguz.pe/crece-con-arguz/">
                Comunidad arguz
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <h3 class="text-white">Políticas y Condiciones</h3>
          <hr />
          <ul class="ms-0 mb-0">
            <li>
              <a href="https://arguz.pe/libro-de-reclamaciones/" class="d-flex align-items-center">
                <img src="https://arguz.pe/wp-content/uploads/2025/02/libro-reclamacion.png"
                  alt="Libro de reclamaciones" width="50"/>
                <span class="text-white">Libro de reclamaciones</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="copyright">
    <div class="container">
      <div class="copyright-wrapper">
        <?php if (!empty($solute_opt['copyright-text'])) { ?>
          <div class="copyright-text" style="text-align: center;">
            <p><?php echo $solute_opt['copyright-text']; ?></p>
          </div>
        <?php } else { ?>
          <div class="copyright-text" style="text-align: center;">
            <p>Copyright © solute all rights reserved.</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>