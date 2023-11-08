<script lang="ts" setup>

import { Head, Link } from '@inertiajs/vue3';
console.log(route().current())
</script>
<template>
    <Head title="Welcome" />
    <div class="bg-white min-h-screen min-w-screen">
        <div class="px-6 py-4 xl:container xl:mx-auto">
            <!-- Navbar -->
            <nav class="flex justify-between w-full h-full bg-white xl:px-[150px]">
                <div class="justify-start">
                    <svg width="96" height="23" viewBox="0 0 96 23" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="96" height="23" fill="url(#pattern0)"/>
                        <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_1326_7856" transform="matrix(0.00272254 0 0 0.0113636 -0.00775331 0)"/>
                        </pattern>
                        <image id="image0_1326_7856" width="373" height="88" xlink:href="data:image/png;base64,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"/>
                        </defs>
                    </svg>
                </div>
                <div class="hidden md:flex justify-end ">
                    <Link
                        :href="route('welcome')"
                        class="mr-5 font-medium text-base "
                        :class="{ 'text-accent underline underline-offset-4' : route().current('welcome'), 'text-black hover:text-accent' : !route().current('welcome')}"
                        >
                        How it works</Link>

                    <Link
                        :href="route('marketplace')"
                        class="mr-5 font-medium text-base"
                        :class="{ 'text-accent underline underline-offset-4' : route().current('marketplace.*'), 'text-black hover:text-accent' : !route().current('marketplace.*')}"
                        >
                    Marketplace</Link>

                    <Link
                        :href="route('job.marketplace')"
                        class="mr-5 font-medium text-base"
                        :class="{ 'text-accent underline underline-offset-4' : route().current('job.marketplace'), 'text-black hover:text-accent' : !route().current('job.marketplace')}"
                        >
                    Job Marketplace</Link>

                    <Link
                        href=""
                        class="mr-5 font-medium text-base text-black hover:text-accent"
                        :class="{ 'text-accent underline underline-offset-4' : route().current('app'), 'text-black hover:text-accent' : !route().current('app')}"
                        >
                    Get the app</Link>

                    <Link
                        :href="route('welcome')"
                        class="mr-5 font-medium text-base text-black hover:text-accent"
                        :class="{ 'text-accent underline underline-offset-4' : route().current('payment'), 'text-black hover:text-accent' : !route().current('payment')}"
                        >
                    Payment Portal</Link>
                </div>
            </nav>
        </div>

        <div class="xl:container xl:mx-auto">
            <slot />
        </div>

        <section class="bg-fill w-full h-full py-5 px-6 mt-[60px]">
            <div class="xl:container xl:mx-auto">
                <div class="xl:mx-[150px] xl:px-6 flex flex-col items-start space-y-6 md:space-y-0 md:flex-row md:justify-between ">
                    <div class="space-y-4">
                        <p class="text-white font-normal text-base xl:text-xl">
                            Follow us
                        </p>
                        <div class="flex space-x-5 items-center">
                            <Link href="" class="scale-75 xl:scale-100">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1326_7741)">
                                    <path d="M35 17.5C35 7.83501 27.165 0 17.5 0C7.83501 0 0 7.83501 0 17.5C0 26.2346 6.39946 33.4746 14.7656 34.7874V22.5586H10.3223V17.5H14.7656V13.6445C14.7656 9.25859 17.3783 6.83594 21.3756 6.83594C23.2897 6.83594 25.293 7.17773 25.293 7.17773V11.4844H23.0863C20.9125 11.4844 20.2344 12.8334 20.2344 14.2188V17.5H25.0879L24.312 22.5586H20.2344V34.7874C28.6005 33.4746 35 26.2346 35 17.5Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1326_7741">
                                    <rect width="35" height="35" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </Link>
                            <Link href="" class="scale-75 xl:scale-100">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1326_7743)">
                                    <path d="M17.5 3.15137C22.1758 3.15137 22.7295 3.17187 24.5684 3.25391C26.2773 3.3291 27.2002 3.61621 27.8154 3.85547C28.6289 4.16992 29.2168 4.55273 29.8252 5.16113C30.4404 5.77637 30.8164 6.35742 31.1309 7.1709C31.3701 7.78613 31.6572 8.71582 31.7324 10.418C31.8145 12.2637 31.835 12.8174 31.835 17.4863C31.835 22.1621 31.8145 22.7158 31.7324 24.5547C31.6572 26.2637 31.3701 27.1865 31.1309 27.8018C30.8164 28.6152 30.4336 29.2031 29.8252 29.8115C29.21 30.4268 28.6289 30.8027 27.8154 31.1172C27.2002 31.3564 26.2705 31.6436 24.5684 31.7188C22.7227 31.8008 22.1689 31.8213 17.5 31.8213C12.8242 31.8213 12.2705 31.8008 10.4316 31.7188C8.72266 31.6436 7.79981 31.3564 7.18457 31.1172C6.37109 30.8027 5.7832 30.4199 5.17481 29.8115C4.55957 29.1963 4.18359 28.6152 3.86914 27.8018C3.62988 27.1865 3.34277 26.2568 3.26758 24.5547C3.18555 22.709 3.16504 22.1553 3.16504 17.4863C3.16504 12.8105 3.18555 12.2568 3.26758 10.418C3.34277 8.70898 3.62988 7.78613 3.86914 7.1709C4.18359 6.35742 4.56641 5.76953 5.17481 5.16113C5.79004 4.5459 6.37109 4.16992 7.18457 3.85547C7.79981 3.61621 8.72949 3.3291 10.4316 3.25391C12.2705 3.17187 12.8242 3.15137 17.5 3.15137ZM17.5 0C12.749 0 12.1543 0.0205078 10.2881 0.102539C8.42871 0.18457 7.15039 0.485351 6.04297 0.916016C4.8877 1.36719 3.91016 1.96191 2.93945 2.93945C1.96191 3.91016 1.36719 4.8877 0.916016 6.03613C0.485352 7.15039 0.18457 8.42188 0.102539 10.2812C0.0205078 12.1543 0 12.749 0 17.5C0 22.251 0.0205078 22.8457 0.102539 24.7119C0.18457 26.5713 0.485352 27.8496 0.916016 28.957C1.36719 30.1123 1.96191 31.0898 2.93945 32.0605C3.91016 33.0312 4.8877 33.6328 6.03613 34.0771C7.15039 34.5078 8.42188 34.8086 10.2813 34.8906C12.1475 34.9727 12.7422 34.9932 17.4932 34.9932C22.2441 34.9932 22.8389 34.9727 24.7051 34.8906C26.5645 34.8086 27.8428 34.5078 28.9502 34.0771C30.0986 33.6328 31.0762 33.0312 32.0469 32.0605C33.0176 31.0898 33.6191 30.1123 34.0635 28.9639C34.4941 27.8496 34.7949 26.5781 34.877 24.7188C34.959 22.8525 34.9795 22.2578 34.9795 17.5068C34.9795 12.7559 34.959 12.1611 34.877 10.2949C34.7949 8.43555 34.4941 7.15723 34.0635 6.0498C33.6328 4.8877 33.0381 3.91016 32.0606 2.93945C31.0898 1.96875 30.1123 1.36719 28.9639 0.922852C27.8496 0.492187 26.5781 0.191406 24.7188 0.109375C22.8457 0.0205078 22.251 0 17.5 0Z" fill="white"/>
                                    <path d="M17.5 8.51074C12.5371 8.51074 8.51074 12.5371 8.51074 17.5C8.51074 22.4629 12.5371 26.4893 17.5 26.4893C22.4629 26.4893 26.4893 22.4629 26.4893 17.5C26.4893 12.5371 22.4629 8.51074 17.5 8.51074ZM17.5 23.3311C14.2803 23.3311 11.6689 20.7197 11.6689 17.5C11.6689 14.2803 14.2803 11.6689 17.5 11.6689C20.7197 11.6689 23.3311 14.2803 23.3311 17.5C23.3311 20.7197 20.7197 23.3311 17.5 23.3311Z" fill="white"/>
                                    <path d="M28.9434 8.15528C28.9434 9.31739 28 10.2539 26.8447 10.2539C25.6826 10.2539 24.7461 9.31055 24.7461 8.15528C24.7461 6.99317 25.6895 6.05664 26.8447 6.05664C28 6.05664 28.9434 7 28.9434 8.15528Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1326_7743">
                                    <rect width="35" height="35" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </Link>
                            <Link href="" class="scale-75 xl:scale-100">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1326_7747)">
                                    <path d="M32.4092 0H2.58398C1.15527 0 0 1.12793 0 2.52246V32.4707C0 33.8652 1.15527 35 2.58398 35H32.4092C33.8379 35 35 33.8652 35 32.4775V2.52246C35 1.12793 33.8379 0 32.4092 0ZM10.3838 29.8252H5.18848V13.1182H10.3838V29.8252ZM7.78613 10.8418C6.11816 10.8418 4.77148 9.49512 4.77148 7.83398C4.77148 6.17285 6.11816 4.82617 7.78613 4.82617C9.44727 4.82617 10.7939 6.17285 10.7939 7.83398C10.7939 9.48828 9.44727 10.8418 7.78613 10.8418ZM29.8252 29.8252H24.6367V21.7041C24.6367 19.7695 24.6025 17.2744 21.9365 17.2744C19.2363 17.2744 18.8262 19.3867 18.8262 21.5674V29.8252H13.6445V13.1182H18.6211V15.4014H18.6895C19.3799 14.0889 21.0752 12.7012 23.5977 12.7012C28.8545 12.7012 29.8252 16.1602 29.8252 20.6582V29.8252Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1326_7747">
                                    <rect width="35" height="35" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </Link>
                            <Link href="" class="scale-75 xl:scale-100">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M34.6514 10.5C34.6514 10.5 34.3096 8.08691 33.2568 7.02734C31.9238 5.63281 30.4336 5.62598 29.75 5.54395C24.8555 5.18848 17.5068 5.18848 17.5068 5.18848H17.4932C17.4932 5.18848 10.1445 5.18848 5.25 5.54395C4.56641 5.62598 3.07617 5.63281 1.74316 7.02734C0.69043 8.08691 0.355469 10.5 0.355469 10.5C0.355469 10.5 0 13.3369 0 16.167V18.8193C0 21.6494 0.348633 24.4863 0.348633 24.4863C0.348633 24.4863 0.69043 26.8994 1.73633 27.959C3.06934 29.3535 4.81934 29.3057 5.59863 29.4561C8.40137 29.7227 17.5 29.8047 17.5 29.8047C17.5 29.8047 24.8555 29.791 29.75 29.4424C30.4336 29.3604 31.9238 29.3535 33.2568 27.959C34.3096 26.8994 34.6514 24.4863 34.6514 24.4863C34.6514 24.4863 35 21.6562 35 18.8193V16.167C35 13.3369 34.6514 10.5 34.6514 10.5ZM13.8838 22.0391V12.2021L23.3379 17.1377L13.8838 22.0391Z" fill="white"/>
                                </svg>
                            </Link>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <p class="text-white font-normal text-base xl:text-xl">
                            Get the app
                        </p>
                        <div class="flex md:justify-center items-center">
                            <Link href="" class="scale-75 xl:scale-100">
                                <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1326_7755)">
                                    <path d="M0.5 28.916V6.08398C0.613477 5.65674 0.702344 5.22129 0.843848 4.80361C1.26699 3.55332 1.95537 2.48418 2.98896 1.63516C3.76621 0.997363 4.61455 0.520898 5.5873 0.265234C5.92021 0.177734 6.25176 0.0881836 6.58398 0C14.1944 0 21.8056 0 29.416 0C29.8337 0.108008 30.2603 0.190723 30.6677 0.329492C31.9262 0.758105 33.0097 1.44648 33.8628 2.48965C34.4985 3.26689 34.9866 4.11045 35.2355 5.0873C35.3202 5.42021 35.4118 5.75176 35.5 6.0833V28.9837C35.4173 29.3063 35.351 29.6345 35.2491 29.951C34.813 31.3038 34.1068 32.4769 32.9851 33.3847C32.2146 34.0081 31.3793 34.4921 30.412 34.7348C30.0784 34.8182 29.7476 34.9111 29.4153 35H6.58398C6.16631 34.892 5.74043 34.81 5.33301 34.6712C4.0752 34.2412 2.99307 33.5515 2.13652 32.5117C1.49668 31.7352 1.0209 30.8861 0.765234 29.9134C0.677734 29.5805 0.588184 29.2489 0.5 28.916ZM29.146 23.435C29.2595 23.4021 29.3743 23.3721 29.4871 23.3358C30.4592 23.0255 30.7654 22.1505 30.5036 21.2837C30.3129 20.6514 29.686 20.2624 28.9013 20.2501C27.6489 20.2303 26.3952 20.2385 25.1422 20.2501C24.918 20.2521 24.7983 20.1852 24.6951 19.9876C24.4894 19.5945 24.2521 19.2179 24.0293 18.8337C23.7511 18.3545 23.4729 17.8753 23.196 17.3947C22.8856 16.8567 22.5787 16.3174 22.2677 15.7801C21.9184 15.1771 21.5622 14.5776 21.2156 13.9727C20.8718 13.3725 20.5368 12.7668 20.1882 12.1461C19.7459 12.5262 19.4923 12.9999 19.2886 13.5105C18.8723 14.5551 18.8196 15.6317 19.264 16.6496C19.7083 17.6675 20.2825 18.6313 20.8321 19.6007C21.757 21.2331 22.7065 22.8519 23.6472 24.4761C24.2938 25.5924 24.9063 26.7306 25.6016 27.8154C26.0637 28.5366 26.7459 28.6952 27.5286 28.3514C28.3031 28.0116 28.6641 27.231 28.3865 26.4797C28.2313 26.0593 27.9976 25.6655 27.7802 25.2704C27.4828 24.729 27.1636 24.1992 26.8642 23.6585C26.832 23.6011 26.873 23.5033 26.8799 23.424C27.6353 23.4274 28.3899 23.4309 29.1453 23.4336L29.146 23.435ZM6.64687 23.4377C6.68105 23.4404 6.71455 23.4459 6.74873 23.4459C11.4895 23.4459 16.2302 23.4473 20.9709 23.4445C21.0543 23.4445 21.1377 23.4083 21.2218 23.3885C21.4904 22.9469 21.4658 22.4492 21.3995 21.9816C21.3298 21.4888 21.0659 21.0745 20.666 20.7286C20.2039 20.3294 19.6659 20.2515 19.1129 20.2433C17.678 20.2221 16.2432 20.2364 14.8083 20.2357C14.7126 20.2357 14.6162 20.2269 14.4863 20.2207C14.5253 20.1462 14.5438 20.1093 14.5643 20.073C15.2937 18.7804 16.0162 17.4836 16.7545 16.1957C17.3937 15.0808 18.0506 13.9768 18.7007 12.868C19.4834 11.5336 20.2764 10.204 21.0468 8.86211C21.2696 8.47383 21.5075 8.10059 21.5034 7.59678C21.4973 6.81338 20.9688 6.26445 20.3912 6.09834C19.6317 5.88027 18.9112 6.18379 18.5517 6.80791C18.3213 7.20781 18.0868 7.60498 17.8346 8.03701C17.6459 7.7082 17.475 7.4252 17.3178 7.13467C16.7313 6.05117 16.2821 6.00264 15.3278 6.09697C14.4979 6.179 13.8273 7.37598 14.3318 8.30771C14.8097 9.18955 15.3333 10.0461 15.8241 10.9211C15.8925 11.0428 15.9629 11.2437 15.9103 11.3408C15.3094 12.4455 14.6921 13.542 14.0646 14.6316C13.0282 16.4315 11.983 18.2273 10.9296 20.017C10.8674 20.1229 10.6972 20.2228 10.5748 20.2262C9.91514 20.2467 9.2541 20.2275 8.59375 20.2385C7.85957 20.2508 7.12266 20.2433 6.39326 20.3123C5.5374 20.3937 4.97002 21.3753 5.20723 22.1983C5.42188 22.9455 5.92979 23.301 6.64756 23.4377H6.64687ZM9.61094 24.0625C9.3252 24.0625 9.12695 24.0358 8.94033 24.0707C8.77559 24.1015 8.55273 24.1568 8.47891 24.2771C8.07627 24.9334 7.69004 25.602 7.33936 26.2869C6.93467 27.0792 7.34824 28.0041 8.13643 28.3794C8.82275 28.7062 9.77637 28.3794 10.179 27.6787C10.6507 26.857 11.1367 26.0436 11.6029 25.2185C11.6446 25.1453 11.6248 24.9785 11.5674 24.9177C11.0144 24.3312 10.3684 23.949 9.61162 24.0625H9.61094Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_1326_7755">
                                    <rect width="35" height="35" fill="white" transform="translate(0.5)"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </Link>
                        </div>
                    </div>
                    <div class="space-y-4 text-start md:text-end">
                        <p class="text-white font-normal text-base xl:text-xl underline underline-offset-4">
                            Contact us
                        </p>
                        <div>
                            <p class="space-x-4 text-mid-grey font-medium text-sm xl:text-base">
                                <Link :href="route('dashboard')">
                                    Terms of use
                                </Link>
                                <span>|</span>
                                <Link  :href="route('dashboard')">
                                    Privacy policy
                                </Link>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</template>
