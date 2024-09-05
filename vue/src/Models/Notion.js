import {sendPost, sendGet} from '@/Models/ApiCall';
const databaseId = import.meta.env.VITE_DATABASE_ID;

async function getPersonTypes() {
    const response = await sendGet(`/bookings/person-types/person-types?start=1&limit=1000`, true);
    return response.data;
}

async function signUp( fullname, password, email ) {
    let payload = {
        "fullname": fullname,
        "password": password,
        "email": email
    };
    const response = await sendPost(`?action=signup`, payload);
    return response.data;
}

export { 
    getPersonTypes,
    signUp 
}
