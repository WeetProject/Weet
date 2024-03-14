
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

    actions: {
        actionLogin() {
            let adminId = document.querySelector('#admin_id').value;
            let adminPw = document.querySelector('#admin_password').value;

            const URL = '/admin';
            const HEADER = {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            };
            
            const formData = new FormData();
            formData.append('admin_number', adminId);
            formData.append('admin_password', adminPw);

            axios.post(URL, formData, HEADER)
                .then(res => {
                    if(res.data.code === "1" || res.data.code === "2") {
                        localStorage.setItem('admin_number', res.data.data.admin_number);
                        localStorage.setItem('admin_name', res.data.data.admin_name);
                        if(res.data.code === "1") {
                            localStorage.setItem('admin_flg', "1");
                        } else {
                            localStorage.setItem('admin_flg', '2');
                        }
                    }
                })
                .catch(err => {
                    alert('네트워크 오류가 발생했습니다. 페이지를 새로고침 후 다시 로그인해주세요');
                });
        }
    }
});

export default store;