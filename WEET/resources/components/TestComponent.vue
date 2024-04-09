<template>
    <div class="regist_container">

    <div>
        <button @click="toggleOptions">Hover Me</button>
        
        <div v-if="showOptions" @click.self="hideOptions" class="options">
            <button @click="goToMyPage">마이페이지</button>
            <button @click="logout">로그아웃</button>
        </div>
    </div>

    <div>
    <h1>도시와 공항 정보</h1>
        <ul>
            <li v-for="location in airports" :key="location.iataCode">
                {{ location.name }} ({{ location.iataCode }})
            </li>
        </ul>
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
                airports: [
                    { name: '서울', iataCode: 'ICN' },
                    { name: '런던', iataCode: 'LHR' },
                    { name: '파리', iataCode: 'CDG' },
                    { name: '도쿄', iataCode: 'HND' }
                ]
            };
        },

        methods: {
            
            hideOptions() {
                this.showOptions = false;
            },

            
        setup() {
    // 도시와 공항 정보를 저장할 리액티브 변수
    const airports = ref([]);

    // 도시와 공항 정보를 가져오는 비동기 함수
    const getAirports = async () => {
      try {
        // Amadeus API를 호출하기 위한 access token 요청
        const tokenResponse = await axios.post('https://test.api.amadeus.com/v1/security/oauth2/token', {
          client_id: clientId,
          client_secret: clientSecret,
          grant_type: 'client_credentials'
        });

        // access token 추출
        const accessToken = tokenResponse.data.access_token;

        // Amadeus API를 사용하여 도시 및 공항 정보를 가져오기
        const response = await axios.get('https://test.api.amadeus.com/v1/reference-data/locations', {
          headers: {
            'Authorization': `Bearer ${accessToken}`
          },
          params: {
            subType: 'CITY,AIRPORT'
          }
        });

        // 도시 및 공항 정보 저장
        airports.value = response.data;
      } catch (error) {
        console.error('Error fetching airport data:', error);
        throw error;
      }
    };

    // 컴포넌트가 마운트되면 도시와 공항 정보를 가져옴
    onMounted(getAirports);

    // 가져온 도시와 공항 정보 반환
    return {
      airports
    };
  }
        },

    };
	
</script>

<style lang="scss">
	@import '../sass/test.scss';

    .options {
  position: absolute;
  top: 30px;
  left: 0;
  display: flex;
  flex-direction: column;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  padding: 10px;
}
.options button {
  margin-bottom: 5px;
}
</style>