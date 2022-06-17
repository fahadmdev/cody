import axios from 'axios';
export default {
  loadLoanApplications: async ({ commit }) => {
    // TODO: make a GET request
    const res = await axios.get('https://6271819ac455a64564b41998.mockapi.io/api/v3/applications');
    const data = res.data;
    commit('storeLoanApplications', data);
  }
};
