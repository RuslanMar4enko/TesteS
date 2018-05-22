<template>
    <div>
        <div id="main" class="main">
            <div class=" container jumbotron">
                <h1>
                    Список всех сотрудников(фото + ФИО), характеристики и количество проектов на сотруднике(только число).</h1>
                <div class="row">
                    <div v-for="colleague, index in colleagues" class="col-md-6">
                        <div class="margin">
                            <div>
                                <img v-bind:src="'/'+ colleague.image ">
                            </div>
                            <h2 id="hello,-world!">{{ colleague.name }} {{ colleague.surname }} {{ colleague.patronymic
                                }}</h2>
                            <div style="font-size: 16px; margin-top: 10px;"><strong>Sociability</strong>
                                <strong>{{colleague.sociability}}</strong></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                     v-bind:style="{width: colleague.sociability + '0%'}" aria-valuenow="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div style="font-size: 16px; margin-top: 10px;"><strong>Engineering Skill</strong>
                                <strong>{{colleague.engineering_skill}}</strong></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                     v-bind:style="{width: colleague.engineering_skill + '0%'}" aria-valuenow="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div style="font-size: 16px; margin-top: 10px;"><strong>Time Management</strong>
                                <strong>{{colleague.time_management}}</strong></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                     v-bind:style="{width: colleague.time_management + '0%'}" aria-valuenow="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div style="font-size: 16px; margin-top: 10px;"><strong>Lang</strong>
                                <strong>{{colleague.lang}}</strong></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                     v-bind:style="{width: colleague.lang + '0%'}" aria-valuenow="10" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>

                            <div style="font-size: 16px; margin-top: 10px;"><strong>Projects</strong>
                                <strong>{{colleague.projects.length}}</strong></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                     v-bind:style="{width: colleague.projects.length + '0%'}" aria-valuenow="10"
                                     aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div>
                            <router-link :to="{ name: 'colleagueShow', params: {  id: colleague.id}}"><span
                                    class="btn btn-primary">add Projects</span></router-link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.index();
        },
        data() {
            return {
                colleagues: {},
            }
        },
        methods: {
            index() {
                const app = this;
                axios.get('/api/colleague')
                    .then(function (resp) {
                        app.colleagues = resp.data.data;
                    })
                    .catch(function () {
                        alert("Could not load your colleague")
                    })
            },
        }
    }
</script>