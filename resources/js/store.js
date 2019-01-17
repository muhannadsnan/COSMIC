var store = {
    debug: true,
    url: 'http://localhost:8000',
    options: {
        // headers: {
        //     'Accept': 'application/json',
        //     'Content-Type': 'application/json',
        //   },
        //   withCredentials: false
    },
    state: {
        message: 'Hello!',
        text: 'haha'
    },
    setMessageAction (newValue) {
        if (this.debug) console.log('setMessageAction triggered with', newValue)
        this.state.message = newValue
    },
    get(url1) {
        return axios.get(this.url+url1)
    },
    save(url1, data) { 
        return axios.post(this.url+url1, data, this.options)
    },
    delete(url1, data) {
        return axios.delete(this.url+url1, data)
    },
    update(url1, data) {
        return axios.put(this.url+url1, data)
    },
}
module.exports = store