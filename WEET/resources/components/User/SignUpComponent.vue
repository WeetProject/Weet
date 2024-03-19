<template>
    <div class="regist_container_wrap">
        <div class="regist_container" :class="{ 'container_signup_none': signFlg1 }">
            <main class="regist_terms_conditions_chk">
                <div class="regist_logo_div">
                    <!-- <div class="regist_logo_div_main_logo">
                        <img src="../../../public/images/WEET_logo.png" alt="">
                    </div> -->
                    <div class="regist_logo_div_title">
                        <h1>SIGN UP</h1>
                    </div>
                </div>

                <div class="regist_terms_box">
                    <div class="terms_conditions_title">
                        <h1><strong>1. WEET 이용약관</strong></h1>
                    </div>
                    <hr>
                    <div class="terms_conditions_box">
                        <p class="text-center"><strong>서비스 이용약관</strong></p>

                        <p><strong>제1조 (목적)</strong></p>
                            <br>
                        <p>이 이용약관은 [WEET] (이하 "회사"라 함)이 운영하는 인터넷 관련 서비스 및 기타 관련 제반 서비스(이하 "서비스"라 함)를 이용함에 있어 회사와 이용자의 권리, 의무 및 책임 사항을 규정함을 목적으로 합니다.</p>
                            <br>
                        <p><strong>제2조 (약관의 효력과 변경)</strong></p>
                            <br>
                        <p>본 약관은 서비스를 신청한 이용자가 본 약관에 동의하고 회사가 정한 가입신청 양식에 기반하여 가입을 완료하는 시점부터 효력이 발생합니다.</p>
                        <p>1. 회사는 필요한 경우 관련 법령 및 회사의 내부 정책을 반영하여 이 약관을 변경할 수 있으며, 변경된 약관은 회사의 홈페이지나 서비스 내 공지를 통해 이용자에게 공지됩니다.</p> 
                        <p>변경된 약관은 공지 후 7일 이내에 이용자의 동의 없이 적용됩니다. </p>
                        <p>2. 이용자가 변경된 약관에 동의하지 않을 경우 회사는 해당 이용자에 대하여 서비스 제공을 중단할 수 있습니다.</p>
                            <br>
                        <p><strong>제3조 (이용자의 의무)</strong></p>
                            <br>
                        <p>1. 이용자는 서비스 이용 시 관련 법령, 약관, 공지사항, 회사의 안내 등에 따라 서비스를 이용해야 하며, 회사의 명시적 동의 없이는 서비스를 이용하여 얻은 정보를 복제, 유통, 출판하거나 상업적으로 이용할 수 없습니다.</p>
                        <p>2. 이용자는 서비스 이용 시 다음 각 호의 행위를 하지 않아야 합니다.</p>
                        <p>가. 타인의 정보를 도용하거나 부정한 목적으로 이용하는 행위</p>
                        <p>나. 서비스를 통해 전송되는 컨텐츠를 위변조, 삭제, 변경하는 행위</p>
                        <p>다. 서비스의 안전성, 안정성 및 정상적인 운영을 방해하는 행위</p>
                            <br>
                        <p><strong>제4조 (회사의 의무)</strong></p>
                            <br>
                        <p>회사는 이용자의 개인정보 보호를 위해 최선을 다하며, 관련 법령에 따라 이를 처리합니다.</p>
                        <p>회사는 서비스 제공을 위해 지속적으로 시스템 및 네트워크 관리를 개선하며, 서비스 이용 중 발생하는 장애나 문제에 대하여 신속하게 조치합니다.</p>
                            <br>
                        <p><strong>제5조(개인정보의 안전성 확보 조치)</strong></p>
                            <br>
                        <p>1. 회사는 개인정보보호법 제29조에 따라 다음과 같이 안전성 확보에 필요한 기술적, 관리적, 물리적 조치를 하고 있습니다.</p>
                        <p>가. 개인정보 암호화: 이용자의 개인정보는 암호화되어 저장 및 관리됩니다.</p>
                        <p>나. 접근 제한: 개인정보를 처리하는 데이터베이스시스템에 대한 접근 권한을 최소한으로 제한하고 있습니다.</p>
                        
                    </div>
                    
                    <div class="terms_conditions_checkbox_btn">
                        <input class="terms_conditions_checkbox" type="checkbox" v-model="frmUserData.userTermsofUse" />
                        <label class="terms_conditions_label">이용약관 및 개인정보수집 및 이용에 모두 동의합니다.</label>
                    </div>
                </div>
            <hr>
                <div class="regist_button">
                    <div class="regist_button_cel">
                        <button class="regist_button_cancel">CANCEL</button>
                    </div>
                    <div class="regist_button_nxt">
                        <button class="regist_button_next" type="button" @click="moveToNext">NEXT</button>
                    </div>
                </div>
            </main>
        </div>

        <div class="regist_container" :class="{ 'container_signup_none': signFlg2 }">
            
            <main class="regist_user_info">
                <div class="regist_logo_div">
                    <!-- <div class="regist_logo_div_main_logo">
                        <img src="../../../public/images/WEET_logo.png" alt="">
                    </div> -->
                    <div class="regist_logo_div_title">
                        <h1>SIGN UP</h1>
                    </div>
                </div>
                <div class="terms_conditions_title">
                    <h1><strong>2. WEET 계정정보</strong></h1>
                </div>
                <hr>
                <div class="regist_user_info_div">
    
                    <div class="regist_user_info_box">
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">이메일</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input id="user_email" name="user_email" v-model="frmUserData.userEmail" @input="validateUserEmail" type="email" placeholder="이메일을 입력해주세요">
                                <div class="regist_message_container">
                                    <div class="error_message text-xs text-red-500" v-if="errors.userEmail">{{ errors.userEmail }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userEmail && frmUserData.userEmail && EmailDoubleCheck">유효한 이메일입니다.</div>
                                    <div class="error_message text-xs text-red-500" v-else-if="!EmailDoubleCheck">{{ EmailDoubleerror }}</div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userEmail">{{ RegistrationErrorMessage.userEmail }}</div>
                                </div>
                            </div>
                            <div class="regist_user_info_box_email_chk">
                                <button class="text-xs text-center font-bold" @click="postEmailDoubleCheck">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">비밀번호</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input id="user_password" name="user_password" v-model="frmUserData.userPassword" @input="validateUserPassword" type="password" placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자" minlength="8" maxlength="17">
                                <div class="regist_message_container">
                                    <div class="error_message text-xs text-red-500" v-if="errors.userPassword">{{ errors.userPassword }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userPassword && frmUserData.userPassword">유효한 비밀번호입니다.</div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userPassword">{{ RegistrationErrorMessage.userPassword }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">비밀번호 확인</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input v-model="frmUserData.userPasswordChk" @input="validateUserPasswordChk" type="password" placeholder="영대소문자,숫자,특수문자(!@#)를 포함한 8~16자" minlength="8" maxlength="17">
                                <div class="regist_message_container">
                                    <div class="error_message text-xs text-red-500" v-if="errors.userPasswordChk">{{ errors.userPasswordChk }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userPasswordChk && frmUserData.userPasswordChk">비밀번호가 일치합니다.</div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userPasswordChk">{{ RegistrationErrorMessage.userPasswordChk }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">이름</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input id="user_name" name="user_name" v-model="frmUserData.userName" @input="validateUserName" type="text" placeholder="최소 2글자 이상">
                                <div class="regist_message_container">
                                    <div class="error_message text-xs text-red-500" v-if="errors.userName">{{ errors.userName }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userName && frmUserData.userName"></div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userName">{{ RegistrationErrorMessage.userName }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">연락처</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input id="user_tel" name="user_tel" v-model="frmUserData.userTel" @input="validateUserTel" type="tel" placeholder="'-'없이 숫자만 입력해주세요">
                                <div class="regist_message_container">
                                    <div class="error_message text-xs text-red-500" v-if="errors.userTel">{{ errors.userTel }}</div>
                                    <div class="success_message text-xs text-blue-500" v-else-if="!errors.userTel && frmUserData.userTel"></div>
                                    <div class="error_message text-xs text-red-500" v-else-if="RegistrationErrorMessage.userTel">{{ RegistrationErrorMessage.userTel }}</div>
                                </div>
                            </div>    
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label_postcode">
                                <span class="font-bold">우편번호</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input_postcode">
                                <input id="user_postcode" name="user_postcode" v-model="frmUserAddressData.userPostcode" type="text" placeholder="">
                            </div>
                            <div class="regist_user_info_box_input_search">
                                <button class="font-bold" type="button" @click="openDaumPostcode()">검색</button>
                            </div>
                            <div class="regist_user_info_box_input_basic_address">
                                <input id="user_basic_address" name="user_basic_address" v-model="frmUserAddressData.userBasicAddress" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">상세주소</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input id="user_detail_address" name="user_detail_address" v-model="frmUserAddressData.userDetailAddress" type="address" placeholder="나머지 주소를 입력해주세요">
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">성별</span><span style="color: red;">*</span>
                            </div>
                            <!-- <div class="regist_user_info_box_input_gender"> -->
                            <div class="regist_user_info_box_input">
                                <div class="regist_user_info_box_gender">
                                    <div class="regist_user_info_box_gender_choose">
                                        <div>
                                            <input v-model="frmUserData.userGender" type="radio" id="male" name="user_gender" value="남자">
                                            <!-- <label for="male">남</label> -->
                                        </div>
                                        <div>
                                            <span>남</span>
                                        </div>
                                    </div>
                                    <div class="regist_user_info_box_gender_choose">
                                        <div>
                                            <input v-model="frmUserData.userGender" type="radio" id="female" name="user_gender" value="여자">
                                            <!-- <label for="female">여</label> -->
                                        </div>
                                        <div>
                                            <span>여</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="regist_user_info_box_input_gender">
                                <div class="regist_user_info_box_gender">
                                    <div>
                                        <input v-model="frmUserData.userGender" type="radio" id="female" name="user_gender">
                                    </div>
                                    <div>
                                        <span>여</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="regist_user_info_box_content">
                            <div class="regist_user_info_box_label">
                                <span class="font-bold">생년월일</span><span style="color: red;">*</span>
                            </div>
                            <div class="regist_user_info_box_input">
                                <input id="user_birthdate" name="user_birthdate" v-model="frmUserData.userBirthDate" @input="validateUserBirthDate" type="date" placeholder="">
                                <div class="regist_message_container">
                                    <div class="error_message" v-if="RegistrationErrorMessage.userBirthDate && !frmUserData.userBirthDate">{{ RegistrationErrorMessage.userBirthDate }}</div>
                                    <div class="error_message" v-if="errors.userBirthDate && !frmUserData.userBirthDate">{{ errors.userBirthDate }}</div>
                                    <div class="success_message" v-if="!errors.userBirthDate && frmUserData.userBirthDate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <hr>
                <div class="regist_button">
                    <div class="regist_button_cel">
                        <button class="regist_button_cancel" @click="signFlg1=false; signFlg2=true;">PRE</button>
                    </div>
                    <div class="regist_button_nxt">
                        <button class="regist_button_next" type="submit" @click="submitFrmUserData()">Submit</button>
                    </div>
                </div>    
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'SignUpComponent',

    data() {
        return {
            signFlg1: false,
            signFlg2: true,

            frmUserData: {
                userEmail: '',
                userPassword: '',
                userPasswordChk: '',
                userName: '',
                userBirthDate: '',
                userGender: '',
                userTel: '',
                userTermsofUse: '',
            },

            frmUserAddressData: {
                userPostcode: '',
                userBasicAddress: '',
                userDetailAddress: '',
            },

            errors: {},

            RegistrationErrorMessage: {
                userEmail: '',
                userPassword: '',
                userPasswordChk: '',
                userName: '',
                userTel: '',
                userBirthDate: '',
                userDetailAddress: '',
            },

            EmailDoubleCheck: false,

            EmailDoubleerror: '',
        }
    },
    methods: {

        submitFrmUserData() {
            const url = '/signup';
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                },
            };

            let frm = new FormData();
            this.frmUserData.userTermsofUse = this.frmUserData.userTermsofUse ? 1 : 0;

            let genderValue = '';

            if(this.frmUserData.userGender === '남자') {
                genderValue = 'M';
            } else if(this.frmUserData.userGender === '여자') {
                genderValue = 'F';
            }

            frm.append('user_email', this.frmUserData.userEmail);
            frm.append('user_password', this.frmUserData.userPassword);
            frm.append('user_password_chk', this.frmUserData.userPasswordChk);
            frm.append('user_name', this.frmUserData.userName);
            frm.append('user_tel', this.frmUserData.userTel);
            // frm.append('user_gender', this.frmUserData.userGender);
            frm.append('user_gender', genderValue);
            frm.append('user_birthdate', this.frmUserData.userBirthDate);
            frm.append('user_detail_address', this.frmUserAddressData.userDetailAddress);
            frm.append('user_basic_address', this.frmUserAddressData.userBasicAddress);
            frm.append('user_postcode', this.frmUserAddressData.userPostcode);

            // 첫번째방법 : 이메일 중복체크안해도 회원가입완료됨. 기본 빈값만 체크 후 넘어감.
            // axios.post(url, frm, header)
            //     .then( res => {
            //         alert('회원가입이 완료되었습니다.');
            //         this.$router.push('/');
            //     })
            //     .catch( err => {

            //         console.error(err);
            //         // if( !this.frmUserAddressData && this.frmUserData ) {
            //         if( !this.frmUserData.userEmail || !this.frmUserData.userPassword || !this.frmUserData.userPasswordChk || 
            //             !this.frmUserData.userName || !this.frmUserData.userTel || !this.frmUserData.userBirthDate || 
            //             !this.frmUserData.userGender || !this.frmUserAddressData.userDetailAddress || 
            //             !this.frmUserAddressData.userBasicAddress || !this.frmUserAddressData.userPostcode ) {
            //             alert('필수입력사항을 확인해주세요.');
            //         }
            //         // } else if( err.response.data.errors === false) {
            //         //     alert('이메일 중복 체크를 해주세요.');
            //         // }
            //         else {
            //             alert('사용중인 이메일입니다. 이메일을 다시 확인해주세요');
            //             console.error('Unexpected error:', err);
            //         }
            //     })

            // 두번째방법 : 
            // 이메일 중복 체크를 수행하고 회원가입 완료
            // this.postEmailDoubleCheck(this.frmUserData.userEmail)
            //     .then((emailCheckResult) => {
            //         if (emailCheckResult) {
            //             // 이메일 중복이 없으면 회원가입 완료
            //             axios.post(url, frm, header)
            //                 .then(res => {
            //                     alert('회원가입이 완료되었습니다.');
            //                     this.$router.push('/');
            //                 })
            //                 .catch(err => {
            //                     if( !this.frmUserData.userEmail || !this.frmUserData.userPassword || !this.frmUserData.userPasswordChk || 
            //                         !this.frmUserData.userName || !this.frmUserData.userTel || !this.frmUserData.userBirthDate || 
            //                         !this.frmUserData.userGender || !this.frmUserAddressData.userDetailAddress || 
            //                         !this.frmUserAddressData.userBasicAddress || !this.frmUserAddressData.userPostcode ) {
            //                         alert('필수입력사항을 확인해주세요.');
            //                     }
            //                     console.error('Unexpected error:', err);
            //                 });
            //         }
            //             // 이메일 중복이 있으면 사용자에게 알림
            //             alert('중복된 이메일입니다.');
                    
            //     })
            //     .catch(err => {
            //         console.error('이메일 중복 체크 오류:', err);
            //     });

            // 세번째방법 : 없는 이메일이면 중복체크 안하고 바로 회원가입처리되버림
            // axios.post(url, frm, header)
            //     .then(res => {
            //         // 이메일 중복 체크를 수행하고 회원가입 완료
            //         this.postEmailDoubleCheck(this.frmUserData.userEmail)
            //             .then((emailCheckResult) => {
            //                 if (emailCheckResult) {
            //                     alert('회원가입이 완료되었습니다.');
            //                     this.$router.push('/');
            //                 } else {
            //                     alert('중복된 이메일입니다.');
            //                 }
            //             })
            //             .catch(err => {
            //                 console.error('이메일 중복 체크 오류:', err);
            //             });
            //     })
            //     .catch(err => {
            //         console.error(err);
            //         if (!this.frmUserData.userEmail || !this.frmUserData.userPassword || !this.frmUserData.userPasswordChk || 
            //             !this.frmUserData.userName || !this.frmUserData.userTel || !this.frmUserData.userBirthDate || 
            //             !this.frmUserData.userGender || !this.frmUserAddressData.userDetailAddress || 
            //             !this.frmUserAddressData.userBasicAddress || !this.frmUserAddressData.userPostcode ) {
            //             alert('필수입력사항을 확인해주세요.');
            //         } else {
            //             alert('사용중인 이메일입니다. 이메일을 다시 확인해주세요');
            //         }
            //     });

        },

        moveToNext() {
            if(this.frmUserData.userTermsofUse) {
                this.signFlg1 = true;
                this.signFlg2 = false;
            }
            else {
                alert('이용약관에 동의 체크 해주세요');
            }
        },

        // 우편번호+기본주소(basicAddress) 입력 함수
        openDaumPostcode() {
            if (typeof daum === 'undefined') {
                // 스크립트를 동적으로 로드하고 로드되면 콜백을 실행합니다.
                const script = document.createElement('script');
                script.src = '//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js';
                script.onload = () => {
                    // 로드가 완료되면 daum.Postcode를 사용할 수 있습니다.
                    new daum.Postcode({
                        oncomplete: (data) => {
                        this.handleAddressComplete(data);
                    }
            }).open();
                };
                document.head.appendChild(script);
            } else {
                // 이미 로드되었으면 바로 실행합니다.
                new daum.Postcode({
                    oncomplete: (data) => {
                        this.handleAddressComplete(data);
                    }
                }).open();
            }
            },
        handleAddressComplete(data) {
        // 주소 검색 완료 후 처리할 작업을 수행합니다.
            var roadAddr = data.roadAddress;
            var extraRoadAddr = '';

            if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                extraRoadAddr += data.bname;
            }

            if (data.buildingName !== '' && data.apartment === 'Y') {
                extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
            }

            if (extraRoadAddr !== '') {
                extraRoadAddr = ' (' + extraRoadAddr + ')';
            }

            this.frmUserAddressData = {
                userPostcode: data.zonecode,
                userBasicAddress: roadAddr,
            }
            console.log(data);
        },

        // 이메일 중복체크
        postEmailDoubleCheck() {
            const url = '/signupEmailDoubleChk';

            let frm = new FormData();
            frm.append('user_email', this.frmUserData.userEmail);

            axios.post(url, frm)
            .then(res => {
                if (res.data.message) {
                    // 성공 메시지 표시
                    if (confirm('사용 가능한 이메일입니다. 확인하시겠습니까?')) {
                        this.EmailDoubleCheck = true;
                    }
                } else if (res.data.message === false) {
                    // this.EmailDoubleerror = '이미 존재하는 이메일입니다.';
                    // 에러 메시지 표시
                    if (confirm('이미 존재하는 이메일입니다. 확인하시겠습니까?')) {
                        this.EmailDoubleCheck = false;
                    }
                }
            })
            .catch(err => {
                if (err.response.data.errors) {
                    // 에러 메시지 표시
                    alert('에러: 중복 확인에 실패하였습니다.');
                    // 에러 메시지 저장
                    this.RegistrationErrorMessage = err.response.data.errors;
                } else {
                    // 다른 종류의 예상치 못한 에러 처리
                    console.error('예상치 못한 에러:', err);
                }
            });
        },

        // 이메일 실시간 유효성 체크
        validateUserEmail() {
            if (!this.frmUserData.userEmail.match(/^\S+@\S+\.\S+$/)) {
                this.errors.userEmail = '이메일 양식이 맞지 않습니다.';
                this.EmailDoubleCheck = null;
            } else {
                this.errors.userEmail = '';
                this.EmailDoubleCheck = null;
            }
        },
        // 패스워드 실시간 유효성 체크
        validateUserPassword() {
            if (!this.frmUserData.userPassword.match(/^(?=.*[a-zA-Z])(?=.*[!@#]).+$/)) {
                this.errors.userPassword = '패스워드 양식이 맞지 않습니다.';
            } else {
                this.errors.userPassword = '';
            }
            
        },
        //
        validateUserPasswordChk() {
            if (this.frmUserData.userPasswordChk !== this.frmUserData.userPassword) {
                this.errors.userPasswordChk = '입력한 패스워드와 일치하지 않습니다.';
            } else {
                this.errors.userPasswordChk = '';
            }
        },
        validateUserName() {
            if (!this.frmUserData.userName.match(/^[a-zA-Z가-힣 ]+$/)) {
                this.errors.userName = '이름을 다시 한 번 확인해주세요.';
            } else {
                this.errors.userName = '';
            }
        },
        // validateUserBirthDate() {
        //     if (!this.frmUserData.userBirthDate.match(/^\d{4}-\d{2}-\d{2}$/)) {
        //         this.errors.userBirthDate = '생년월일을 다시 한 번 확인해주세요.';
        //     } else {
        //         this.errors.userBirthDate = '';
        //     }
        // },
        validateUserBirthDate() {
            // Get current date
            const currentDate = new Date();

            // Parse user's birthdate
            const userBirthDate = new Date(this.frmUserData.userBirthDate);

            // Compare birthdate with start date (1900-01-01) and current date
            if (userBirthDate < new Date('1900-01-01') || userBirthDate > currentDate) {
                this.errors.userBirthDate = '올바른 생년월일을 입력하세요.';
            } else {
                this.errors.userBirthDate = '';
            }
        },
        validateUserTel() {
            if (!this.frmUserData.userTel.match(/^01[016789]\d{7,8}$/)) {
                this.errors.userTel = '연락처가 올바르지 않습니다.';
            } else {
                this.errors.userTel = '';
            }
        },
    },
}

</script>

<style lang="scss">
	@import '../../sass/User/signup.scss';
</style>
