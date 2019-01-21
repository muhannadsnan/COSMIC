var store = {
    url: 'http://localhost:8000',
    state: { message: 'Hello!', text: 'haha' }, 
    initCookie(){
        this.token = $.cookie("cosmic_session")
    },
    get(url1) {
        return axios.get(this.url+url1)
    },
    save(url1, data) { 
        return axios.post(this.url+url1, data)
    },
    delete(url1, data) {
        return axios.delete(this.url+url1, data)
    },
    update(url1, data) {
        return axios.put(this.url+url1, data)
    },
}
module.exports = store


/* axios.interceptors : Request interceptors can be used to do things such as retrieve a token from local storage and send with all requests, 
while a response interceptor could be used to catch 401 responses and redirect to a login page for authorization. */