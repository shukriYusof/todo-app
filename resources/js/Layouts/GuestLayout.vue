<template>
    <section class="min-h-screen">
        <div class="grid grid-col-1 md:grid-cols-2 h-screen">
            <div class="static gradient-animation z-1">

            </div>
            <div class="px-7 md:px-28 pt-24 pb-7 md:pt-16 pb z-2 dynamic-col flex justify-center">
                <div class="max-w-lg">
                    <slot />
                </div>
            </div>
        </div>
    </section>
</template>
