<template>
    <div class="discount">
        <p>늦게 협상하면, {{ discountNum }}% 삭감</p>
    </div>
</template>
<script>
export default {
    name: 'Discount',
    data() {
        return {
            discountNum: 50,
            intervalInfo: null,
        }
    },

    // mounted() : 라이프 사이클훅, mounted단계에서 실행되는 영역
    mounted() {
        this.intervalInfo = setInterval(() => {
            this.discountNum--;
        }, 1000);
    },
    updated() {
        if(this.discountNum === 10) {
        clearInterval(this.intervalInfo);
        }
    },
}
</script>
<style>
    
</style>