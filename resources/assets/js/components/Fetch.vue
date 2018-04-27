<template>
    <div class="inrow">        
        <button class="add btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-success" >Add Record</h4>                         
                    </div>
                    <div class="modal-body">
                        <div class="inrow">
                            {{ log }}
                            <form v-on:submit="sub">
                                <input type="text" v-model="name" name="name" placeholder="Enter Name Here" >
                                <input type="email" v-model="email" name="email" placeholder="Enter Email Here" >                        
                                <button type="submit" class="btn btn-success">Add  Record</button>
                            </form>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>



              
        </div>    
            <!-- making model for edit in fields -->

         <div id="myModal1" class="modal fade" v-show="HideModel" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-primary">Edit Record</h4>                         
                    </div>
                    <div class="modal-body">
                        <div class="inrow">
                            {{ log }}
                            <form v-on:submit.prevent="SubmitEdit">
                                <input type="text" id="EditName"    name="Ename"  v-model="updatedUser.name" >
                                <input type="email" id="EditEmail" name="Eemail" v-model="updatedUser.email" required>    
                                          
                                <button type="submit" class="btn btn-success" v-on:click="HideModel" >Save</button>
                            </form>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>



           
        </div> 
            <!-- end of fields -->
        

        <table class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            
            
            <tr v-for="user in users" :key="user.id">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>
                   
                    <button class="btn btn-danger" @click="del(user, user.id)">Delete</button>
                </td>
                <td>
                    
                    <button class="edit btn btn-primary" data-toggle="modal" data-target="#myModal1" @click="editinfo(user)">Edit</button>
                </td>
                <td>
                   
                    <button class="btn" @click="upd(user, user.id)">Update</button>
                </td>
                <!-- <td>
                    <form v-on:submit="ImageSubmit">
                        <input  type="file" @change="onFileChange">
                        <input type="submit" value="Upload" class="btn btn-default">
                    </form>  
                   
                   
                </td>  -->
            </tr>
            </tbody>
        </table> 
        <div>           
        <table class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>id</th>
                <th>Category Name</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                        <td>{{user.category}}</td>
                </tr>
            </tbody>
        </table>
        </div>
        <div>
            <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Category Name</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                        <td v-html="category">{{user.category}}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                users: [],
                showadd:false,
                name:"",
                email:"",
                log:"",
                category:"",
               SelectedFile:null,
                 HideModel:false ,
                updatedUser : {}
            }
        },
        mounted() {
            this.getDate();            
           
        },     
        
        methods: {
            getDate () {
                axios.get('/user')
                .then(
                    response=> {this.users = response.data}
                )
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
            },

            //===delete function =======
            del: function(user, id) {
                axios.delete('/user/'+id)
                .then(function (resp) {                    
                    console.log(id);
                    window.location.reload(true);
                    
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Cannot Delete the User");
                });
                                
            },
            //====edit function=====
            editinfo: function(user) {
                this.updatedUser = user;
            },
            //====update function======
            upd: function() {
                //var x = $this('.delete').val();
                alert("Update clicked");
            },
            //======add new details with row ======
            add: function() {
                //var x = $this('.delete').val();
                alert("Add clicked");
            },


            sub: function(event){
          
                if(this.name == "" || this.email == ""){
                    
                    this.log = "Empty Inputs Please Enter Some Value";
                    event.preventDefault();
                }
                else
                {
                    axios.get('/user/create',{
                        params:{
                            name
                        }
                    }).then(
                        response =>{
                            this.getDate();
                        }
                    )
                   
                   
                   
                   // this.log = this.name +' ' +this.email;
                    // axios.get('/user/create/',{
                    //     params: {
                    //     name: this.name,
                    //     email: this.email
                    //     }      
                    // })
                    // .then(function (resp) {                    
                    //     console.log('inserted'+resp);                        
                    //     window.location.reload(true);
                    // })
                    // .catch(function (resp) {
                    //     console.log(resp);
                    //     alert("Cannot add new User");
                    // });
                    $('#myModal').modal('hide')
                }   
            },  
            
            SubmitEdit: function(){
                 
                   axios.put('/user/' + this.updatedUser.id, this.updatedUser).then(
                       response => {
                           console.log('Updated successfully');
                           this.getDate();
                          $('#myModal1').modal('hide');
                       }
                   ).catch( errors=>{
                       console.log(errors);
                   }); 


            },
            
            //=======file upload=====





            onFileChange: function(event)
            {   
                
                this.SelectedFile = event.target.files[0]|| e.dataTransfer.files;
                
                  axios.get('/user/upload',{this:SelectedFile}).then(
                    response => {
                        console.log(response);
                    })
                    .catch(function(response){
                        alert("not uploaded");
                    })   
            },

            ImageSubmit (event)
            {
               // alert("hello");
                    console.log(event);
            }
            // submitfile ()
            // {
            //     const fd = new FormData();
            //     fd.append('image',this.SelectedFile, this.SelectedFile.name)
            //     axios.post('/user/upload',fd).then(
            //         response => {
            //             console.log(response);
            //         })
            //         .catch(function(response){
            //             alert("not uploaded");
            //         })
            // } 
        }
    }

   
</script>
<style>
    .inrow{
        display:inline-flex;
        justify-content: center;
        align-items: center;
        width:auto;
        margin-left:5%;
    }


    .myModal{
    	position:fixed;
    	top:0;
    	left:0;
    	right:0;
    	bottom:0;
    	background: rgba(0, 0, 0, 0.4);
    }
     
    .modalContainer{
    	width: 555px;
    	background: #FFFFFF;
    	margin:auto;
    	margin-top:50px;
    }
     
    .modalHeader{
    	padding:10px;
    	background: #008CBA;
    	color: #FFFFFF;
    	height:50px;
    	font-size:20px;
    	padding-left:15px;
    }
     
     
    .modalBody{
    	padding:40px;
    }
     
    .modalFooter{
    	height:36px;
    }
     
    .footerBtn{
    	margin-right:10px;
    	margin-top:-9px;
    }
     
    .closeBtn{
    	background: #008CBA;
    	color: #FFFFFF;
    	border:none;
    }
</style>