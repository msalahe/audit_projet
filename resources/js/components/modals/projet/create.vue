<template>
    <!-- Modal -->
    <div  class="modal modal-lg fade show" tabindex="-1" aria-modal="true" aria-hidden="true" role="dialog" >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">New Projet</h4>
            <button type="button" @click="projetStore.toggleIssueModal()" class="btn-close btn-close-white" ></button>
          </div>
          <div class="modal-body p-3">
            <form>
            <div class="row mx-0">
              <div class="col-xl-6 mb-2">
                <label for="full-name" class="col-form-label">Projet Name</label>
                <input type="text" class="form-control" id="full-name" v-model="projetModel.projet_name"  >
              </div>
              <div class="col-xl-6 mb-2">
                <label for="full-name" class="col-form-label">Client Name</label>
                <input type="email" class="form-control" id="full-name" v-model="projetModel.client_name">
              </div>
            </div>
            <div class="row mx-0">
              <div class="col-xl-6 mb-2">
                <label for="full-name" class="col-form-label">Start Date</label>
                <input type="date" class="form-control" id="full-name" v-model="projetModel.start_date"  >
              </div>
              <div class="col-xl-6 mb-2">
                <label for="full-name" class="col-form-label">Finish Date</label>
                <input type="date" class="form-control" id="full-name" v-model="projetModel.finish_date">
              </div>
            </div>

            <div class="row mx-0">
              <div class="col-xl-12 mb-2">
                <label for="full-name" class="col-form-label">Description</label>
                <textarea rows="8" class="form-control" v-model="projetModel.description" ></textarea>

              </div>
           
            </div>

            </form>
            </div>
            
             
            


          <div class="modal-footer border-top-0">
            <button type="button"  @click="addProjet" class="btn btn-success mx-1" >Submit</button>
          </div>
        </div>
      </div>
    </div>
    </template>
   <script setup>
   import { ref, onMounted, reactive, computed, watch, inject } from 'vue';
   import {useProjetStore} from '@/stores/projetStore'
   const projetStore = useProjetStore();
   const emit = defineEmits(['close'])
    const addProjet = async () =>{
    console.log(projetModel.value);
    emit('close');
   }

const projetModel = ref({

    'projet_name': '',
    'client_name': '',
    'start_date': '',
    'finish_date': '',
    'description': '',


})


onMounted(async () => {

});


</script>

    <style scoped src="@/../css/popup.css"></style>
    <style scoped>
    .form-control,.form-select{
        height: 50px;
    }
    </style>
