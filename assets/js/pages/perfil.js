(() => {
  const addTargetInCertificate = () => {
    const handleFunction = () => {
      const $links = document.querySelectorAll(`.profile-certificates a`);
      Array.from($links).forEach(($link) => {
        $link.setAttribute("target", "_blank");
      });
    };

    let i = 0;
    const interval = setInterval(() => {
      handleFunction();
      if (i >= 20) clearInterval(interval);
      i++;
    }, 250);
  };

  const initDomReady = () => {
    addTargetInCertificate();
  };

  document.addEventListener("DOMContentLoaded", initDomReady);
  window.addEventListener("load", initDomReady);
})();
