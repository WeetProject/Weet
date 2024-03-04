<template>
    <div>
    <!-- progressbar -->
    <ul id="progressbar">
        <li v-for="(step, index) in steps" :key="index" :class="{ active: index === currentStep }">{{ step }}</li>
    </ul>
    <!-- fieldsets -->
    <fieldset v-for="(fieldset, index) in fieldsets" :key="index" v-show="index === currentStep">
        <h2 class="fs-title">{{ fieldset.title }}</h2>
        <h3 class="fs-subtitle">{{ fieldset.subtitle }}</h3>
            <!-- <input v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex" type="text" :name="input.name" :placeholder="input.placeholder" /> -->
            <input v-for="(input, inputIndex) in fieldset.inputs" :key="inputIndex" 
                :type="input.type" :name="input.name" :placeholder="input.placeholder" 
                :class="input.classes" />
        <button v-if="index > 0" @click="prevStep" class="previous action-button">Previous</button>
        <button v-if="index < fieldsets.length - 1" @click="nextStep" class="next action-button">Next</button>
            <a v-if="index === fieldsets.length - 1" :href="submitLink" class="submit action-button" target="_top">Submit</a>
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
                fieldsets: [
                    {
                        title: 'Create your account',
                        subtitle: 'Agree to Terms and Conditions',
                        inputs: [
                            { name: 'email', placeholder: 'Email' },
                            { name: 'pass', placeholder: 'Password' },
                            { name: 'cpass', placeholder: 'Confirm Password' }
                        ]
                },
                {
                    title: 'Create your account',
                    subtitle: 'Personal Details',
                    inputs: [
                        { name: 'fname', placeholder: 'First Name' },
                        { name: 'lname', placeholder: 'Last Name' },
                        { name: 'phone', placeholder: 'Phone' },
                        { name: 'address', placeholder: 'Address' }
                    ]
                }
            ],
            submitLink: 'https://twitter.com/GoktepeAtakan'
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