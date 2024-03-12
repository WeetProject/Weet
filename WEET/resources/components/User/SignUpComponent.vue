<template>
    <div class="regist_container_wrap">
        <div class="regist_container">
            <main class="regist_terms_conditions_chk" style="display: none;">
                <div class="regist_logo_div">
                    <div class="regist_logo_div_main_logo">
                        <!-- <img src="../../public/images/WEET_logo.png" alt=""> -->
                        <img src="../../../public/images/WEET_logo.png" alt="">
                    </div>
                    <div class="regist_logo_div_title">
                        <h1>SIGN UP</h1>
                    </div>
                </div>

                <div class="regist_terms_box">
                    <div class="terms_conditions_title">
                        <h1><strong>1. WEET 이용약관</strong></h1>
                    </div>
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
                        <input class="terms_conditions_checkbox" type="checkbox" v-model="termsAgreed" />
                        <label class="terms_conditions_label">이용약관 및 개인정보수집 및 이용에 모두 동의합니다.</label>
                    </div>

                </div>

                <div class="regist_button">
                    <div class="regist_button_cel">
                        <button class="regist_button_cancel">CANCEL</button>
                    </div>
                    <div class="regist_button_nxt">
                        <button class="regist_button_next" type="button">NEXT</button>
                    </div>
                </div>
            </main>
        </div>

        <div class="regist_container">
            <!-- <main class="regist_user_info">
                <div class="terms_conditions_title">
                    <h1><strong>2. WEET 계정정보</strong></h1>
                </div>
                <table class="regist_user_info_box">
                    <colgroup class="regist_user_info_box_title">
                        <col style="width: 20%;">
                        <col style="width: 80%;">
                    </colgroup>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">이메일</label></th>
                        <td colspan="3"><input type="email" placeholder="email"></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">비밀번호</label></th>
                        <td colspan="3"><input type="password" placeholder="password"></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">비밀번호 확인</label></th>
                        <td colspan="3"><input type="password" placeholder="password chk"></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">이름</label></th>
                        <td colspan="3"><input type="text" placeholder="name"></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">연락처</label></th>
                        <td colspan="3"><input type="tel" placeholder="tel"></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">우편번호</label></th>
                        <td colspan="3"><input type="text" placeholder=""></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">주소</label></th>
                        <td colspan="3"><input type="address" placeholder="address"></td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">성별</label></th>
                        <td><input type="radio">남</td>
                        <td><input type="radio">여</td>
                    </tr>
                    <tr class="regist_user_info_box_content">
                        <th><label for="">생년월일</label></th>
                        <td><input type="date" placeholder=""></td>
                    </tr>
                </table>
            </main> -->

            <main class="regist_user_info">
                <div class="regist_logo_div">
                    <div class="regist_logo_div_main_logo">
                        <!-- <img src="../../public/images/WEET_logo.png" alt=""> -->
                        <img src="../../../public/images/WEET_logo.png" alt="">
                    </div>
                    <div class="regist_logo_div_title">
                        <h1>SIGN UP</h1>
                    </div>
                </div>
                <div class="terms_conditions_title">
                    <h1><strong>2. WEET 계정정보</strong></h1>
                </div>
                <div class="regist_user_info_div">
                    <div class="regist_user_info_label">
                        <div>
                            <span>이메일</span>
                        </div>
                        <div>
                            <span>비밀번호</span>
                        </div>
                        <div>
                            <span>비밀번호 확인</span>
                        </div>
                        <div>
                            <span>이름</span>
                        </div>
                        <div>
                            <span>연락처</span>
                        </div>
                        <div>
                            <span>우편번호</span>
                        </div>
                        <div>
                            <span>주소</span>
                        </div>
                        <div>
                            <span>성별</span>
                        </div>
                        <div>
                            <span>생년월일</span>
                        </div>
                    </div>
                    <div class="regist_user_info_box">
                        <div class="regist_user_info_box_content">
                            <label for="hidden">이메일</label>
                            <input type="email" placeholder="email">
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">비밀번호</label>
                            <input type="password" placeholder="password">
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">비밀번호 확인</label>
                            <input type="password" placeholder="password chk">
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">이름</label>
                            <input type="text" placeholder="name">
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">연락처</label>
                            <input type="tel" placeholder="tel">
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">우편번호</label>
                            <input type="text" placeholder="">
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">주소</label>
                            <input type="address" placeholder="address">
                        </div>
                        <div class="regist_user_info_box_content_gender">
                            <label for="hidden">성별</label>
                            <div>
                                <input type="radio" id="male" name="gender">
                                <label for="male">남</label>
                            </div>
                            <div>
                                <input type="radio" id="female" name="gender">
                                <label for="female">여</label>
                            </div>
                        </div>
                        <div class="regist_user_info_box_content">
                            <label for="hidden">생년월일</label>
                            <input type="date" placeholder="">
                        </div>
                    </div>
                </div>    
            </main>
        </div>
    </div>
</template>

<script>

export default {
    name: 'SignUpComponent',

    data() {
        return {

        }
    }
}

</script>

<style lang="scss">
	@import '../../sass/User/signup.scss';
</style>
