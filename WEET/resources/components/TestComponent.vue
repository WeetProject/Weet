<template>
    <div class="test_container">

    <div>
      <button>카카오로그인테스트</button>
    </div>

    </div>

</template>

<script>
import axios from 'axios';
import { ref, onMounted } from 'vue';

export default {
		name: 'TestComponent',

        data() {
            return {
                
            };
        },

        methods: {
            
            
        },

    };
	
</script>

<style lang="scss">
	@import '../sass/test.scss';

  .test_container {
    height: 500px;
  }
</style>