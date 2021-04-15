window.addEventListener('load', ()=> {
    let menu = document.querySelector('.menu-icon')
    let menuLinks = document.querySelector('.collapsible-menu-list')

    menu.addEventListener('click', () => {
        menuLinks.classList.toggle('menu-visible')
    })


})