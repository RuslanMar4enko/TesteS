<template>
    <div>
        <label class="search"> Поле поиска по ФИО </label>
        <input type="text" v-model="keywords" placeholder="Search">
        <div></div>
        <div class=" container jumbotron">
            <div class="row">
                <div v-for="colleague in results" class="col-md-6">
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
                    </div>
                    <div>
                        <router-link :to="{ name: 'colleagueShow', params: {  id: colleague.id}}"><span
                                class="btn btn-primary">add Projects</span></router-link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keywords: null,
                results: []
            };
        },

        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },

        methods: {
            fetch() {
                let app = this;
                axios.get('/api/search', {params: {keywords: this.keywords}})
                    .then(function (resp) {
                        console.log(resp);
                        app.results = resp.data
                    })
                    .catch(function (resp) {
                        console.log(resp);
                    });
            }
        },
    }
</script>