<template>
    <main class="row ">


          <div class="accordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#details" aria-expanded="true" aria-controls="details">
                  Project Details
                </button>
              </h2>
              <div id="details" class="accordion-collapse collapse show" >
                <div class="accordion-body">
                   <form>
                      <div class="row mx-0">
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Project Name</label>
                            <input type="text" class="form-control"  :value="project.name" @input="project.name = $event.target.value">                
                        </div>
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Client Name</label>
                            <input type="text" class="form-control"  :value="project.client" @input="project.client = $event.target.value">                
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Start Date</label>
                            <input type="date" class="form-control"   :value="project.start_date" @input="project.start_date = $event.target.value">                
                        </div>
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Finish Date</label>
                            <input type="date" class="form-control"  :value="project.finish_date" @input="project.finish_date = $event.target.value">                
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Jira Id</label>
                            <input type="text" class="form-control"   :value="project.jira_id" disabled>                
                        </div>
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Slack Channel</label>
                            <input type="text" class="form-control" :value="project.slack_channel" disabled>                
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-12 mb-2">
                            <label  class="col-form-label">Description</label>
                            <textarea class="form-control"  :value="project.description" @input="project.description = $event.target.value"></textarea>
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-12 mb-2">
                            <label  class="col-form-label">Tags</label>
                            <input type="text" class="form-control"  :value="project.tags" @input="project.tags = $event.target.value">
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Status</label>
                            <select class="form-select"   :value="project.status" @change="project.status = $event.target.value">
                              <option selected disabled>Status</option>
                              <option  v-for="(item,index) in status" :key="index" :value="item">{{item}}</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Type</label>
                            <select class="form-select"    :value="project.type" @change="project.type = $event.target.value">
                              <option selected disabled>Type</option>
                              <option  v-for="(item,index) in types" :key="index" :value="item">{{item}}</option>
                            </select>
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Languages</label>
                            <Multiselect 
                             mode="tags"
                             :v-modal="project.language"
                             :close-on-select="false"
                             :searchable="true"
                             :create-option="true"
                             :options="languages"
                                />
                        </div>
                        <div class="col-xl-6 mb-2">
                            <label  class="col-form-label">Blockchain</label>
                            <Multiselect 
                            mode="tags"
                              :v-modal="project.blockchain"
                             :close-on-select="false"
                             :searchable="true"
                             :create-option="true"
                             :options="blockchains"
                                />

                        </div>
                      </div>
            
                   </form>
                </div>
              </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#scope" aria-expanded="false" aria-controls="scope">
                    Project Scope
                  </button>
                </h2>
                <div id="scope" class="accordion-collapse collapse" >
                  <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#summarydiv" aria-expanded="false" aria-controls="summarydiv">
                    Summary
                  </button>
                </h2>
                <div id="summarydiv" class="accordion-collapse collapse" >
                  <div class="accordion-body">
                    <div class="row mx-0">
                        <div class="col-xl-12 mb-2">
                            <label  class="col-form-label">Disclaimer:</label>
                            <span class="default-text float-end" @click="setDefault('disclaimer')">Default Disclaimer</span>
                            <textarea class="form-control"  :value="project.disclaimer" @input="project.disclaimer = $event.target.value"></textarea>
                        </div>
                      </div>
                      <div class="row mx-0">
                        <div class="col-xl-12 mb-2">
                            <label  class="col-form-label">Summary</label>
                            <textarea class="form-control"  :value="project.summary" @input="project.summary = $event.target.value"></textarea>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#findings" aria-expanded="false" aria-controls="findings">
                    Key Fidings
                  </button>
                </h2>
                <div id="findings" class="accordion-collapse collapse" >
                  <div class="accordion-body">
                    <div class="row mx-0">
                        <div class="col-xl-12 mb-2">
                            <label  class="col-form-label">Description</label>
                            <span class="default-text float-end" @click="setDefault('findings')">Default Description</span>
                            <textarea class="form-control"  :value="project.findings" @input="project.findings = $event.target.value"></textarea>
                        </div>
                      </div>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" >
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qas" aria-expanded="false" aria-controls="qas">
                    Quality Assessment
                  </button>
                </h2>
                <div id="qas" class="accordion-collapse collapse" >
                  <div class="accordion-body">
                  <div class="row mx-0" v-for="qa in qas" :key="qa.id">
                      <div class="col-xl-4 mb-2">
                            <label  class="col-form-label">Doc Name</label>
                            <input type="text" class="form-control" :value="qa.name" @input="qa.name = $event.target.value">
                        </div>
                        <div class="col-xl-5 mb-2">
                            <label  class="col-form-label">Link</label>
                            <input type="text" class="form-control" :value="qa.link" @input="qa.link = $event.target.value">
                        </div>
                        <div class="col-xl-3 mb-2">
                            <label  class="col-form-label">Quality</label>
                            <select class="form-select" :value="qa.quality" @change="qa.quality = $event.target.value">
                                <option  :value="1">HIGH</option>
                                <option  :value="2">MEDIUM</option>
                                <option  :value="3">LOW</option>
                            </select>
                        </div>
                  </div>
                  <div class="row mx-0 text-end mb-2">
                    <button class="btn btn-light my-2" @click=" qas.push({id:0,name:'',link:'',quality:1})">Add New QA</button>
                  </div>
                 
                 </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#conclusion" aria-expanded="false" aria-controls="conclusion">
                    Conclusion
                  </button>
                </h2>
                <div id="conclusion" class="accordion-collapse collapse" >
                  <div class="accordion-body">
                    <div class="row mx-0">
                        <div class="col-xl-12 mb-2">
                            <label  class="col-form-label">Conclusion</label>
                            <span class="default-text float-end" @click="setDefault('conclusion')">Default Conclusion</span>
                            <textarea class="form-control" :value="project.conclusion" @input="project.conclusion = $event.target.value"></textarea>
                        </div>
                      </div>
                </div>
                </div>
            </div>
        </div>
      
    </main>
