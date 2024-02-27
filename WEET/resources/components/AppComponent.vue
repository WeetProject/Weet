<template>
    <div>
        <p class="text-8xl test-p">test</p>
        <p class="test-p no-underline hover:underline text-2xl">가보자구</p>
    </div>
    
    <div class="demo-box">
  <div class="flight-info">
    <div class="segments">
      <div class="segment departure">
        <time>06:30</time>
        <span class="airport">ALC</span>
      </div>
      <div class="divider"><span class="plane"></span></div>
      <div class="segment adaptive">
        <span class="airport">MAD</span>
      </div>
      <div class="divider adaptive">
      <span class="plane"></span>
      </div>
      <div class="segment destination">
        <time>11:40</time>
        <span class="airport">VIE</span>
      </div>
    </div>
  </div>
  <div class="flight-duration">   
  8h 40min Length of trip
  </div>
</div>
<p class="info">Adaptive fluid flight info</p>
</template>
<script>
export default {
    name: 'AppComponent',
}
</script>
<style lang="scss">
    @import '../sass/app.scss';
</style>