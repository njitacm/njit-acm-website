import { createStore } from 'vuex';

export default createStore({
    state() {
        return {
            navBtnSelected: -1,
            currEboardCardFlipped: -1,
        };
    },
    mutations: {
        selectNavBtn(state, id) {
            state.navBtnSelected = id;
        },
        flipCurrEboardCard(state, id) {
            state.currEboardCardFlipped = id;
        }
    }
});
