<template>
    <div>
        <div id="main" class="main">
            <div class="jumbotron">
                <h1 id="hello,-world!">Events<a class="anchorjs-link" href="#hello,-world!"><span
                        class="anchorjs-icon"></span></a></h1>
                <p>Here you can create your own Events.
                    <router-link class="btn btn-primary btnFromAdmin" to="/events/create"><span>Events</span>
                    </router-link>
                </p>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ colleague.id }}</th>
                    <td>{{ colleague.name }}</td>
                    <!--<td>{{ event.description }}</td>-->
                    <!--<td class="image-admin"><img v-bind:src="'/'+ event.image"></td>-->
                    <!--<td>{{ event.date_event }}</td>-->
                </tr>
                </tbody>
            </table>

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
            }
        }
    }
</script>