// store.js
import { reactive } from 'vue'

export const store = reactive({
    currEboardFlipped: -1,
    flip(num) {
        this.currEboardFlipped = num;
    }
})