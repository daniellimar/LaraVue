import axios from 'axios';

const axiosIntance = axios.create({
    baseURL:'http://localhost:8000/api',
    header: {
        'Content-type': 'application/json'
    }
});

export default axiosIntance;