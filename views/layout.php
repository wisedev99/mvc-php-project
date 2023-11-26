<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <title>MVC project</title>
    <style>
        html {
            scroll-behavior: smooth
        }

        body {
            font-family: Helvetica, sans-serif, regular;
            font-size: 16px;
        }

        .swiper {
            height: 240px;
        }
    </style>
</head>

<body class="bg-[#f8f8f8]">
    <div id="app" class="mx-auto ">
        <header class="fixed w-full top-0 left-0 right-0 h-auto z-50">
            <nav class="bg-white border-green-200 bg-white">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 relative">
                    <a href="/" class="flex items-center space-x-3 ">
                        <img src="/assets/images/header_logo.png" class="" alt="Header Logo">
                    </a>
                    <button @click="openMenu()" class="md:hidden" v-if="!menu" type="button">
                        <div class="flex justify-center items-center">
                            <span class="text-lg text-black">Menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 font-bold text-black ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>

                    </button>
                    <button @click="openMenu()" v-if="menu" class="md:hidden" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 hover:bg-black hover:text-red-500 h-8 text-black">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class=" w-full h-screen md:h-auto z-50 md:block md:w-auto" :class="{'hidden': !menu}" id="navbar-default">
                        <ul class="font-medium h-full bg-white flex flex-col p-4 md:p-0  md:flex-row md:items-center md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white ">
                            <li>
                                <a href="/" class="block py-2 px-3 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 " aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="/products" class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white">All Items</a>
                            </li>
                            <li>
                                <a href='/category?name="Day-Date"' class=" block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Daydate</a>
                            </li>
                            <li>
                                <a href='/category?name="Date Just Pearl"' class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Dayjust Pearl</a>
                            </li>
                            <li>
                                <a href='/category?name="Date Just"' class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Date Just</a>
                            </li>
                            <li>
                                <button class="bg-[#127849] transition duration-500 ease-in-out text-white border border-[#127849] hover:text-[#127849] hover:bg-transparent rounded-xl px-4 py-1.5">Contact us</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-20 max-w-screen-xl bg-white mx-auto">
            <?php include $page; ?>
        </main>
        <footer class="py-20 bg-white  mx-auto">
            <div class="w-full space-y-8 flex flex-col justify-center items-center">
                <img src="/assets/images/footer_logo.jpg" class="order-2 md:order-1 w-24 " alt="">
                <ul class="font-medium h-full divide-y order-1 md:order-2  md:divide-y-0 divide-slate-200 w-full  md:bg-white flex flex-col p-4 md:p-0  md:flex-row md:items-center justify-center md:py-2 md:border md:border-gray-200 md:space-x-8 rtl:space-x-reverse md:mt-0  md:bg-white ">
                    <li></li>
                    <li>
                        <a href="/" class="block py-2 px-3 text-green-900  text-center rounded md:bg-transparent md:text-green-700 md:p-0 " aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/products" class="block py-2 px-3 text-green-900 text-center rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white">All Items</a>
                    </li>
                    <li>
                        <a href='/category?name="Day-Date"' class="block py-2 px-3 text-green-900  text-center rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Daydate</a>
                    </li>
                    <li>
                        <a href='/category?name="Date Just Pearl"' class="block py-2 px-3 text-green-900 text-center rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Dayjust Pearl</a>
                    </li>
                    <li>
                        <a href='/category?name="Date Just"' class="block py-2 px-3 text-green-900 text-center rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Date Just</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-green-900 text-center rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Contact us</a>
                    </li>
                    <li></li>

                </ul>
                <button @click="scrollToTop()" class="order-3 rounded-full bg-[#127849] p-4 text-white hover:bg-transparent border border-[#127849] hover:text-[#127849] transition duration-500 ease-in-out"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                </button>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        const {
            createApp,
            ref
        } = Vue

        createApp({
            components: {
                SliderComponent: {
                    template: `
          <div class="swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide" v-for="slide in slides" :key="slide.id" :style="'background-color: ' + slide.backgroundColor">
              <img :src="slide.img" />
              </div>
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev" @click="prevSlide"></div>
            <div class="swiper-button-next" @click="nextSlide"></div>
            <div class="swiper-scrollbar"></div>
          </div>
        `,
                    data() {
                        return {
                            swiper: null,
                            slides: [{
                                    id: 1,
                                    img: '/assets/images/slider/keep-exploring-rolex-collection_portrait.jpg',
                                },


                                {
                                    id: 2,
                                    img: '/assets/images/slider/keep-exploring-new-2019-watches_portrait.jpg'
                                },
                                {
                                    id: 3,
                                    img: '/assets/images/slider/keep-exploring-contact-us_portrait.jpg'
                                },
                                {
                                    id: 4,
                                    img: '/assets/images/slider/keep-exploring-landing-page_portrait.jpg'
                                },

                            ]
                        };
                    },
                    mounted() {
                        this.initializeSwiper();
                    },
                    methods: {
                        initializeSwiper() {
                            this.swiper = new Swiper('.swiper', {
                                slidesPerView: 2,
                                spaceBetween: 20,
                                breakpoints: {
                                    // when window width is >= 320px
                                    996: {
                                        slidesPerView: 3,
                                        spaceBetween: 20
                                    }

                                },

                                autoplay: {
                                    delay: 5000,
                                },

                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev'
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true
                                },
                                scrollbar: {
                                    el: '.swiper-scrollbar'
                                }
                            });
                        },
                        nextSlide() {
                            if (this.swiper) {
                                this.swiper.slideNext();
                            }
                        },
                        prevSlide() {
                            if (this.swiper) {
                                this.swiper.slidePrev();
                            }
                        },

                    }
                },
                'grid-component': GridComponent,
            },
            setup() {
                const menu = ref(false)

                function openMenu() {
                    menu.value = menu.value ? false : true
                }

                function scrollToTop() {
                    window.scrollTo(0, 0);
                }
                return {
                    menu,
                    openMenu,
                    scrollToTop
                }
            }
        }).mount('#app')
    </script>
</body>

</html>
