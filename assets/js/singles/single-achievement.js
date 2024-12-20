(() => {
  const isSingleAchievement = () =>
    !!document.querySelector(`body.single:has(.single-achievement-php)`);

  const changeColumns = () => {
    const $body = document.querySelector(
      `body.single:has(.single-achievement-php)`
    );
    const $col8 = $body.querySelector(`.blog-details .col-lg-8`);
    const $col4 = $body.querySelector(`.blog-details .col-lg-4`);

    if (!$col8 || !$col4) return;
    $col8.classList.replace("col-lg-8", "col-lg-12");
    $col4.classList.replace("col-lg-4", "d-none");
  };

  const addTargetInShared = () => {
    const $body = document.querySelector(
      `body.single:has(.single-achievement-php)`
    );
    const $links = $body.querySelectorAll(`.social-share a`);
    $links.forEach(($link) => {
      $link.setAttribute("target", "_blank");
    });
  };

  const changeUrlUser = () => {
    const urlPerfil = `https://${location.hostname}/perfil/`;

    const getNewHref = ($link) => {
      const url = new URL($link.getAttribute("href"));
      const pathSegments = url.pathname.split("/");
      const lastPart = pathSegments[pathSegments.length - 2];
      const formattedPart = lastPart.replaceAll("-", "%20");
      return `${urlPerfil}${formattedPart}`;
    };

    const $body = document.querySelector(
      `body.single:has(.single-achievement-php)`
    );
    const $links = $body.querySelectorAll(
      `.gamipress-achievement-earners-list a`
    );

    if ($links.length === 0) return;

    $links.forEach(($link) => {
      const href = getNewHref($link);
      $link.setAttribute("href", href);
      $link.setAttribute("target", "_blank");
    });
  };

  const initDomReady = () => {
    if (isSingleAchievement()) {
      changeColumns();
      addTargetInShared();
      changeUrlUser();
    }
  };

  document.addEventListener("DOMContentLoaded", initDomReady);
})();
