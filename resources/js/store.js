var store = {
    url: 'http://localhost:8000',
    state: { message: 'Hello!', text: 'haha' }, 
    initCookie(){
        this.token = $.cookie("cosmic_session")
    },
    urlParam(param) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param)
    },
    formatDate(date) {
        var d = new Date(date),
            month = "" + (d.getMonth() + 1),
            day = "" + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = "0" + month;
        if (day.length < 2) day = "0" + day;

        return [ year, month, day ].join("-");
    },
}
module.exports = store


/* axios.interceptors : Request interceptors can be used to do things such as retrieve a token from local storage and send with all requests, 
while a response interceptor could be used to catch 401 responses and redirect to a login page for authorization. */