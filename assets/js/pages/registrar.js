(() => {
  const changeTextUserNameForm = () => {
    const usernameInput = document.querySelector(`#reg_username`);
    const usernameLbl = document.querySelector(`[for*="reg_username"]`);

    if (!usernameInput || !usernameLbl) return;

    usernameLbl.innerHTML = `Nombre completo&nbsp;<span class="required">*</span>`;
    usernameInput.setAttribute("placeholder", "Nombre completo");
  };

  const initDomReady = () => {
    changeTextUserNameForm();
  };
  document.addEventListener("DOMContentLoaded", initDomReady);
})();
