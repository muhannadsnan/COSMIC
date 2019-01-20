var store = {
    token: '',
    url: 'http://localhost:8000',
    options: {
        // headers: {
        //     'Accept': 'application/json',
        //     'Content-Type': 'application/json'
        // }
    },
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
    getToken() {
        if (this.token == '') {
            axios.get(this.url+'/oauth/clients')
                .then(response => {
                    console.log(response.data)
                    if (response.data.length == 0) {
                        this.requestToken()
                    } else {
                        this.token[0] = response                        
                    }
                });
        } else {
            return this.token
        }
        
    },
    requestToken() {
        const data = {
            name: Laravel.user_name,
            redirect: this.url+'/callback'
        };

        axios.post('/oauth/clients', data)
            .then(response => {
                console.log(response.data);
            })
            .catch(response => {
                // List errors on response...
            });
    }
}
module.exports = store


/* axios.interceptors : Request interceptors can be used to do things such as retrieve a token from local storage and send with all requests, 
while a response interceptor could be used to catch 401 responses and redirect to a login page for authorization. */