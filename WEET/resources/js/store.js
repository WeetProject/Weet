
import { createStore } from 'vuex';
import Vuex from 'vuex';
import router from '../js/router.js';
import axios from "axios";
import jwtDecode from 'vue-jwt-decode';

const store = createStore({

    state() {
        return {
            showmodal: false,			
            userData: null,
            userLoginChk: null,
            userID: null,
            // userToken: null,

            // ### Admin ###
            // Admin Login 데이터 저장용
            adminToken: null,
            adminLoginData: null,
            error: null,
            userListModal: false,
            userPaymentListModal: false,
            // User Management 데이터 저장용
            userManagementListData: {},
            userListData: [],
            userSelectOption: '0', // 0 : 최신 가입 순, 1 : 최신 결제 순                             
			// Admin Management 데이터 저장용
			adminManagementListData: {},
            adminListData: [],
            adminSelectOption: '0', // 0 : 최신 등록 순, 1 : 권한 순                             
            // Management Pagination 데이터 저장용
            currentPage: 1,
            lastPage: '',
            
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
            // state.userData = data.userData;

            state.userData = {
                userName: data.userData.userName,
                userEmail: data.userData.userEmail,
                userID: data.userData.user_id,
                setToken: data.token,
                userLoginChk: data.controllerToken
            };

            localStorage.setItem('setUserID', data.userData.user_id);
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




        // ### Admin ###
        // Admin 토큰
        setAdminToken(state, adminToken) {
			state.adminToken = adminToken;
            setTimeout(function() {
                localStorage.clear();
            }, 60 * 60 * 1000);
		},
        // Admin Flg, Name 저장용
        setAdminLoginInfo(state, adminLoginInfo) {
            state.adminLoginInfo = adminLoginInfo;
        },

        setAdminLoginError(state, error) {
            state.error = error;
        },

        // UserListModal Open
        userListModalOpen(state) {
            state.userListModal = true;
        },
        // UserListModal Close
        userListModalClose(state) {
            state.userListModal = false;
        },
        // UserListModal Open
        userPaymentListModalOpen(state) {
            state.userPaymentListModal = true;
        },
        // UserListModal Close
        userPaymentListModalClose(state) {
            state.userPaymentListModal = false;
        },

        // Pagination
        setCurrentPage(state, currentPage) {
            state.currentPage = currentPage;
        }, 
        setLastPage(state, lastPage) {
            state.lastPage = lastPage;
        },
        
        // User Management
        setUserSelectOption(state, userSelectOption) {
            state.userSelectOption = userSelectOption;
        },
        setUserManagementList(state, userManagementListData) {
            state.userManagementListData = userManagementListData;
        },
        setUserList(state, userListData) {
            state.userListData = userListData;
        },

		// Admin Management
        setAdminSelectOption(state, adminSelectOption) {
            state.adminSelectOption = adminSelectOption;
        },
        setAdminManagementList(state, adminManagementListData) {
            state.adminManagementListData = adminManagementListData;
        },
        setAdminList(state, adminListData) {
            state.adminListData = adminListData;
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
				
				console.log("토큰",token);
				console.log("유저데이터",userData);
				console.log("유저아이디",userID);
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
                    console.log(userID);
					// localStorage.setItem('loginUser', userId);
					// localStorage.setItem('loginUserId', res.data.userId);
					// localStorage.setItem('loginUserEmail', res.data.userEmail);
					localStorage.setItem('setUserData', userData);
					localStorage.setItem('setToken', token);
					localStorage.setItem('setUserID', userID);
					localStorage.setItem('setUserLoginChk', res.data.controllerToken);
					localStorage.setItem('setSaveToLocalStorage', res.data);
					localStorage.setItem('setUserID', userID);
                    

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















        // ### Admin ###
        // Login
        adminLogin({ commit }, adminLoginFormData) {
            const url = '/admin';
            axios.post(url, adminLoginFormData)
                .then(response => {
                    if (response.data.code === "ALI00") {
                        // adminToken 저장
                        const admintoken = response.data.token;
                        // adminFlg, adminName 저장
                        const adminLoginInfo = response.data.adminLoginInfo;

                        commit('setAdminToken', admintoken);
                        commit('setAdminLoginInfo', adminLoginInfo);

                        // 로컬스토리지 내 adminToken 저장
                        localStorage.setItem('setAdminToken', admintoken);
                        localStorage.setItem('setAdminLoginInfo', JSON.stringify(adminLoginInfo));
                        router.push('/admin/dashboard');
                    } else {                    
                        commit('setAdminLoginError', response.data.error);
                    }
                })
                .catch(error => {
                    commit('setAdminLoginError', error.response.data.error);
                });
        },

        // User Management List 데이터 수신
        userManagementList({ commit }, page) {
			const URL = '/admin/dashboard/user/management/userManagementList?page=' + page;            
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "UML00") {
                        this.state.userListData = response.data.userManagementList.data;				
						this.state.userListData.forEach(user => {
							// user_gender / M, F => 남자, 여자로 변경
                            user.user_gender = user.user_gender === 'M' ? '남' : '여';
                            // user_flg / 0, 1 => 정상, 정지로 변경
                            user.user_flg = user.user_flg === 0 ? '정상' : '정지';
						});
                        commit('setUserManagementList', response.data.userManagementList)
                        commit('setUserList', this.state.userListData);
						commit('setCurrentPage', response.data.userManagementList.current_page);
						commit('setLastPage', response.data.userManagementList.last_page);
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

        // User Management Payment List 데이터 수신
		userManagementPaymentList({ commit }, page) {
			const URL = '/admin/dashboard/user/management/userManagementPaymentList?page=' + page;
            const userSelectOption = '1';
			axios.get(URL)
				.then(response => {				
					if(response.data.code === "UMPL00") {
						commit('setUserManagementList', response.data.userManagementPaymentList);
                        commit('setUserList', response.data.userManagementPaymentList.data) 
						commit('setCurrentPage', response.data.userManagementPaymentList.current_page);
                        commit('setLastPage', response.data.userManagementPaymentList.last_page);
                        commit('setUserSelectOption', userSelectOption);
					} else {
						console.error('서버 오류');
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

		// Admin Management List 데이터 수신
        adminManagementList({ commit }, page) {
            const URL = '/admin/dashboard/management/adminManagementList?page=' + page;
            axios.get(URL)
                .then(response => {
                    if(response.data.code === "AML00") {
                        this.state.adminListData = response.data.adminManagementList.data;
                        this.state.adminListData.forEach(admin => {
                            // admin_flg / 1, 2 => Sub, Root로 변경
                            if (admin.admin_flg === 1) {
                                admin.admin_flg = 'Sub';
                            } else {
                                admin.admin_flg = 'Root';
                            }
                        });
                        commit('setAdminManagementList', response.data.adminManagementList);
                        commit('setAdminList', this.state.adminListData);
						commit('setCurrentPage', response.data.adminManagementList.current_page);
						commit('setLastPage', response.data.adminManagementList.last_page);
                    } else {
                        console.error('서버 오류');
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        },

        // Admin Management Flg List 데이터 수신
        adminManagementFlgList({ commit }, page) {
            const URL = '/admin/dashboard/management/adminManagementFlgList?page=' + page;
			const adminSelectOption = '1';
            axios.get(URL)
                .then(response => {
                    if(response.data.code === "AMFL00") {
                        this.state.adminListData = response.data.adminManagementFlgList.data;
                        this.state.adminListData.forEach(admin => {
                            // admin_flg / 1, 2 => Sub, Root로 변경
                            if (admin.admin_flg === 1) {
                                admin.admin_flg = 'Sub';
                            } else {
                                admin.admin_flg = 'Root';
                            }
                        });
                        commit('setAdminManagementList', response.data.adminManagementFlgList);
                        commit('setAdminList', this.state.adminListData);
						commit('setCurrentPage', response.data.adminManagementFlgList.current_page);
						commit('setLastPage', response.data.adminManagementFlgList.last_page);
						commit('setAdminSelectOption', adminSelectOption);
                    }  else {
                        console.error('서버 오류');
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        },
		

        // Management Pagination
        pagination({ state, dispatch }, page) {
            if (page !== state.currentPage) {
                console.log('유저 셀렉트' + state.userSelectOption);
                console.log('어드민 셀렉트' + state.adminSelectOption);

                if(state.userSelectOption !== undefined) {
                    if(state.userSelectOption === '0') {
                        console.log('userManagementList 함수 실행')
                        dispatch('userManagementList', page);
                    } else {
                        console.log('userManagementPaymentList 함수 실행');
                        dispatch('userManagementPaymentList', page);
                    }
                } 

                if(state.adminSelectOption !== undefined) {
                    if(state.adminSelectOption === '0') {
                        console.log('adminManagementList 함수 실행');
                        dispatch('adminManagementList', page);
                    } else {
                        console.log('adminManagementFlgList 함수 실행');
                        dispatch('adminManagementFlgList', page);
                    }
                } 
            }
        },
        // 첫번째 페이지
		firstPagination({ state, dispatch }) {
            if (state.currentPage !== 1) {
                dispatch('pagination', 1)
            }
		},

		// 이전 페이지
		prevPagination({ state, dispatch }) {
            const prevPage = state.currentPage - 1;
            if (prevPage > 0) {
                dispatch('pagination', prevPage);
            }
        },

		// 다음 페이지
        nextPagination({ state, dispatch }) {
            const nextPage = state.currentPage + 1;
            if (nextPage <= state.lastPage) {
                dispatch('pagination', nextPage);
            }
        },

		// 마지막 페이지
		lastPagination({ state, dispatch }) {
            if (state.currentPage !== state.lastPage) {
                dispatch('pagination', state.lastPage);
            }
        },
    }
});

export default store;