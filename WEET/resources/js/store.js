
import { createStore } from 'vuex';
import Vuex from 'vuex';
import router from '../js/router.js';
import axios from "axios";
import jwtDecode from 'vue-jwt-decode';

const store = createStore({

    state() {
        return {
            showmodal: false,
			adminToken: null,
            userData: null,
            userLoginChk: null,
            userID: null,
            // userToken: null,
        }
    },

    mutations: {
        // 모달 오픈
        setToggleModal(state) {
            state.showmodal = true;
        },
        // 모달 클로즈
        setCloseModal(state) {
            state.showmodal = false;
        },
        // loginSuccess(state) {
        //     state.isLoggedIn = true;
        // },
		setAdminToken(state, token) {
			state.adminToken = token;
		},
        // 로그인 시 유저 데이터
        setUserData(state, userData) {
            state.userData = userData;
        },
        // 유저 로그인 체크
        setUserLoginChk(state, userLoginChk) {
            state.userLoginChk = userLoginChk;
        },
        // 로그인했을 때 유저ID값
        setUserID(state, userID) {
            state.userID = userID;
        },
        // 유저 로그인 정보 저장용
        setSaveToLocalStorage(state, data) {
            // state.userData.userCheck = data.controllerToken;

            // state.userData.userID = data.userData.user_id;
            // state.userData.setToken = data.token;
            // state.userData.userLoginChk = data.controllerToken;

            state.userData = {
                userName: data.userData.userName,
                userEmail: data.userData.userEmail,
                userID: data.userData.user_id,
                setToken: data.token,
                userLoginChk: data.controllerToken
            };

            localStorage.setItem('setUserID', data.userData.user_id);
            // localStorage.setItem('userCheck', data.controllerToken);
            localStorage.setItem('setToken', data.token);
            localStorage.setItem('setUserLoginChk', data.controllerToken);
            localStorage.setItem('setUserData', data.userData);
            // localStorage.setItem('setUserData', JSON.stringify(data.userData));

            // 로컬스토리지의 정보 삭제부분(시간설정)
            setTimeout(function() {
                localStorage.clear();
            }, 2 * 60 * 60 * 1000);
        },
        // 유저 토큰 저장용
        setToken(state, token) {
            state.token = token;
        },
    
    },

    actions: {

        openLoginModal({ commit }) {
            commit('setToggleModal');
        },
        closeLoginModal({ commit }) {
            commit('setCloseModal');
        },

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
                context.dispatch('closeLoginModal');
                console.log("레스", res);
                console.log(requestData);
                
				const token = res.data.token;
                const userData = res.data.userData;
                const userID = res.data.userData.user_id;
				// const decoded = jwtDecode(token);
				console.log(token);
				console.log(userData);
				// console.log("유저데이터", res.data.userData);

                if (res.data.success) {
                    context.commit('setSaveToLocalStorage', res.data);
                    context.commit('setUserData', userData);
                    context.commit('setUserLoginChk', res.data.controllerToken);
                    context.commit('setUserID', userID);
                    context.commit('setToken', token);

                    // router.push('/');
                    // this.$router.push('/');

                    // const loginUserData = res.data.userData.userID;
                    console.log("레스.데이터", res.data);
                    // console.log("유저체크", res.data.controllerToken);
                    // console.log(res.data.userData);
					// localStorage.setItem('loginUser', userId);
					// localStorage.setItem('loginUserId', res.data.userId);
					// localStorage.setItem('loginUserEmail', res.data.userEmail);
					localStorage.setItem('setUserData', userData);
					localStorage.setItem('setToken', token);
					localStorage.setItem('setUserLoginChk', res.data.token);
					localStorage.setItem('setSaveToLocalStorage', res.data);
                    

                    alert('로그인 성공. 페이지를 새로 고칩니다.');
                    // location.reload();
                    // this.$router.push('/');
                    router.push('/');
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
            const token = localStorage.getItem('setToken');
            console.log(token);

            const header = {
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Content-Type": 'application/json',
                },
            };
            // const config = {
			// 	headers: {
			// 		'Authorization': `Bearer ${token}`
			// 	}
			// };

            axios.get(url, header)
            .then(res => {
                console.log('로그아웃', res);
                // context.commit('setUserLoginChk', false);
                // this.setSaveToLocalStorage(data);
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