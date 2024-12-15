(() => {
  const validateForm = () => {
    const $form = document.querySelector(`body.single-lp_course #commentform`);
    const $btnSend = document.querySelector(
      `body.single-lp_course #commentform [type="submit"]`
    );
    if (!$form || !$btnSend) return;

    const validate = () => {
      const $area = $form.querySelector("textarea");
      // Si esta vacio agregamos no-validate
      $area.value.trim().length === 0
        ? $btnSend.classList.add("no-validate")
        : $btnSend.classList.remove("no-validate");
    };

    const addEvents = () => {
      const $area = $form.querySelector("textarea");
      $area.addEventListener("keydown", validate);
      $area.addEventListener("keyup", validate);
      $area.addEventListener("focus", validate);
      $area.addEventListener("blur", validate);
    };

    validate();
    addEvents();
  };

  const initDomReady = () => {
    console.log("Hola Mundo ddd");
    validateForm();
  };

  document.addEventListener("DOMContentLoaded", initDomReady);
})();
