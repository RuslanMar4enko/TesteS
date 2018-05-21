<template>
    <div>
        <div id="main" class="main">
            <div class=" container jumbotron">
                <h1> Среднее значение характеристик всех сотрудников </h1>
                <div>
                    <h2>
                        Инженерное мастерство {{ratings.engineering_skill}}</h2></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: Math.round(ratings.engineering_skill) + '0%'}" aria-valuenow="10"
                         aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>

                <div>
                    <h2>
                        Знание языков {{ratings.lang}}</h2></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: Math.round(ratings.lang) + '0%'}" aria-valuenow="10"
                         aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>

                <div>
                    <h2>
                        Тайм менеджмент {{ratings.time_management}}</h2></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: Math.round(ratings.time_management) + '0%'}" aria-valuenow="10"
                         aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>

                <div>
                    <h2>
                        Коммуникабельность {{ratings.sociability}}</h2></div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                         v-bind:style="{width: Math.round(ratings.sociability) + '0%'}" aria-valuenow="10"
                         aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ratings: []
            }
        },
        mounted() {
            this.getRating();
        },
        methods: {
            getRating() {
                let app = this;
                axios.get('api/avg')
                    .then(function (resp) {
                        app.ratings = resp.data;
                    })
                    .catch(function () {
                        alert('Could not load your colleague')
                    })
            }
        }
    }
</script>