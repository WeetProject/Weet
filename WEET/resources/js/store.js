
import { createStore } from 'vuex';
import Vuex from 'vuex';
import router from '../js/router.js';
import axios from "axios";

const store = createStore({

    state() {
        return {
            showmodal: false,
        }
    },

    mutations: {
        setToggleModal(state) {
            state.showModal = true;
        },
        setCloseModal(state) {
            state.showModal = false;
        },
    
    },

    actions() {
    
    
    }
});

export default store;