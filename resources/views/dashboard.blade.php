<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel5.8 - CRUD Example</title>

        <!-- Bootstrap 4.3.1 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
        
        <div id="app_vue">
            <p class="text-center alert alert-danger" v-bind:class="{hidden: hasError}">All fields are mandatory.</p>
            <div class="flex-center position-ref full-height">

                <div class="content">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="First Name" v-model="newPerson.first_name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Last Name" v-model="newPerson.last_name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required placeholder="eg. test@test.com" v-model="newPerson.email">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required placeholder="eg. 0412345678" v-model="newPerson.mobile">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="home_phone">Home Phone:</label>
                            <input type="text" class="form-control" id="home_phone" name="home_phone" required placeholder="Home Phone" v-model="newPerson.home_phone">
                        </div>
                        <div class="form-group">
                            <label for="office_phone">Office Phone:</label>
                            <input type="text" class="form-control" id="office_phone" name="office_phone" required placeholder="Office Phone" v-model="newPerson.office_phone">
                        </div>
                        <div class="form-group">
                            <label for="home_address">Home Address:</label>
                            <input type="text" class="form-control" id="home_address" name="home_address" required placeholder="Home Address" v-model="newPerson.home_address">
                        </div>
                        <div class="form-group">
                            <label for="postal_address">Postal Address:</label>
                            <input type="text" class="form-control" id="postal_address" name="postal_address" required placeholder="Postal Address" v-model="newPerson.firspostal_addresst_name">
                        </div>
                        <div class="form-group" @click.prevent="createPerson()">
                            <add-person-button><span class="glyphicon glyphicon-plus"></span></add-person-button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Home Phone</th>
                                    <th>Office Phone</th>
                                    <th>Home Address</th>
                                    <th>Postal Address</th>
                                    <th colspan="2">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="person in persons">
                                    <td>@{{person.first_name}}</td>
                                    <td>@{{person.last_name}}</td>
                                    <td>@{{person.econtact.email}}</td>
                                    <td>@{{person.econtact.mobile}}</td>
                                    <td>@{{person.econtact.home_phone}}</td>
                                    <td>@{{person.econtact.office_phone}}</td>
                                    <td>@{{person.address.home_address}}</td>
                                    <td>@{{person.address.postal_address}}</td>
                                    <td id="show-modal" @click="showModal=true; setVal(person.id, person.first_name, person.last_name, person.econtact.email, person.econtact.mobile, person.econtact.home_phone, person.econtact.office_phone, person.econtact.home_address, person.econtact.postal_address)" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil">Edit</span>
                                    </td>
                                    <td @click.prevent="deletePerson(person)" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash">Delete</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <modal v-if="showModal" @close="showModal=false">
                            <h3 slot="header">Edit Person</h3>
                            <div slot="body">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" class="form-control" id="e_first_name" name="e_first_name" required placeholder="First Name" :value="this.e_first_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" class="form-control" id="e_last_name" name="e_last_name" required placeholder="Last Name" :value="this.e_last_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" id="e_email" name="e_email" required placeholder="eg. test@test.com" :value="this.e_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text" class="form-control" id="e_mobile" name="e_mobile" required placeholder="eg. 0412345678" :value="this.e_mobile">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="home_phone">Home Phone:</label>
                                        <input type="text" class="form-control" id="e_home_phone" name="e_home_phone" required placeholder="Home Phone" :value="this.e_home_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="office_phone">Office Phone:</label>
                                        <input type="text" class="form-control" id="e_office_phone" name="e_office_phone" required placeholder="Office Phone" :value="this.e_office_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_address">Home Address:</label>
                                        <input type="text" class="form-control" id="e_home_address" name="e_home_address" required placeholder="Home Address" :value="this.e_home_address">
                                    </div>
                                    <div class="form-group">
                                        <label for="postal_address">Postal Address:</label>
                                        <input type="text" class="form-control" id="e_postal_address" name="e_postal_address" required placeholder="Postal Address" :value="this.e_firspostal_addresst_name">
                                    </div>
                                    <div class="form-group" @click.prevent="createPerson()">
                                        <add-person-button><span class="glyphicon glyphicon-plus"></span></add-person-button>
                                    </div>
                                </div>
                            </div>
                            <div slot="footer">
                                <button class="btn btn-default" @click="showModal=false">Cancel</button>
                                &nbsp;
                                <button class="btn btn-info" @click="editPerson(person.id)">Update</button>
                            </div>
                        </modal>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript" src="./js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/x-template" id="modal-template">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-container">
                            <div class="modal-header">
                                <slot>Default Header</slot>
                            </div>

                            <div class="modal-body">
                                <slot>Default Header</slot>
                            </div>

                            <div class="modal-footer">
                                <slot>Default Header</slot>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </script>
    </body>
</html>