</template>

<script>
 import Multiselect from '@vueform/multiselect'
    export default {
        name: "ProjectSummary",
        components: {
      Multiselect,
    },
        data(){
            return{
                project:{
                    name:"Project Name 1"
                },
                status:['Init','Audit','Re-Audit','Completed','Published','Fixes'],
                types:['Private','Public'],
                blockchains:[
                                { value: 'ethereum', label: 'Ethereum' },
                                { value: 'bnb', label: 'BNB Chain' },
                                { value: 'avalanche', label: 'Avalanche' },
                                { value: 'polygon', label: 'Polygon' },
                                { value: 'algorand', label: 'Algorand' },
                                { value: 'solana', label: 'Solana' },
                                ],
               languages:[
                                { value: 'solidity', label: 'Solidity' },
                                { value: 'rust', label: 'Rust' },
                                { value: 'pyteal', label: 'PyTeal' },
                                ],
                qas:[
                    {
                        id:1,
                        name:'Decumentation',
                        link:'https://',
                        quality:1
                    },
                    {
                        id:2,
                        name:'Whitepaper',
                        link:'https://',
                        quality:2
                    }
                ],
                defaults:[
                    {
                        name:'disclaimer',
                        value:'......'
                    },
                    {
                        name:'findings',
                        value:'......'
                    },
                    {
                        name:'conclusion',
                        value:'......'
                    }
                ]
            }
           
        },
        methods:{
                setDefault(type){
                    if(type=='disclaimer') this.project.disclaimer = this.defaults[0].value
                    if(type=='findings') this.project.findings = this.defaults[1].value
                    if(type=='conclusion') this.project.conclusion = this.defaults[2].value

                }
            }
       
      
      
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

<style scoped>
.default-text{
    font-size: 14px;
    color: var(--grayColor);
    cursor: pointer;
}
.accordion-collapse{
    background-color: var(--navBg);
}

.accordion-button{
    background-color: var(--secondColor);
    color:var(--whiteColor);
}
.accordion-item{
    color:var(--whitecolor);
    border-color:var(--popupBg);
}
.accordion-button:not(.collapsed){
     background-color: var(--navActive);
}
/* /deep/.multiselect-option{
    color:var(--popupBg)!important;
} */
.form-control,.form-select,.multiselect{
	color: var(--whiteColor);
	padding: 12px;
	border:none;
    background-color: var(--themeBg);
}
.form-control,.form-select{
	color-scheme: dark;
}

 .multiselect-tags-search,.multiselect-dropdown{
	background: var(--themeBg)!important;
    color: var(--whiteColor)!important;
}



.form-select{
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='white' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
}
</style>