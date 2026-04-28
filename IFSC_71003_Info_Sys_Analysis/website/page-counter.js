(function () {
  // Derive a page key from the current filename (e.g. "2026-04-20_EngineeringTech_Weekly")
  var filename = location.pathname.split('/').pop() || 'index';
  var pageKey = filename.replace(/\.php$|\.html?$/i, '') || 'index';

  fetch('pageCounter.php?page=' + encodeURIComponent(pageKey), {
    method: 'GET',
    cache: 'no-store',
    headers: { 'Accept': 'application/json' }
  })
    .then(function (res) { return res.ok ? res.json() : null; })
    .then(function (data) {
      if (!data || !data.ok) { return; }
      injectBadge(data.count);
    })
    .catch(function () { /* silently skip if PHP unavailable */ });

  function injectBadge(count) {
    var h1 = document.querySelector('h1');
    if (!h1) { return; }

    var badge = document.createElement('span');
    badge.className = 'pvc-badge';
    badge.title = 'Page visits';
    badge.innerHTML =
      '<span class="pvc-icon" aria-hidden="true">👁</span>' +
      '<span class="pvc-num">' + count + '</span>' +
      '<span class="pvc-label"> visits</span>';

    // Insert after the h1 rather than inside it to preserve heading semantics
    h1.insertAdjacentElement('afterend', badge);
  }
})();
