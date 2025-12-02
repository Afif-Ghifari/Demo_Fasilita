import http from 'k6/http';
import { sleep, check } from 'k6';

export let options = {
    stages: [
        { duration: '1m', target: 100 },
        { duration: '3m', target: 200 },
        { duration: '1m', target: 0 }
    ]
};

export default function () {
    const res = http.get('http://localhost:8000/login');
    check(res, {
        'is status 200': (r) => r.status === 200
    });
    sleep(1);
}