export default {
    auth(to, from, next) {
        const token = localStorage.getItem('_tAthenas');

        if ((!token || token == 'undefined')) {
            next('/')
        }
        next();
    },
}