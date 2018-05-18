<template>
    <div>
        <div id="main" class="main">
            <div class="jumbotron">
                <div class="addProject">
                    <h1>Добавить проект на сотрудника</h1>
                    <div>
                        <label class="typo__label">Single select / dropdown</label>
                        <multiselect :multiple= this.multiple v-model="value" deselect-label="Can't remove this value"
                                     track-by="name"
                                     label="name" placeholder="Select one" :options=this.options :searchable="false"
                                     :allow-empty="false">
                            <template slot="singleLabel" slot-scope="{ option }"><strong>{{ option.name }}</strong>
                            </template>
                        </multiselect>
                        <!--<pre class="language-json"><code>{{ value  }}</code></pre>-->
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-success btn-block" @click="store">Upload Image</button>
                    </div>
                </div>
                <div>
                    <img v-bind:src="'/'+ colleague.image ">
                </div>
                <h2 id="hello,-world!">{{ colleague.name }} {{ colleague.surname }} {{ colleague.patronymic }}</h2>
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
    import Multiselect from 'vue-multiselect'

    export default {
        mounted() {
            this.getColleague();
            this.getProject();
        },
        components: {
            Multiselect
        },
        data() {
            return {
                colleague: {},
                projects: {},
                id: null,
                value: '',
                options: [],
                multiple: false,
            }
        },
        methods: {
            getColleague() {
                let app = this;
                app.id = app.$route.params.id;
                let id = app.id;
                axios.get('/api/colleague/' + id)
                    .then(function (resp) {
                        if(resp.data.data.time_management == 10){
                            app.multiple = true;
                        }
                        app.colleague = resp.data.data;
                    })
                    .catch(function () {
                        alert("Could not load your colleague")
                    });
            },

            getProject() {
                let app = this;
                axios.get('/api/projects')
                    .then(function (resp) {
                        app.options = resp.data;
                    })
                    .catch(function () {
                        alert("Could not load your colleague")
                    })
            },

            store() {

                console.log(this.value);
            }
        },

    }
</script>