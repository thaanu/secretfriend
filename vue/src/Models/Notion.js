import {sendPost, sendGet} from '@/Models/ApiCall';
const databaseId = import.meta.env.VITE_DATABASE_ID;

async function getPersonTypes() {
    const response = await sendGet(`/bookings/person-types/person-types?start=1&limit=1000`, true);
    return response.data;
}

async function signUp( fullname, password, email ) {
    let payload = {
        "parent": {
            "database_id": databaseId
        },
        "properties": {
            "Name": {
                "title": [
                    {
                        "text": {
                            "content": fullname
                        }
                    }
                ]
            },
            "Email": {
                "text": {
                    "content": email
                }
            },
            "Password": {
                "text": {
                    "content": password
                }
            }
        }
    };

    const response = await sendPost(`/pages/`, payload);
    return response.data;
}

export { 
    getPersonTypes,
    signUp 
}
