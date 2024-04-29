<template>
    <div class="test_container">

    <div>
      <button>카카오로그인테스트</button>
    </div>

    <div>
      <div style="display: flex;">
        <div style="border: 1px solid; width: 100px;">
          네모
        </div>
        <div style="border: 1px solid; width: 100px;">
          네모
        </div>
      </div>
      <div style="border: 1px solid; width: 500px;">
        긴네모
      </div>
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