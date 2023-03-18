<script setup>
import {useIssueStore} from '@/stores/issue'
import {useProjetStore} from '@/stores/projetStore'

import { onMounted,ref} from "vue";
import { useRouter } from 'vue-router';
import {useAuthStore} from '@/stores/authuser'
import vulnurabilites from '@/components/modals/issues/index.vue'
import projet from '@/components/modals/projet/create.vue'

const router = useRouter()
const issueStore = useIssueStore()
const userStore = useAuthStore()
const projetStore = useProjetStore();
const isAdmin  = ref("");
const logout =  () =>{
     userStore.logout()
}

onMounted(async () => {

  userStore.setRole(localStorage.getItem("role"));
  console.log(userStore.data)

});



</script>

<template >

<nav class="navbar navbar-expand-lg px-4 py-2">
  <div class="container-fluid">
    <div class="navbar-brand">
        <img class="navbar-brand" src="/assets/image/logo-w.png"  width="150"/>

    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <router-link to="/"  class="nav-link" > Audits </router-link>
        <a  class="nav-link">Settings</a>
        <span class="nav-link" @click="issueStore.toggleIssueModal(false)" >Vulns</span>
        <router-link to="/users"  class="nav-link" v-if=" userStore.data.role == 'Admin'" > Auditors/BDs </router-link>
        <span class="nav-link btn"><i class="fas fa-plus-circle mx-2" @click="projetStore.toggleIssueModal(false)"></i></span>
        <span class="nav-link btn"  @click="logout"><i class="fas fa-sign-in-alt mx-2"></i></span>
      </div>
    </div>
  </div>
  <vulnurabilites  v-if="issueStore.data.open" />
  <projet  v-if="projetStore.data.open" />

  </nav>
</template>
<style scoped>

.navbar-light .navbar-brand ,.nav-link{
        color: var(--navLink)!important;
        font-family: "Heebo";
       font-weight: 600;
       line-height: 1.5em;
        text-align: center;
        font-size: 18px;
    }
    .router-link-exact-active.nav-link{
        color:  var(--navActive)!important;
        border-bottom: 2px solid  var(--navActive);
    }

  .nav-link:hover {
        color: var(--navActive)!important;
    }

   .navbar,.nav{
        background: var(--navBg)!important;

    }
.nav-link{
	cursor: pointer;
}
</style>
