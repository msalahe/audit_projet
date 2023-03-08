<script setup>
import { onMounted, ref, reactive,computed } from 'vue';
import { useRoute } from 'vue-router';
import rs from '@/config/rs.js'
import skillsChart from '@/components/charts/skills.vue'
import issuesChart from '@/components/charts/issues.vue'

const route = useRoute();
const userData = ref([])
const userProjects = ref([])
const roles = reactive({ data: [] })
const skills = reactive({ data: [] })

const getUser = async () => {
    const response = await axios.get(`/users/${route.params.id}`)
    userData.value = response.data.user;
    userProjects.value = response.data.projects;
}

const getRoles = async () => {
    const response = await axios.get("/roles")
    roles.data = response.data;
}

const getskills = async () => {
    const response = await axios.get("/skills")
    skills.data = response.data;
}

const getIcon = (n) => {
    const item = rs.find(i => i[0] === n);
    return item ? item[1] : null;
}

const userSkills = computed(() => {
    return  userData.value.skills ? userData.value.skills.map(skill => {
                return { id: skill.id, skill: skill.name,percentage:skill.pivot ? skill.pivot.level : null};
            }) : []
})


onMounted(async () => {
    await getUser()
    await getRoles()
    await getskills()
});

</script>

<template>

    <div class="row view01">
        <div class="col-lg-4 ">
            <div id="accordion" class="custom-accordion mb-4">

                <div class="card mb-0">
                    <div class="card-header" id="headingOne">
                        <h5 class="m-0 font-size-15">
                            <a class="d-block pt-2 pb-2 text-dark" data-toggle="collapse" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Personal Infos

                                <span class="float-right"><svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
						</svg></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="#">
                                <div class="form-group">
                                    <label>Fulle Name</label>
                                    <input type="text" class="form-control" v-model="userData.full_name">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="userData.email">
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end card-->

                <div class="card mb-0">
                    <div class="card-header" id="headingTwo">
                        <h5 class="m-0 font-size-15">
                            <a class="collapsed d-block pt-2 pb-2 text-dark" data-toggle="collapse" href="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                Social Links
                                <span class="float-right"><svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
						</svg></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <font-awesome-icon :icon="['fas', 'square-plus']"
                                @click="userData.socialLinks.push({ name: null, link: null })" />
                            <div class="">
                                <div class="" v-for="(rr, ind) in userData.socialLinks" :key="ind">
                                    <a :href="rr.link" ><font-awesome-icon :icon="getIcon(rr.name)" /></a>
                                </div>
                                <div class="input-group flex-nowrap my-2" v-for="(rr, ind) in userData.socialLinks"
                                    :key="ind">
                                    <input type="text" class="form-control mr-2"
                                        v-model="userData.socialLinks[ind].link" placeholder="Link" aria-label=""
                                        aria-describedby="addon-wrapping">
                                    <div class="input-group-append">
                                        <select class="form-control" v-model="userData.socialLinks[ind].name">
                                            <option v-for="(r, i) in rs" :key="i" :value="r[0]">
                                                <span>
                                                    <font-awesome-icon :icon="r[1]" />
                                                </span>
                                                <span v-html="r[0]"></span>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center ml-1"
                                        @click="userData.socialLinks.splice(ind, 1)">
                                        <font-awesome-icon :icon="['far', 'trash-can']" />
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div> <!-- end card-->

                <div class="card mb-0">
                    <div class="card-header" id="headingThree">
                        <h5 class="m-0 font-size-15">
                            <a class="collapsed d-block pt-2 pb-2 text-dark" data-toggle="collapse" href="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                Skills
                                <span class="float-right"><svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
						</svg></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <label for="" class="label">Skills
                        <font-awesome-icon :icon="['fas', 'square-plus']"
                            @click="userData.skills.push({ skill: null, percentage: null })" />
                    </label>
                    <div class="input-group flex-nowrap my-2" v-for="(ss, ind) in userSkills" :key="ind">
                        <select class="form-control" v-model="userSkills[ind].skill">
                            <option v-for="(s, i) in skills.data" :key="i" :value="s.name"
                                t='v-if="!userSkills.some(skill => skill.skill === s.id)"'>
                                <span>
                                    {{ s.name }}
                                </span>
                            </option>
                        </select>
                        <div class="input-group-append">
                            <input type="number" class="form-control ml-2" v-model="userSkills[ind].percentage"
                                placeholder="Percentage" aria-label="" aria-describedby="addon-wrapping" min="0" max="100">
                        </div>
                        <div class="d-flex justify-content-center align-items-center ml-1"
                            @click="userSkills.splice(ind, 1)">
                            <font-awesome-icon :icon="['far', 'trash-can']" />
                        </div>
                    </div>
                        </div>
                    </div>
                </div> <!-- end card-->

                <div class="card mb-0" v-if="userData.role && userData.role.name == 'Auditor'">
                    <div class="card-header" id="headingFour">
                        <h5 class="m-0 font-size-15">
                            <a class="collapsed d-block pt-2 pb-2 text-dark" data-toggle="collapse"
                                href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">

                                Stats <span class="float-right"><svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
						</svg></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Auditor Projects ({{ userProjects['Auditor'] ? userProjects['Auditor'].length : 0 }})</label>
                                <select name="" id="" class="form-control" v-if="userProjects['Auditor'] && userProjects['Auditor'].length > 0">
                                    <option v-for="(p, i) in userProjects['Auditor']" :key="i" :value="p.id">
                                        {{ p.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Lead Auditor Projects ({{ userProjects['Lead Auditor'] ? userProjects['Lead Auditor'].length : 0  }}) </label>
                                <select name="" id="" class="form-control" v-if="userProjects['Lead Auditor'] && userProjects['Lead Auditor'].length > 0">
                                    <option v-for="(p, i) in userProjects['Lead Auditor']" :key="i" :value="p.id">
                                        {{ p.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end custom accordions-->
        </div> <!-- end col -->
        <div class="col-lg-8">
            <div class="d-flex">
                <div class="divSkills" v-if="userData.skills">
                    <h3>Skills</h3>
                    <skillsChart :skills="userData.skills"></skillsChart>
                </div>
                <div class="" v-if="userData.stats">
                    <h3>Issues</h3>
                    <issuesChart :stats="userData.stats"></issuesChart>
                </div>
            </div>
        </div>
    </div>
</template>



<style>
/* -----
SVG Icons - svgicons.sparkk.fr
----- */

.svg-icon {
  width: 1.3em;
  height: 1.3em;
}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: #7e7f82;
}

.svg-icon circle {
  stroke: #7e7f82;
  stroke-width: 1;
}
.view01{
    margin-top: 6%;
}
.divSkills{
   width: 80%;
}
.fnt{
    font-family: 'Poppins', sans-serif;
}


</style>
