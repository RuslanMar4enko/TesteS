<template>
    <div id="main" class="main">
        <div class=" container jumbotron">
            <div class="container">
                <div class=" justify-content-center">
                    <div class="card card-default">
                        <h1> Create Colleague </h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <span v-if="errorData.name" class="error text-danger">@{{ errorData.name[0]}}</span><br>
                                    <input type="text" v-model="name"><br>

                                </div>
                                <div class="col-md-12">
                                    <label>Surname</label>
                                    <span v-if="errorData.surname" class="error text-danger">@{{ errorData.surname[0]
                                        }}</span><br>
                                    <input v-model="surname" type="text"><br>

                                </div>
                                <div class="col-md-12">
                                    <label>Patronymic</label>
                                    <span v-if="errorData.patronymic"
                                          class="error text-danger">@{{ errorData.patronymic[0] }}</span><br>
                                    <input v-model="patronymic" type="text"><br>

                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <label>Sociability</label>
                                    <select v-model="sociability">
                                        <option value="" disabled selected>Select your option</option>
                                        <option selected="selected">0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                    <span>Selected: {{ sociability }}</span>
                                </div>
                                <div class="col-md-12">
                                    <label>Engineering skill</label>
                                    <select v-model="engineering_skill">
                                        <option value="" disabled selected>Select your option</option>
                                        <option selected="selected">0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                    <span>Selected: {{ engineering_skill }}</span>
                                </div>
                                <div class="col-md-12">
                                    <label>Time management</label>
                                    <select v-model="time_management">
                                        <option value="" disabled selected>Select your option</option>
                                        <option selected="selected">0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                    <span>Selected: {{ time_management }}</span>
                                </div>
                                <div class="col-md-12">
                                    <label>Language</label>
                                    <select v-model="lang">
                                        <option value="" disabled selected>Select your option</option>
                                        <option selected="selected">0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                    <span>Selected: {{ lang }}</span>
                                </div>
                                <div class="col-md-12">
                                    <input id="my_file" type="file" @change="onImageChange()" ref="fileInput">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success btn-block" @click="store">Upload Image</button>
                                </div>
                            </div>
                        </div>
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
                name: '',
                surname: '',
                patronymic: '',
                image: null,
                sociability: null,
                engineering_skill: null,
                time_management: null,
                lang: null,
                formData: null,
                errorData: [],
            }
        }, methods: {
            onImageChange(e) {
                let file = this.$refs.fileInput.files[0];
                this.image = file;
            },
            onForm() {
                let data = new FormData();
                data.append('name', this.name);
                data.append('surname', this.surname);
                data.append('patronymic', this.patronymic);
                data.append('image', this.image);
                data.append('sociability', this.sociability);
                data.append('engineering_skill', this.engineering_skill);
                data.append('time_management', this.time_management);
                data.append('lang', this.lang);
                this.formData = data;
            },
            store() {
                let app = this;
                this.onForm();
                axios.post('/api/colleague/create', this.formData)
                    .then(response => {
                        let userId = response.data.data.id;
                        this.$router.push({name: 'colleagueShow', params: {id: userId}});

                    })
                    .catch(error => {
                        app.errorData = error.response.data.errors;
                    });
            },
        }
    }
</script>