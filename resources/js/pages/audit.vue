<template>
    <main class="row mx-0">
      <div class="col-xl-11 mx-auto">
        <div class="row mx-0">
          <h2 class="my-5">Project Name</h2>
        </div>
        <div class="row mx-0">
        <div class="col-xl-7">
             <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="summary-tab" data-bs-toggle="pill" data-bs-target="#summary" type="button" role="tab" aria-controls="summary" aria-selected="true">Summary</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="team-tab" data-bs-toggle="pill" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Team</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="issues-tab" data-bs-toggle="pill" data-bs-target="#issues" type="button" role="tab" aria-controls="issues" aria-selected="false">Issues</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="bps-tab" data-bs-toggle="pill" data-bs-target="#bps" type="button" role="tab" aria-controls="bps" aria-selected="false">Best Practices</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tests-tab" data-bs-toggle="pill" data-bs-target="#tests" type="button" role="tab" aria-controls="tests" aria-selected="false">Tests</button>
                </li>
            </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="summary" role="tabpanel" aria-labelledby="summary-tab">
                    <ProjectSummary/>
                </div>
                <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                  <ProjectTeam/>
                </div>
                <div class="tab-pane fade" id="issues" role="tabpanel" aria-labelledby="issues-tab">
                  <ProjectIssues/>
                </div>
                <div class="tab-pane fade" id="bps" role="tabpanel" aria-labelledby="bps-tab">
					<ProjectBps/>
				</div>
                <div class="tab-pane fade" id="tests" role="tabpanel" aria-labelledby="tests-tab">
					<ProjectTests/>
				</div>

              </div>
        </div>
        <div class="col-xl-5">
            <ul class="nav nav-pills"  role="tablist">
               <li class="nav-item" role="presentation">
                 <button class="nav-link active" id="report-tab" data-bs-toggle="pill" data-bs-target="#report" type="button" role="tab" aria-controls="report" aria-selected="true">Report</button>
               </li>
               <li class="nav-item" role="presentation">
                 <button class="nav-link" id="notes-tab" data-bs-toggle="pill" data-bs-target="#notes" type="button" role="tab" aria-controls="notes" aria-selected="false">Notes</button>
               </li>
             </ul>
             <div class="tab-content" >
               <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                ...
               </div>
               <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                ...
               </div>

             </div>
        </div>
        </div>
      </div>
    </main>
</template>

<script>
  import ProjectSummary from "@/components/projet/ProjectSummary.vue";
  import ProjectTeam from "@/components//projet/ProjectTeam.vue";
  import ProjectIssues from "@/components/projet/ProjectIssues.vue";
  import ProjectBps from "@/components/projet/ProjectBps.vue";
  import ProjectTests from "@/components/projet/ProjectTests.vue";

    export default {
        name: "AuditProject",
        components:{ProjectSummary,ProjectTeam,ProjectIssues,ProjectBps,ProjectTests}
       
      
      
    }
</script>

<style scoped>
.nav-pills .nav-link{
    color: var(--whiteColor);
    border-radius: 0;
}
 .nav-pills .nav-link.active{
    background-color:  var(--navActive);
}
.nav-pills .nav-item,.tab-content{
    border: solid 0.5px var(--borderCard);
}
.tab-content{
    background-color: var(--navBg);
    border-radius: 0;
    min-height: 50vh;
}

</style>