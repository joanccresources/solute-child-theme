(() => {
  document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar el elemento por su clase
    const woocommerceInfo = document.querySelector(".woocommerce-info");

    if (woocommerceInfo) {
      // Reemplazar el contenido con el texto traducido
      woocommerceInfo.innerHTML = `
          ¿Usar puntos para un descuento? <a href="#">Haz clic aquí</a>
      `;
    }
  });
})();