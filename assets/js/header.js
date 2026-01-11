gsap.registerPlugin(ScrollTrigger);

export default function initHeader() {
    openNavigationMobile();
}

function openNavigationMobile() {
    let wrapper = document.querySelector('.header__navigation');
    let menuToggleOpen = document.querySelector('.js-open-menu');
    let menuToggleClose = document.querySelector('.js-close-menu');
    let menuButtonWrapper = document.querySelector('.js-button-slider');
    let menuItems = document.querySelectorAll('.js-navigation__item > .nav-item')
    let bottomButtons = document.querySelectorAll('.js-bottom-buttons');

    let tl = gsap.timeline({
        paused: true,
        onStart: () => {
            wrapper.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        },
        onReverseComplete: () => {
            wrapper.classList.add('hidden');
            document.body.style.overflow = '';
            mobileHeader.classList.remove('is-open');
        }
    });

    tl.to(wrapper, {
        x: 0,
        ease: 'power4.inOut',
        duration: 0.7
    }, 0);

    tl.to([bottomButtons, menuItems], {
        autoAlpha: 1,
        x: 0,
        ease: 'power4.inOut',
        duration: 0.5
    }, 0.4);

    tl.to(menuButtonWrapper, {
        translateY: "-50%",
    }, 0.1);

    const mobileHeader = document.querySelector('.header__inner--mobile');

    menuToggleOpen.addEventListener('click', () => {
        tl.play();
        mobileHeader.classList.add('is-open');
    });

    menuToggleClose.addEventListener('click', () => {
        tl.reverse();
    });
}
