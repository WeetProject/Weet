
import { createStore } from 'vuex';
import Vuex from 'vuex';
import router from '../js/router.js';
import axios from "axios";
import VueJwtDecode from 'vue-jwt-decode'

const store = createStore({

    state() {
        return {
            showmodal: false,
            // Main origin, destination Modal
            originModalFlg: false,
            destinationModalFlg: false,

            // 일반 로그인 
            userData: null,
            userID: null,
            token: null,
            // 카카오 록그인
            kakaoUserData: null,
            kakaoUserID: null,
            kakaoToken: null,

            // 구글 로그인
            googleUserData: null,
            googleUserEmail: null,
            googleToken: null,

            // ### Algolia ###
            algoliaStartingPoint: null,
            algoliaDestination: null,

            // ### Amadeus ###
            amadeusToken: null,
            // Amadeus 왕복 유저 검색 데이터 저장용
            roundTripSearchUserData: {
                // Amadeus Required Parameters
                roundTripOriginQueryCode: '', // 출발지
                roundTripDestinationQueryCode: '', // 도착지
                roundTripOriginDepartureDate: '', // 출발일
                roundTripAdultPassenger: '', // 성인 인원
                // Amadeus optional parameter
                roundTripOriginReturnDate: '', // 귀국일
                roundTripChildrenPassenger: '', // 소아 인원(소아 인원 없을 시 null)
                roundTripTravelClass: '', // 좌석 등급
                roundTripNonStop: '', // 직항
                roundTripCurrencyCode: '', // 원화
            },

            // Amadeus 편도 유저 검색 데이터 저장용
            oneWaySearchUserData: {
                // Amadeus Required Parameters
                oneWayOriginQueryCode: '', // 출발지
                oneWayDestinationQueryCode: '', // 도착지
                oneWayOriginDepartureDate: '', // 출발일
                oneWayAdultPassenger: '', // 성인 인원
                // Amadeus optional parameter
                oneWayChildrenPassenger: '', // 소아 인원
                oneWayTravelClass: '', // 좌석 등급
                oneWayNonStop: '', // 직항
                oneWayCurrencyCode: '', // 원화
            },

            // ### Admin ###
            // Admin Login 데이터 저장용
            adminToken: null,
            adminLoginData: null,
            adminLoginInfo: null,
            error: null,
            // Admin Update 데이터 저장용
            confirmAdminInfo: null,

            userListModal: false,
            userPaymentListModal: false,
            // User Management 데이터 저장용
            userManagementListData: {},
            userListData: [],
            userSelectOption: '0', // 0 : 최신 가입 순, 1 : 최신 결제 순
            userCurrentPage: 1,
            userLastPage: '',
			// Admin Management 데이터 저장용
			adminManagementListData: {},
            adminListData: [],
            adminSelectOption: '0', // 0 : 최신 등록 순, 1 : 권한 순
            adminCurrentPage: 1,
            adminLastPage: '',
            searchDate:'',
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
        // setBeforeUrl(state, beforeUrl) {
        //     state.beforeUrl = beforeUrl;
        // },
		
        // 로그인 시 유저 데이터
        setUserData(state, userData) {
            state.userData = userData;
        },        
        // 로그인했을 때 유저ID값
        setUserID(state, userID) {
            state.userID = userID;
        },
        // 유저 토큰 저장용
        setToken(state, token) {
            state.token = token;
        },
        // 유저 로그인 정보 저장용
        setSaveToLocalStorage(state, data) {

            state.userData = {
                userName: data.userData.userName,
                userEmail: data.userData.userEmail,
                userID: data.userData.user_id,
                setToken: data.token,
            };

            localStorage.setItem('setUserID', data.userData.user_id);
            localStorage.setItem('setToken', data.token);
            localStorage.setItem('setUserData', data.userData);

            // 로컬스토리지의 정보 삭제부분(시간설정)
            setTimeout(function() {
                localStorage.clear();
            }, 2 * 60 * 60 * 1000);
        }, 
        setKakaoUserID(state, kakaoUserID) {
            state.kakaoUserID = kakaoUserID;
        },
        setKakaoToken(state, kakaoToken) {
            state.kakaoToken = kakaoToken;
        },
        setGoogleUserID(state, googleUserEmail) {
            state.googleUserEmail = googleUserEmail;
        },
        setGoogleToken(state, googleToken) {
            state.googleToken = googleToken;
        },

        // ### Algolia ###
        // Algolia 출발지
        setAlgoliaStartingPoint(state, algoliaStartingPoint) {
            state.algoliaStartingPoint = algoliaStartingPoint;
        },
        // Algolia 도착지
        setAlgoliaDestination(state, algoliaDestination) {
            state.algoliaDestination = algoliaDestination;
        },

        // ### Amadeus ###

        // 출발지, 검색지 모달 open
        setOriginModal(state) {
            state.originModalFlg = true;
        },
        
        setOriginModalClose(state) {
            state.originModalFlg = false;
        },

        setDestinationModal(state) {
            state.destinationModalFlg = true;
        },

        setDestinationModalClose(state) {
            state.destinationModalFlg = false;
        },
        
        // Amadeus 토큰
        setAmadeusToken(state, amadeusToken) {
            state.amadeusToken = amadeusToken;
        },

        setRoundTripSearchUserData(state, roundTripSearchUserData) {
            state.roundTripSearchUserData = roundTripSearchUserData;
        },

        setOneWaySearchUserData(state, oneWayUserSearchData) {
            state.oneWaySearchUserData = oneWayUserSearchData;
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

        setAdminError(state, adminError) {
            state.adminError = adminError;
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

        // User Management Pagination
        setUserCurrentPage(state, userCurrentPage) {
            state.userCurrentPage = userCurrentPage;
        }, 
        setUserLastPage(state, userLastPage) {
            state.userLastPage = userLastPage;
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

        // Admin Management Pagination
        setAdminCurrentPage(state, adminCurrentPage) {
            state.adminCurrentPage = adminCurrentPage;
        }, 
        setAdminLastPage(state, adminLastPage) {
            state.adminLastPage = adminLastPage;
        },
        
        // Admin Update
        setAdminUpdateInfo(state, confirmAdminInfo) {
            state.confirmAdminInfo = confirmAdminInfo;
        },

        // Admin Management Withdrawal
        setAdminManagementWithdrawalInfo(state, confirmAdminInfo) {
            state.confirmAdminInfo = confirmAdminInfo;
        }
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

                if (res.data.success) {

                    const token = res.data.token;
                    const userID = res.data.userData.userEmail;
                    const userData = res.data.userData;
                    // console.log(token);

                    context.commit('setToken', token);
                    context.commit('setUserID', userID);
                    context.commit('setUserData', userData);
					
					localStorage.setItem('setToken', token);
					localStorage.setItem('setUserID', userID);
                    // localStorage.setItem('setUserData', userData);
                    localStorage.setItem('setUserData', JSON.stringify(userData));
                    alert('로그인 성공. WEET에서 즐거운 여행되세요:)');
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
        logout(context, data) {
            const userToken = localStorage.getItem('setToken');
            // user Token 미 존재시
            if (!userToken) {
                localStorage.clear();
                alert('세션이 만료되었습니다. 다시 로그인해주세요.');
                location.reload();

                return;
            }

            const url = '/logout';
            const token = localStorage.getItem('setToken');

            const header = {
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Content-Type": 'application/json',
                },
            };
            
            axios.get(url, header)
            .then(res => {
                localStorage.clear();
                location.reload();
            })
            .catch(err => {
                console.log(err.response.data);
            });
        },

        // 카카오 유저 로그인 데이터 수신
        kakaoUserLoginData({ commit }) {            
			const URL = '/kakaoLoginData'
			axios.post(URL)
                .then(response => {               
                    if (response.data.code === 'KLI00') {
                        const kakaoUserData = response.data.kakaoUserData;
                        const kakaoUserID = kakaoUserData.kakaoUserEmail;
                        const kakaoToken = kakaoUserData.kakaoToken;

                        console.log('카카오유저데이터', kakaoUserData);

                        commit('setKakaoUserID', kakaoUserID);
                        commit('setKakaoToken', kakaoToken);
                        
                        localStorage.setItem('setKakaoUserID', kakaoUserID);
                        localStorage.setItem('setKakaoToken', kakaoToken);

                        // alert('로그인 성공. WEET에서 즐거운 여행되세요:)');
                        router.push('/');
                    } else {
                        alert('로그인 실패. 이메일 또는 비밀번호를 확인해주세요.');
                    }
                })
                .catch(error => {
                    console.error("에러");
                    console.error("에러메세지", error.message);
                    console.error("에러상태", error.response.status);
                    console.error("에러응답데이터", error.response);
                });
		},

        // 카카오 유저 로그아웃
        kakaoLogout() {
            const URL = '/logout/kakao';
            const accessToken = localStorage.getItem('setKakaoToken');
            console.log(accessToken);

            axios.post(URL, null, {
                headers: {
                    "Authorization": `Bearer ${accessToken}`
                }
            })
            .then(response => {

                console.log(response);

                if(response.data.code === "KLO00") {
                    localStorage.clear();
                    console.log(response.data.code);
                    console.log("카카오 로그아웃 성공");
                    location.reload();
                } else if(response.data.code === "KLO01") {
                    alert('토큰이 만료되었습니다. 자동으로 로그아웃됩니다.');
                    localStorage.clear();
                    location.reload();
                }
                
            })
            .catch(error => {
                console.log(error);
                console.log(error.status);

                if(error.response.status === 401) {
                    alert('토큰이 만료되었습니다. 자동으로 로그아웃됩니다.');
                    localStorage.clear();
                    location.reload();
                }
                console.error("카카오 로그아웃 오류:", error);
            });

        },

        // 구글 로그인 데이터 수신
        googleUserLoginData({ commit }) {
            const URL = '/googleLoginData'
			axios.post(URL)
                .then(response => {               
                    if (response.data.code === 'GLI00') {
                        const googleUserData = response.data.googleUserData;
                        const googleUserEmail = googleUserData.googleUserEmail;
                        const googleToken = googleUserData.googleToken;

                        commit('setGoogleUserID', googleUserEmail);
                        commit('setGoogleToken', googleToken);
                        
                        localStorage.setItem('setGoogleUserID', googleUserEmail);
                        localStorage.setItem('setGoogleToken', googleToken);

                        // alert('로그인 성공. WEET에서 즐거운 여행되세요:)');
                        router.push('/');
                    } else {
                        alert('로그인 실패. 이메일 또는 비밀번호를 확인해주세요.');
                    }
                })
                .catch(error => {
                    console.error("에러");
                    console.error("에러메세지", error.message);
                    console.error("에러상태", error.response.status);
                    console.error("에러응답데이터", error.response);
                });
        },

        // 구글 유저 로그아웃
        googleLogout() {
            const URL = '/logout/google';
            const accessToken = localStorage.getItem('setGoogleToken');
            console.log(accessToken);

            axios.post(URL, null, {
                headers: {
                    "Authorization": `Bearer ${accessToken}`
                }
            })
            .then(response => {
                if(response.data.code === "GLO00") {
                    localStorage.clear();
                    console.log(response.data.code);
                    console.log("구글 로그아웃 성공");
                    location.reload();
                }
                
            })
            .catch(error => {
                console.error("구글 로그아웃 오류:", error);
            });

        },

        // amadeus Token 발급
        amadeusToken({ commit }) {
			const tokenURL = '/amadeus';
			axios.post(tokenURL)
                .then(response => {               
                    if (response.data.code === 'AT00') {
                        const amadeusToken = response.data.amadeusToken;

                        commit('setAmadeusToken', amadeusToken);
                        
                        localStorage.setItem('setAmadeusToken', amadeusToken);
                    } else {
                        alert('발급실패');
                    }
                })
                .catch(error => {
                    console.error("에러");
                    console.error("에러메세지", error.message);
                    console.error("에러상태", error.response.status);
                    console.error("에러응답데이터", error.response);
                });
		},















        // ### Admin ###
        // Admin Login
        adminLogin({ commit }, adminLoginFormData) {
            const URL = '/admin';
            axios.post(URL, adminLoginFormData)
                .then(response => {
                    if (response.data.code === "ALI00") {                        
                        // adminToken 저장
                        const adminToken = response.data.token;
                        // adminFlg, adminName 저장
                        const adminLoginInfo = response.data.adminLoginInfo;

                        commit('setAdminToken', adminToken);
                        commit('setAdminLoginInfo', adminLoginInfo);

                        // 로컬스토리지 내 adminToken 저장
                        localStorage.setItem('setAdminToken', adminToken);
                        localStorage.setItem('setAdminLoginInfo', JSON.stringify(adminLoginInfo));
                        router.push('/admin/dashboard');
                    }
                })
                .catch(error => {
                    if(error.response)
                        if(error.response.data.code === "AV01") {                        
                        commit('setAdminError', error.response.data.error);
                    } else if (error.response.data.code === "ALI01") {
                        alert(error.response.data.error);
                    } else {
                        alert('오류가 발생했습니다. 새로고침 후 로그인을 해주세요');
                    }
                });
        },
        // Admin Logout
        adminLogout() {
            const adminToken = localStorage.getItem('setAdminToken');
            // Admin Token 미 존재시
            if (!adminToken) {
                localStorage.clear();
                alert('세션이 만료되었습니다. 다시 로그인해주세요.');
                router.push('/admin');
                return;
            }

            const URL = '/admin/dashboard/logout';
            const header = {
                headers: {
                    "Authorization": `Bearer ${adminToken}`,
                },
            };
            axios.post(URL, null ,header)
				.then(response => {
					if(response.data.code === "ALO00") {
							localStorage.clear();
							alert('로그아웃 되었습니다.');
							router.push('/admin');
						} else {                
							commit('setAdminError', response.data.error);
							alert(response.data.error);
						}
				})
				.catch(error => {
                    // Admin Token 만료
                    if(error.response) {
                        if(error.response.data.code === "ALO01") {
                            localStorage.clear();                            
                            console.log(error.response.data.error);
                            alert(error.response.data.error);
                            router.push('/admin');
                        }
                    } else {
                        commit('setAdminError', error.response.data.error);
                        alert(error.response.data.error);
                    }
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
						commit('setUserCurrentPage', response.data.userManagementList.current_page);
						commit('setUserLastPage', response.data.userManagementList.last_page);
					} else {
						alert(response.data.error);
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
						commit('setUserCurrentPage', response.data.userManagementPaymentList.current_page);
                        commit('setUserLastPage', response.data.userManagementPaymentList.last_page);
                        commit('setUserSelectOption', userSelectOption);
					} else {
						alert(response.data.error);
					}
				})
				.catch(error => {
					console.error(error);
				});
		},

        // User Management Pagination
        userPagination({ state, dispatch }, page) {
            // 페이지가 현재 페이지와 같은지 확인하여 중복 요청을 방지합니다.
            if (page !== state.userCurrentPage) {
                const userManagementOption = state.userSelectOption
                console.log('유저옵션' + state.userSelectOption);
                if(userManagementOption) {
                    console.log('유저 페이징');
                    if(userManagementOption === '0') {
                        console.log('유저 0 옵션 실행');
                        dispatch('userManagementList', page);
                    } else if(userManagementOption === '1') {
                        console.log('유저 1 옵션 실행');
                        dispatch('userManagementPaymentList', page);
                    }
                }      
            }
        },

        // User Management Pagination(first)
		userFirstPagination({ state, dispatch }) {
            if(state.userSelectOption === '0' && state.userCurrentPage !== 1) {
                dispatch('userPagination', 1);
            } 
		},

		// User Management Pagination(prev)
		userPrevPagination({ state, dispatch }) {
            const userPrevPage = state.userCurrentPage - 1;
            if(state.userCurrentPage) {
                if (userPrevPage > 0) {
                    dispatch('userPagination', userPrevPage);
                }
            }
        },

		// User Management Pagination(next)
        userNextPagination({ state, dispatch }) {
            const userNextPage = state.userCurrentPage + 1;
            if(state.userCurrentPage) {
                if (userNextPage <= state.userLastPage) {
                    dispatch('userPagination', userNextPage);
                }
            }
        },

		// User Management Pagination(last)
		userLastPagination({ state, dispatch }) {
            if (state.userCurrentPage && state.userCurrentPage !== state.userLastPage) {
                dispatch('userPagination', state.userLastPage);
            } 
        },

        // Admin 권한 변경
        adminManagementUpdate({ commit }, admin_number) {
            const URL = '/admin/dashboard/management/update';
            axios.post(URL, { admin_number })
				.then(response => {                
					if(response.data.code === "AMU00") {
                        const confirmAdminInfo = response.data.confirmAdminInfo;
                        commit('setAdminUpdateInfo', confirmAdminInfo);
						alert(response.data.success);
                        window.location.reload();
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(error.response.data.error);
				});
        },

        // Admin 계정 탈퇴
        adminManagementWithdrawal({ commit }, admin_number) {
            console.log(admin_number);
            const URL = '/admin/dashboard/management/withdrawal';
            axios.post(URL, { admin_number })
				.then(response => {                
					if(response.data.code === "AMW00") {
                        const confirmAdminInfo = response.data.confirmAdminInfo;
                        commit('setAdminManagementWithdrawalInfo', confirmAdminInfo);
                        alert(response.data.success);
                        window.location.reload();
					} else {                
						alert(response.data.error);
					}
				})
				.catch(error => {                
					alert(error.response.data.error);
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
						commit('setAdminCurrentPage', response.data.adminManagementList.current_page);
						commit('setAdminLastPage', response.data.adminManagementList.last_page);
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
						commit('setAdminCurrentPage', response.data.adminManagementFlgList.current_page);
						commit('setAdminLastPage', response.data.adminManagementFlgList.last_page);
						commit('setAdminSelectOption', adminSelectOption);
                    }  else {
                        console.error('서버 오류');
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        },       

        // Admin Management Pagination 
        adminPagination({ state, dispatch }, page) {
            // 페이지가 현재 페이지와 같은지 확인하여 중복 요청을 방지합니다.
            if (page !== state.adminCurrentPage) {
                const adminManagementOption = state.adminSelectOption
                if(adminManagementOption) {
                    console.log('어드민 페이징');
                    if(adminManagementOption === '0') {
                        console.log('어드민 0 옵션 실행');
                        dispatch('adminManagementList', page);
                    } else if(adminManagementOption === '1') {
                        console.log('어드민 1 옵션 실행');
                        dispatch('adminManagementFlgList', page);
                    }
                }    
            }
        },

        // Admin Management Pagination(first)
		adminFirstPagination({ state, dispatch }) {
            if(state.adminSelectOption === '0' && state.adminCurrentPage !== 1) {
                dispatch('adminPagination', 1);
            }
		},

		// Admin Management Pagination(prev)
		adminPrevPagination({ state, dispatch }) {
            const adminPrevPage = state.adminCurrentPage - 1;            
            if(state.adminCurrentPage) {
                if (adminPrevPage > 0) {
                    dispatch('adminPagination', adminPrevPage);
                }
            }
        },

		// Admin Management Pagination(next)
        adminNextPagination({ state, dispatch }) {
            const adminNextPage = state.adminCurrentPage + 1;
            if(state.adminCurrentPage) {
                if (adminNextPage <= state.adminLastPage) {
                    dispatch('adminPagination', adminNextPage);
                }
            }
        },

		// Admin Management Pagination(last)
		adminLastPagination({ state, dispatch }) {
            if (state.adminCurrentPage && state.adminCurrentPage !== state.adminLastPage) {
                dispatch('adminPagination', state.adminLastPage);
            }
        },        
    }
});

export default store;