<template>
    <main class="row mx-0 pt-5">
      <div class="row mx-0 mb-2 text-end">
        <div class="col-xl-4  ms-auto mb-2">
            <button class="btn btn-light">New Issue</button>

        </div>
    </div>
      <div class="row mx-0">
        <div class="col-xl-5 mb-2">
          <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-light active">All Issues</button>
          <button type="button" class="btn btn-light">My Issues</button>
          <button type="button" class="btn btn-light">Stats</button>
           </div>
        </div>
        <div class="col-xl-7">
            <div class="row mx-0">
             <div class="col-xl-4">
              <select class="form-select">
                <option selected disabled>Status</option>
                <option  v-for="(item,index) in status" :key="index" :value="item">{{item}}</option>
              </select>
             </div>
             <div class="col-xl-4">
              <select class="form-select">
                <option selected disabled>Auditor</option>
                <option  v-for="(item,index) in auditors" :key="index" :value="item.id">{{item.full_name}}</option>
              </select>
             </div>
             <div class="col-xl-4">
              <select class="form-select">
                <option selected disabled>Severity</option>
                <option  v-for="(item,index) in severities" :key="index" :value="item">{{item}}</option>
              </select>
             </div>
            </div>
        </div>
      </div>
      <div class="row mx-0">
        <div class="py-3 accordion">
          <IssueSection   v-for="issue in issues" :key="issue.id" :issue_p="issue" :status="status"/>
      </div>
      </div>
       
    </main>
</template>

<script>
  import IssueSection from "@/components/projet/IssueSection.vue";

    export default {
        name: "ProjectIssues",
        components:{IssueSection},
        data(){
          return{
            auditors:[],
            status:['Not Fixed','Fixed','Acknowledged','Mitigated','Partially Fixed'],
            severities:['Critical','High','Medium','Low','Info','Und'],
            issues:[
              {
                id:1,
                code:'SHB-1',
                title:'Issue Title 1',
                likelihood:1,
                impact:2,
                severity:'Critical',
                status:'Not Fixed',
                user:{
                  full_name:'Inas Hasnaoui'
                },
                state:'Draft',
                description:'',
                exploit_scenario:'',
                recommendation:'',
                updates:''

              },
              {
                id:2,
                code:'SHB-2',
                title:'Issue Title 2',
                likelihood:1,
                impact:2,
                severity:'Medium',
                status:'Fixed',
                user:{
                  full_name:'Inas Hasnaoui'
                },
                state:'Approved',
                description:'',
                exploit_scenario:'',
                recommendation:'',
                updates:''

              }
            ]
          }
        }
       
      
      
    }
</script>

<style scoped>
.btn-light{
  border-color: var(--blackBorder);
}
.active{
  background-color: var(--navActive);
}
</style>