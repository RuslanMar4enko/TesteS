<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">File Upload Component</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Имя</label>
                                <input type="text" v-model="name">
                            </div>
                            <div class="col-md-12">
                                <label>Фамилия</label>
                                <input v-model="surname" type="text">
                            </div>
                            <div class="col-md-12">
                                <label>Отчество</label>
                                <input v-model="patronymic" type="text">
                            </div>
                            <div class="col-md-12">
                                <label>Имя</label>
                                <select v-model="sociability">
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
                                <span>Выбрано: {{ sociability }}</span>
                            </div>
                            <div class="col-md-12">
                                <label>Имя</label>
                                <select v-model="engineering_skill">
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
                                <span>Выбрано: {{ engineering_skill }}</span>
                            </div>
                            <div class="col-md-12">
                                <label>time_management</label>
                                <select v-model="time_management">
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
                                <span>Выбрано: {{ time_management }}</span>
                            </div>
                            <div class="col-md-12">
                                <label>lang</label>
                                <select v-model="lang">
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
                                <span>Выбрано: {{ lang }}</span>
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
</template>

<script>
    export default {
        data() {
            return {
                name: null,
                surname: null,
                patronymic: null,
                image: null,
                sociability: null,
                engineering_skill: null,
                time_management: null,
                lang: null,
                formData: null,
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
                this.onForm();
                axios.post('/api/colleague/create', this.formData)
                    .then(response => {
                        let userId = response.data.data.id;
                        this.$router.push({ name: 'colleagueShow', params: {id: userId}});
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
        }
    }
</script>