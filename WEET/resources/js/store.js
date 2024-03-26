
import { createStore } from 'vuex';
import Vuex from 'vuex';
import router from '../js/router.js';
import axios from "axios";

const store = createStore({

    state() {
        return {
            showmodal: false,
			adminToken: null,
            userData: {
                userEmail: '',
                userID: null,
            },
            userLoginChk: null,
            userID: null,
        }
    },

    mutations: {
        setToggleModal(state) {
            state.showmodal = true;
        },
        setCloseModal(state) {
            state.showmodal = false;
        },
        // loginSuccess(state) {
        //     state.isLoggedIn = true;
        // },
		setAdminToken(state, token) {
			state.adminToken = token;
		},
        setUserData(state, userData) {
            state.userData = userData;
        },
        setUserLoginChk(state, userLoginChk) {
            state.userLoginChk = userLoginChk;
        },
        setUserID(state, userID) {
            state.userID = userID;
        },
    
    },

    actions: {

        // 유저 login
        submitUserLoginData(context, data) {
            const url = '/login';
            const header = {
                headers: {
                    // "Content-Type": 'multipart/form-data',
                    "Content-Type": 'application/json',
                    // 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            };
            const requestData = {
                userEmail: data.userEmail,
                userPassword: data.userPassword,
            };
        
            axios.post(url, requestData, header)
            .then(res => { 
                // context.dispatch('setCloseModal');
                console.log(res);

                if (res.data.success) {
                    context.commit('setUserData', res.data.userData);

                    // const loginUserData = res.data.userData.userID;
                    console.log("백처리", res.data);
                    // console.log(res.data.userData);
					// localStorage.setItem('loginUser', userId);
					// localStorage.setItem('loginUserId', res.data.userId);
					// localStorage.setItem('loginUserEmail', res.data.userEmail);
					localStorage.setItem('setUserData', res.data.userData);

                    alert('로그인 성공. 페이지를 새로 고칩니다.');
                    location.reload();
                    // this.$router.push('/');
                } else {
                    alert('로그인 실패. 이메일 또는 비밀번호를 확인해주세요.');
                }
            })
            .catch(err => {
                // 서버 오류 등의 예외 처리
                console.error('오류 발생:', err);
                alert('로그인 실패. 이메일 또는 비밀번호를 확인해주세요.');
            });
        },

        // 유저 logout
        // logout(context, data) {
        //     const url = '/logout';
        //     const header = {
        //         headers: {
        //             "Content-Type": 'application/json',
        //         },
        //     };
        
        //     axios.get(url, header)
        //     .then(res => {
        //         context.commit('setUserLoginChk', res.data.sessionDataCheck);
        //         localStorage.clear();
                
        //         Swal.fire({
        //             icon: 'success',
        //             title: '로그아웃 성공',
        //             text: '로그아웃에 성공했습니다.',
        //             confirmButtonText: '확인'
        //         }).then(() => {
        //             // 확인 버튼을 눌렀을 때 실행할 코드
        //             location.reload();
        //         });
        //     })
        //     .catch(err => {
        //         console.log(err.response.data);
        //     });
        // },
        logout(context, data) {
            const url = '/logout';
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                },
            };
        
            axios.get(url, header)
            .then(res => {
                context.commit('setUserLoginChk', res.data.sessionDataCheck);
                localStorage.clear();
        
                if (confirm('로그아웃 성공\n로그아웃에 성공했습니다. 페이지를 새로고침 하시겠습니까?')) {
                    location.reload();
                }
            })
            .catch(err => {
                console.log(err.response.data);
            });
        },
        
    }
});

export default store;