<template>

        <main class="row mx-0 pb-5">
            <div class="row mx-0 mb-2 text-end">
                <div class="col-xl-4 text-end ms-auto my-4">
                    <button class="btn btn-light" @click="users.unshift({id:0,full_name:'',role:'Auditor'})">New User</button>

                </div>
            </div>
            <div class="col-xl-10 mx-auto">
                <div class="row mx-0 d-xl-flex d-none">
                    <div class="col-xl-6 mb-2">
                        <label  class="col-form-label">Full Name:</label>
                    </div>
                    <div class="col-xl-4 mb-2">
                        <label  class="col-form-label">Role:</label>
                    </div>
                </div>
                <div class="row mx-0" v-for="user in users" :key="user.id">
                    <div class="col-xl-6 mb-2">
                        <input type="text" class="form-control" :value="user.full_name" @input="user.full_name = $event.target.value">
                    </div>
                    <div class="col-xl-4 mb-2">
                        <select class="form-select"  :value="user.role" @change="user.role = $event.target.value">
                            <option selected disabled>Role</option>
                            <option  v-for="(role,index) in roles" :key="index" :value="role" >{{role}}</option>
                          </select>
                    </div>
                    <div class="col-xl-2 mb-2 text-end">
                        <i class="fas fa-trash text-danger"></i>
                    </div>
                </div>
            </div>
         
           
        </main>
   
</template>

<script>

    export default {
        name: "ProjectTeam",
        data(){
            return{
                roles:['BizDev','Lead Auditor','Auditor'],
                users:[
                    {
                        id:1,
                        full_name:'Soufiane',
                        role:'BizDev'
                    },
                    {
                        id:2,
                        full_name:'Farouk',
                        role:'Lead Auditor'
                    },
                    {
                        id:3,
                        full_name:'Houssam',
                        role:'Auditor'
                    }
                ]
            }
        }
       
      
      
    }
</script>

<style scoped>

</style>