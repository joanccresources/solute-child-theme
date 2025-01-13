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

  const addPointsHtml = () => {
    const $title = document.querySelector(".lp-profile-username");
    if (!$title) return;
    $title.insertAdjacentHTML("afterend", data.puntos);

    const $total = document.querySelector(`.gamipress-user-points-punto`);
    if (!$total) return;
    $total.insertAdjacentHTML(
      "afterbegin",
      `<span><b>Total de puntos:</b></span>`
    );

    // Corregir los 101 puntos del inicio
    const $userPoints = document.querySelector(
      "#learn-press-profile .gamipress-user-points-punto .gamipress-user-points-amount"
    );
    if (!$userPoints) return;
    const userPoints = $userPoints.innerHTML.trim();
    $userPoints.innerHTML = Number(userPoints - 101);
  };

  const addAchievements = () => {
    const $profileHeader = document.querySelector(".wrapper-profile-header");
    if (!$profileHeader) return;
    const html = `
      <div class="alert alert-primary mb-0 mt-3">
        <p class="h5">Logros Obtenidos: </p>
        <div id="list-logros"></div>
      </div>
    `;
    $profileHeader.insertAdjacentHTML("afterend", html);
    $listLogros = document.querySelector("#list-logros");
    $listLogros.innerHTML = data.achievements_html;
  };

  const initDomReady = () => {
    addTargetInCertificate();
    addPointsHtml();
    addAchievements();
    console.log(data);
  };
  const initLoadReady = () => {
    addTargetInCertificate();
  };

  document.addEventListener("DOMContentLoaded", initDomReady);
  window.addEventListener("load", initLoadReady);
})();
