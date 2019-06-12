/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-person-button', require('./components/AddPersonButton.vue').default);
Vue.component('modal', {
    template: '#modal-template'
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app_vue',
    data: {
        newPerson: { 
            'first_name': '', 
            'last_name': '', 
            'email': '', 
            'mobile': '', 
            'home_phone': '',
            'office_phone': '',
            'home_address': '',
            'postal_address': ''
        },
        hasError: true,
        showModal: false,
        persons: [],
        e_id: '',
        e_first_name: '',
        e_last_name: '',
        e_email: '',
        e_mobile: '',
        e_home_phone: '',
        e_office_phone: '',
        e_home_address: '',
        e_postal_address: ''
    },
    methods: {
        getPersons: function getPersons() {
            var _this = this;
            axios.get('/getPersons').then(function (response) {
                _this.persons = response.data;
            })
        },
        mounted: function mounted(){
            this.getPersons();
        },
        setVal(val_id, val_first_name, val_last_name, val_email, val_mobile, val_home_phone, val_office_phone, val_home_address, val_postal_address) {
            this.e_id = val_id;
            this.e_first_name = val_first_name;
            this.e_last_name = val_last_name;
            this.e_email = val_email;
            this.e_mobile = val_mobile;
            this.e_home_phone = val_home_phone;
            this.e_office_phone = val_office_phone;
            this.e_home_address = val_home_address;
            this.e_postal_address = val_postal_address;
        },
        createPerson: function createPerson(){
            var input = this.newPerson;
            var _this = this;
            // Basic Form Validation
            if( input['first_name'] == '' || input['last_name'] == ''  || input['email'] == ''  || input['mobile'] == ''  || input['home_phone'] == ''  || input['office_phone'] == ''  || input['home_address'] == ''   || input['postal_address'] == '' ) {
                this.hasError = false;
            } else {
                this.hasError = true;

                // DB Persist
                axios.post('/addPerson', input).then(function (response) {
                    _this.newPerson = { 
                        'first_name': '', 
                        'last_name': '', 
                        'email': '', 
                        'mobile': '', 
                        'home_phone': '',
                        'office_phone': '',
                        'home_address': '',
                        'postal_address': ''
                    };
                    _this.getPersons();
                });
            }

        },
        deletePerson: function deletePerson() {
            var _this = this;

            axios.post('/deletePerson/' + person.id).then(function (response) {
                _this.getPersons();
            })
        },
        editPerson: function editPerson() {
            var _this = this;
            
            var id_val = document.getElementById('e_id').value;
            var first_name_val = document.getElementById('e_first_name').value;
            var last_name_val = document.getElementById('e_last_name').value;
            var email_val = document.getElementById('e_email').value;
            var mobile_val = document.getElementById('e_mobile').value;
            var home_phone_val = document.getElementById('e_home_phone').value;
            var office_phone_val = document.getElementById('e_office_phone').value;
            var home_address_val = document.getElementById('e_home_address').value;
            var postal_address_val = document.getElementById('e_postal_address').value;

            var editDetails = {
                val1: first_name_val.value,
                val2: last_name_val.value,
                val3: email_val.value,
                val4: mobile_val.value, 
                val5: home_phone_val.value,
                val6: office_phone_val.value,
                val7: home_address_val.value,
                val8: postal_address_val.value
            };

            axios.post('/editPerson/' + id_val.value, this.editDetails).then(function (response) {
                _this.getPersons();
                _this.showModal = false;
            })
        }
    }
});
