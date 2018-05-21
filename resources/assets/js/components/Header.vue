<template>
    <div>
        <div class="header">
            <a href="#" v-on:click="menu" class="menu-action">
                <i id="menu" class="fa fa-bars"></i>
                <span>Close</span>
            </a>
            <div class="home">
                <router-link to="/"> Home </router-link>
            </div>
        </div>
        <div v-bind:class="{ active: isActive, sidebar: sidebar}">
            <ul>

                <li>
                    <router-link to="/colleague/create"><i class="fa fa-desktop"></i><span>Colleague Create</span></router-link>
                </li>
                <li>
                    <router-link to="/get/colleague"><i class="fa fa-desktop"></i><span>Colleague</span></router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isActive: false,
                sidebar: true
            }
        },
        methods: {
            menu: function (event) {
                let elements = document.getElementById('menu');
                let main = document.getElementById('main');
                this.isActive = !this.isActive;
                if (this.isActive == true) {
                    elements.classList.add("fa-close");
                    elements.classList.remove("fa-bars");
                    main.classList.add('active');
                }
                else {
                    elements.classList.add("fa-bars");
                    elements.classList.remove("fa-close");
                    main.classList.remove('active');
                }
            }
        }
    }
</script>