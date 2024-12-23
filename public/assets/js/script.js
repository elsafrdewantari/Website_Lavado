document.getElementById('sidepanel-toggler')?.addEventListener('click', function (e) {
    e.preventDefault();
    document.getElementById('app-sidepanel').classList.toggle('open');
});
