<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MVC project</title>
</head>

<body id="app" class="bg-[#f8f8f8]">
    <div class="max-w-[90%] mx-auto">
        <header class="fixed w-full top-0 left-0 right-0 h-auto">
            <nav class="bg-white border-green-200 bg-white">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 relative">
                    <a href="/" class="flex items-center space-x-3 ">
                        <img src="./assets/images/header_logo.png" class="" alt="Header Logo">
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
                        <ul class="font-medium h-full bg-white flex flex-col p-4 md:p-0  border border-green-100 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white ">
                            <li>
                                <a href="#" class="block py-2 px-3 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 " aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white">All Items</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Daydate</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Dayjust Pearl</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Date Just</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-3 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 ">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="mt-24 bg-green-200">
            <?php include $page; ?>
        </main>

        <footer>
            footer
        </footer>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        const {
            createApp,
            ref
        } = Vue

        createApp({
            setup() {
                const menu = ref(false)

                function openMenu() {
                    menu.value = menu.value ? false : true
                }
                return {
                    menu,
                    openMenu
                }
            }
        }).mount('#app')
    </script>
</body>

</html>
