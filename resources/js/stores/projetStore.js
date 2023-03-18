import { defineStore } from 'pinia';
import { reactive, readonly, inject } from 'vue';


export const useProjetStore = defineStore('projet',() =>{
    const data = reactive({
        open: false,
        model: {
            'projet_name': '',
            'client_name': '',
            'start_date': '',
            'finish_date': '',
            'description': ''
        }
        
    })

    function toggleIssueModal(r = true) {
        data.open = !data.open
    }

    return {
        data: readonly(data),
        toggleIssueModal
    }
});