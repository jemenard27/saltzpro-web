let currentSltd = class currentSltd {

    login(params = {}) {
      let url = this.baseURL + '/login';
      return super.post(url, params);
    }
  
  };
  
  export default currentSltd
  