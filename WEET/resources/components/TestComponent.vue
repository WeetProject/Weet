<template>
    <div class="regist_container">
    <!-- progressbar -->
    <!-- <div class="progressbar_container">
        <ul id="progressbar">
            <li v-for="(step, index) in steps" :key="index" :class="{ active: index === currentStep }">{{ step }}</li>
        </ul>
    </div> -->

        <div class="regist_logo_div">
            <img src="../../public/images/WEET_logo.png" alt="">
        </div>
    <!-- fieldsets -->
    <fieldset v-for="(fieldset, index) in fieldsets" :key="index" v-show="index === currentStep">
        <h2 class="fs-title">{{ fieldset.title }}</h2>
        <h3 class="fs-subtitle">{{ fieldset.subtitle }}</h3>

        <!-- '이용약관 동의'에 대한 텍스트 추가 -->
            <div v-if="index === 0" class="terms_conditions">
                <input class="terms_conditions_checkbox" type="checkbox" v-model="termsAgreed" />
                <label class="terms_conditions_label">이용약관 및 개인정보수집 및 이용에 모두 동의합니다.</label>

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
                        <p><strong>제4조 (회사의 의무</strong>)</p>
                            <br>
                        <p>회사는 이용자의 개인정보 보호를 위해 최선을 다하며, 관련 법령에 따라 이를 처리합니다.</p>
                        <p>회사는 서비스 제공을 위해 지속적으로 시스템 및 네트워크 관리를 개선하며, 서비스 이용 중 발생하는 장애나 문제에 대하여 신속하게 조치합니다.</p>
                    </div>
            </div>
            <div class="account_info_container">
                <!-- <input v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex" type="text" :name="input.name" :placeholder="input.placeholder" /> -->
                
                <!-- <label v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex">
                    {{ input.placeholder }}
                </label>
                    <input v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex" 
                        :type="input.type" :name="input.name" :placeholder="input.placeholder" 
                        :class="input.classes" /> -->
                
                <!-- <div v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex" class="account_info_input_wrapper">
                    <label :for="'input_' + inputIndex" class="account_info_label" style="flex: 1;">{{ input.label }}</label>
                    <div v-if="input.type === 'radio'" style="display: flex;">
                        <div v-for="(option, optionIndex) in input.options" :key="optionIndex">
                            <input type="radio" :name="input.name" :value="option" :id="'input_' + inputIndex + '_' + optionIndex">
                            <label :for="'input_' + inputIndex + '_' + optionIndex">{{ option }}</label>
                        </div>
                    </div>
                    <input v-else :type="input.type" :name="input.name" :id="'input_' + inputIndex" :placeholder="input.placeholder" :class="input.classes" class="account_info_input" />
                </div> -->
                
                <div v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex" class="account_info_input_wrapper">
                    <label :for="'input_' + inputIndex" class="account_info_label">{{ input.label }}</label>
                    <input v-if="input.type !== 'radio'" :type="input.type" :name="input.name" :id="'input_' + inputIndex" :placeholder="input.placeholder" :class="['account_info_input', input.classes]" />
                    <div v-else class="radio_options">
                        <div v-for="(option, optionIndex) in input.options" :key="optionIndex">
                            <input type="radio" :name="input.name" :value="option" :id="'input_' + inputIndex + '_' + optionIndex">
                            <label :for="'input_' + inputIndex + '_' + optionIndex">{{ option }}</label>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="regist_user_btn">
                <div class="regist_user_pre_btn">
                    <button v-if="index > 0" @click="prevStep" class="previous action-button">Previous</button>
                </div>
                <div class="regist_user_next_btn">
                    <button v-if="index < fieldsets.length - 1" @click="nextStep" class="next action-button">Next</button>
                </div>
                <div class="regist_user_sub_btn">
                    <a v-if="index === fieldsets.length - 1" :href="submitLink" class="submit action-button" target="_top">Submit</a>
                </div>    
            </div>
    </fieldset>
    </div>

</template>

<script>
export default {
		name: 'TestComponent',

        data() {
            return {
                currentStep: 0,
                steps: ['이용 약관 동의', '계정정보 입력'],
                termsAgreed: false, // 이용약관 동의 체크 여부를 저장하는 데이터
                fieldsets: [
                    {
                        title: 'Create your account',
                        subtitle: 'Agree to Terms and Conditions',
                        // inputs: [
                        //     { name: 'email', placeholder: 'Email' },
                        //     { name: 'pass', placeholder: 'Password' },
                        //     { name: 'cpass', placeholder: 'Confirm Password' }
                        // ]
                },
                {
                    title: 'Create your account',
                    subtitle: 'Personal Details',
                    inputs: [
                        { name: 'user_email', placeholder: 'Email', label: '이메일' },
                        { name: 'user_password', placeholder: 'Password', label: '비밀번호' },
                        { name: 'user_name', placeholder: 'Fullname', label: '이름' },
                        { name: 'user_tel', placeholder: 'Phone', label: '연락처' },
                        { name: 'user_postcode', placeholder: 'Postcode', label: '우편번호' },
                        { name: 'user_basic_address', placeholder: 'Basic_address', label: '기본주소' },
                        { name: 'user_detail_address', placeholder: 'Detail_address', label: '나머지 주소' },
                        { name: 'user_gender', type: 'radio', options: ['Male', 'Female'], placeholder: 'Gender', label: '성별'},
                        { name: 'user_birthdate', type: 'date', placeholder: 'Birthdate', label: '생년월일'},
                    ]
                }
            ],
            // submitLink: 'https://twitter.com/GoktepeAtakan'
            };
        },

        methods: {
            nextStep() {
                if (this.currentStep < this.fieldsets.length - 1) {
                    this.currentStep++;
                }
            },
            prevStep() {
                if (this.currentStep > 0) {
                    this.currentStep--;
                }
            }
        }
    };
	
</script>

<style lang="scss">
	@import '../sass/test.scss';
</style>