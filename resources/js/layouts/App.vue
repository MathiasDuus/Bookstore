<template>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <router-link
                    id="logo"
                    :to="{ name: 'home' }"
                >
                    <img class="navbar-img" src="../../pictures/logo.png" alt="Undercover books logo"/>
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">

                    <div class="navbar-nav ms-auto">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <router-link
                                    class="nav-link"
                                    data-toggle="collapse"
                                    :to="{ name: 'home' }"
                                >
                                    Home
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    class="nav-link"
                                    data-toggle="collapse"
                                    :to="{ name: 'about' }"
                                >
                                    About
                                </router-link>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </header>


    <div class="container">
        <router-view v-slot="{ Component }">
            <keep-alive>
                <component :is="Component" :key="$route.params.id"></component>
            </keep-alive>
        </router-view>
<!--        <router-view v-slot="{ Component }">-->
<!--            <keep-alive include="Home">-->
<!--                <component :is="Component" />-->
<!--            </keep-alive>-->
<!--        </router-view>-->
    </div>


</template>

<script>

export default {
    // watch: {
    //     $route() {
    //         $("#navbarCollapse").collapse("hide");
    //     },
    // },
};
</script>
