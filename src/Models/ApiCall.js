import axios from "axios";
const baseURL = import.meta.env.VITE_API_BASE_URL;
const secretKey = import.meta.env.VITE_SECRET_KEY;
const headers = {
    'Authorization': `Bearer ${secretKey}`,
    'Notion-Version': '2022-02-22',
    'Content-Type': 'application/json'
};

function changeHeaderAttribute( key, value ) {
    headers[key] = value;
}

async function sendPost( url, data = {} ) {
    // return await axios.post( `${baseURL}${url}`, data, {headers: headers} );
    console.log('headers', headers);
    return await fetch(`${baseURL}${url}`, {
        mode: 'no-cors',
        headers: headers,
        method: "POST",
        body: JSON.stringify(data),
    });      
}

async function sendGet( url ) {
    return await axios.get( `${baseURL}${url}`, {headers: headers} );
}

export {sendPost, sendGet, changeHeaderAttribute}