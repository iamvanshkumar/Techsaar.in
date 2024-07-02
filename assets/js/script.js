AOS.init();

document.addEventListener('DOMContentLoaded', () => {
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 109,
                density: {
                    enable: true,
                    value_area: 868.0624057955
                }
            },
            color: {
                value: "#ffffff"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000"
                },
                polygon: {
                    nb_sides: 5
                },
                image: {
                    src: "img/github.svg",
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: 0.5,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                    speed: 40,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 4,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "repulse"
                },
                onclick: {
                    enable: true,
                    mode: "push"
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 119.88,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 450.68,
                    size: 73.08,
                    duration: 3.82,
                    opacity: 8,
                    speed: 2
                },
                repulse: {
                    distance: 135.86,
                    duration: 0.4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
    });

    const stats = new Stats();
    stats.showPanel(0);
    document.body.appendChild(stats.dom);

    const update = () => {
        stats.begin();
        stats.end();
        requestAnimationFrame(update);
    };

    requestAnimationFrame(update);

    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 6000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    // GSAP Parallax Effect
    gsap.to("#particles-js", {
        yPercent: 20,
        ease: "none",
        scrollTrigger: {
            trigger: "#particles-js",
            start: "top bottom",
            end: "bottom top",
            scrub: true
        }
    });

    // Change header style on scroll
    const nav = document.querySelector('nav');
    const headerHeight = document.querySelector('header').offsetHeight;

    window.addEventListener('scroll', () => {
        if (window.scrollY > headerHeight / 2) {
            nav.classList.add('fixed-nav');
        } else {
            nav.classList.remove('fixed-nav');
        }
    });

    const counters = document.querySelectorAll('.count');
    const speed = 800; // The lower the slower

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;

            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
});