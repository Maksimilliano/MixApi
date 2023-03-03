import Request from '../libs/request';

const request = new Request(process.env.API_URL);

export const login = (data) => {
    return request.post('/login', data);
}

export const register = (data) => {
    return request.post('/register', data);
}
