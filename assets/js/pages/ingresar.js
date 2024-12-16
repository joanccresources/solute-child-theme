(() => {
  const changeTextUserNameForm = () => {
    const usernameLbl = document.querySelector(`[for*="username"]`);
    const usernameInput = document.querySelector(`#username`);

    if (!usernameInput || !usernameLbl) return;

    usernameLbl.innerHTML = `Correo electrónico&nbsp;<span class="required">*</span>`;
    usernameInput.setAttribute("placeholder", "Correo electrónico");
  };

  const initDomReady = () => {
    changeTextUserNameForm();
  };
  document.addEventListener("DOMContentLoaded", initDomReady);
})();