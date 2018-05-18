<template>
    <div>
        <div id="main" class="main">
            <div class="jumbotron">
                <div>
                    <img v-bind:src="'/'+ colleague.image ">
                </div>
                <h1 id="hello,-world!">{{ colleague.name }} {{ colleague.surname }} {{ colleague.patronymic }}</h1>
                <div style="font-size: 16px; margin-top: 10px;"><strong>Sociability</strong>
                    <strong>{{colleague.sociability}}</strong></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: colleague.sociability + '0%'}" aria-valuenow="10" aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>
                <div style="font-size: 16px; margin-top: 10px;"><strong>Engineering Skill</strong>
                    <strong>{{colleague.engineering_skill}}</strong></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: colleague.engineering_skill + '0%'}" aria-valuenow="10" aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>
                <div style="font-size: 16px; margin-top: 10px;"><strong>Time Management</strong>
                    <strong>{{colleague.time_management}}</strong></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: colleague.time_management + '0%'}" aria-valuenow="10" aria-valuemin="0"
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
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.getColleague();
        },
        data() {
            return {
                colleague: {}
            }
        },
        methods: {
            getColleague() {
                let app = this;
                let id = app.$route.params.id;
                axios.get('/api/colleague/' + id)
                    .then(function (resp) {
                        app.colleague = resp.data.data;
                    })
                    .catch(function () {
                        alert("Could not load your company")
                    });
            },
        }
    }
</script>