var store = {
    debug: true,
    state: {
        message: 'Hello!',
        text: 'haha'
    },
    setMessageAction (newValue) {
        if (this.debug) console.log('setMessageAction triggered with', newValue)
        this.state.message = newValue
    },
    clearMessageAction () {
        if (this.debug) console.log('clearMessageAction triggered')
        this.state.message = ''
    },
    getData() {
        axios.get('https://jsonplaceholder.typicode.com/todos/1')
            .then(response => (this.info = response))
            .catch(function (error) {
                console.log(error);
            })
    }
}