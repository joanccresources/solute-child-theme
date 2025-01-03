(() => {
  const handleTranslate = () => {
    // Seleccionar el elemento por su clase
    const woocommerceInfo = document.querySelector(".woocommerce-info");
    if (woocommerceInfo) {
      // Reemplazar el contenido con el texto traducido
      woocommerceInfo.innerHTML = `
      ¿Usar puntos para un descuento? <a href="#">Haz clic aquí</a>`;
    }

    // Traducir "Amount"
    const amountLabel = document.querySelector(
      ".gamipress-wc-partial-payments-points-label"
    );
    if (amountLabel) {
      amountLabel.textContent = "Cantidad:";
    }
  };

  const hideRepeatElements = () => {
    const elements = document.querySelectorAll(
      "#gamipress-wc-partial-payments"
    );
    elements.forEach((element, i) => {
      if (i !== 0) element.classList.add("d-none");
    });
  };

  const initDomReady = () => {
    handleTranslate();
    hideRepeatElements();
  };

  document.addEventListener("DOMContentLoaded", initDomReady);
  window.addEventListener("load", initDomReady);
})();
